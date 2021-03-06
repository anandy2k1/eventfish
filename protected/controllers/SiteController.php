<?php

class SiteController extends Controller
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {


        // FOR GET ALL CATEGORIES //
        $omEventVendorCategories = Category::getAllActiveCategories('',false,true);
        $omCriteria = new CDbCriteria();


        //$omCriteria->condition=" type = 0 ";
        // FOR GET SLIDER IMAGES //
        $omSliders = SliderImageManagement::getAllActiveSliders();
        $omBanner = SliderImageManagement::getAllActiveSliders(1);

        $omCriteria->condition=" start_date < now()  ";
        $omPastEventList = Event::model()->findAll($omCriteria);

        $omCriteria->condition=" end_date > now()  ";
        $omFutureEventList = Event::model()->findAll($omCriteria);

        $this->render('index', array(
            'omEventVendorCategories' => $omEventVendorCategories,
            'omSliders' => $omSliders,
            'omPastEventList'=>$omPastEventList,
            'omFutureEventList'=>$omFutureEventList,
            'omBanner' => $omBanner
        ));
    }

    public function actionAjaxChildCategories()
    {
        if (isset($_GET['catId']) && $_GET['catId'] != "")
        {
            $this->layout=false;
            $omEventVendorCategories = Common::getSubCategories($_GET['catId'],$_GET['divId']);
            $this->render('ajaxCategories', array(
                'omEventVendorCategories' => $omEventVendorCategories
            ));
        }
        else
        {
            echo "No Categories Found!!";
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    public function actionSignUp()
    {
        $this->layout = false;
        $model = new Users();
        $snEventPlannerRollId = UserRole::getRoleIdAsPerType('event_planner');
        $model->role_id = $snEventPlannerRollId;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Users'])) {
            $smPassword = $_POST['Users']['password'];
            $_POST['Users']['password'] = md5($smPassword);

            $_POST['Users']['retype_password'] = md5($_POST['Users']['retype_password']);
            $model->setAttributes($_POST['Users']);
            $model->role_id = $_POST['Users']['role_id'];
            if ($model->validate()) {

                $model->save();
                $model->login($smPassword);
                $amUserData = Yii::app()->user->getState('admin');


                //************************** START SENDING MAIL ********************************* //
                // FOR GET WELCOME MAIL CONTENT FROM DB //
                $omMailContent = EmailFormat::model()->findByAttributes(array('file_name' => 'WELCOME_EVENTFISH'));
                // REPLACE SOME CONTENT TO PRINT //
                $amReplaceParams = array(
                    '{USERNAME}' => $model->email,
                    '{PASSWORD}' => $smPassword,
                );
                $ssSubject = $omMailContent->subject;
                $ssBody = Common::replaceMailContent($omMailContent->body, $amReplaceParams);

                // FOR GET PARENT INFO //
                $omAdminInfo = Users::model()->findByPk(Yii::app()->params['admin_id']);

                // FOR SEND MAIL //
                //$bMailStatus = Common::sendMail($model->email, array($omAdminInfo->email => ucfirst($omAdminInfo->first_name . ' ' . $omAdminInfo->last_name)), $ssSubject, $ssBody);
                //************************** END SENDING MAIL ********************************* //

                $ssUrl = '';
                if ($amUserData['role_id'] == $snEventPlannerRollId) {
                    $ssUrl = Common::eventRedirectPage($model);
                } else {
                    $ssUrl = Common::vendorRedirectPage($model);
                }

                Common::closeColorBox($ssUrl);
                //$this->redirect(array('admin'));
            }
        }
        $amRoles = UserRole::getUserRolesArray();
        $this->render('signUp', array(
            'model' => $model,
            'amRoles' => $amRoles
        ));
    }

    /**
     * Displays the login page
     */

    public function actionFacebooklogin()
    {
        Yii::import('ext.facebook.*');
        $ui = new FacebookUserIdentity(Yii::app()->params['FACEBOOK_APPID'], Yii::app()->params['FACEBOOK_SECRET']);
        if ($ui->authenticate()) {
            $user = Yii::app()->user;
            $user->login($ui);
            $this->redirect($user->returnUrl);
        } else {
            throw new CHttpException(401, $ui->error);
        }
    }

    public function actionLogin()
    {
        $this->layout = '..//layouts/popup';
        $model = new LoginForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $amUserData = Yii::app()->user->getState('admin');
                $ssUrl = '';
                $oUser = Users::model()->findByPk($amUserData['id']);
                if ($amUserData['role_id'] == UserRole::getRoleIdAsPerType('event_planner')) {
                    $ssUrl = Common::eventRedirectPage($oUser);
                } else {
                    $ssUrl = Common::vendorRedirectPage($oUser);
                }
                Common::closeColorBox($ssUrl);
            }
        }

        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionCms()
    {
        if (isset($_REQUEST['id'])) {
            $keyUrl = trim($_REQUEST['id']);
            $pageModel = Pages::model()->find('id = :key OR custom_url_key = :key', array(':key' => $keyUrl));
            if (empty($pageModel)) {
                $this->forward('index');
            }
            $this->pageTitle = $pageModel->meta_title;
            Yii::app()->clientScript->registerMetaTag($pageModel->meta_title, 'Title');
            Yii::app()->clientScript->registerMetaTag($pageModel->meta_description, 'Description');
            Yii::app()->clientScript->registerMetaTag($pageModel->meta_keyword, 'Keywords');
            $this->render('cms', array('pageModel' => $pageModel));
        } else {
            $this->forward('index');
        }
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'sign-up-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

    }

}