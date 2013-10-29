<?php

class IndexController extends AdminCoreController {

    public $defaultAction = 'index';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = 'admin_login';
        $model = new AdminLoginForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['AdminLoginForm'])) {
            $model->attributes = $_POST['AdminLoginForm'];
            // validate user input and redirect to the previous page if valid

            if ($model->validate()) {
                if ($model->login()) {
                    $this->redirect(Yii::app()->createUrl('admin/index/index'));
                }
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
        $this->redirect('index/login');
    }

    public function actionChangepassword() {
        $Model = new ChangePasswordForm();

        // collect user input data
        if (isset($_POST['ChangePasswordForm'])) {
            $Model->attributes = $_POST['ChangePasswordForm'];

            // validate user input and redirect to the previous page if valid
            if ($Model->validate()) {
                // CHECK FOR VALID OLD PASSWORD //
                if ($Model->checkValidOldPassword()) {
                    // RESET USER PASSWORD //
                    $oUser = Users::model()->findByPk(Yii::app()->admin->id);
                    $oUser->password = Yii::app()->getModule('admin')->encrypting($Model->password);
                    $oUser->save(false);

                    Yii::app()->user->setFlash('success', "Your password has been successfully changed.");
                    $this->redirect(array('index/changepassword'));
                }
            }
        }
        // display the Change Password form
        $this->render('changepassword', array('model' => $Model));
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}