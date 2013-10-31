<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
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
    public function actionIndex() {
        // FOR GET ALL CATEGORIES //
        $omEventVendorCategories = Category::getAllActiveCategories();

        // FOR GET SLIDER IMAGES //
        $omSliders = SliderImageManagement::getAllActiveSliders();

        $this->render('index', array(
            'omEventVendorCategories' => $omEventVendorCategories,
            'omSliders' => $omSliders
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
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
    public function actionContact() {
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

    public function actionSignUp() {
        $this->layout = false;
        $model = new Users();
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);



        if (isset($_POST['Users'])) {
            $model->setAttributes($_POST['Users']);

            if ($model->validate()) {

                $model->save();
                $amUserData = Yii::app()->admin->getState('user');
                $ssUrl = ($amUserData['user_type'] == UserRole::getRoleIdAsPerType('event_planner')) ? Yii::app()->createUrl('eventPlanner/step1') : Yii::app()->createUrl('vendor/step1');

                Common::closeColorBox($ssUrl);
                //$this->redirect(array('admin'));
            }
        }
        $model->user_type2 = 2;

        $this->render('signUp', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
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
                $amUserData = Yii::app()->admin->getState('user');
                $ssUrl = ($amUserData['user_type'] == UserRole::getRoleIdAsPerType('event_planner')) ? Yii::app()->createUrl('eventPlanner/step1') : Yii::app()->createUrl('vendor/step1');
                Common::closeColorBox($ssUrl);
            }
        }

        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionCms() {
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
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'sign-up-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}