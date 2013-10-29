<?php

class ChangePasswordForm extends CFormModel {

    /**
     * Declares the public properties.
     */
    public $old_password;
    public $password;
    public $password_repeat;

    /**
     * Declares the validation rules.
     */
    public function rules() {

        return array(
            array('old_password, password', 'required'),
            array('old_password, password', 'length', 'max' => 128, 'min' => ''),
            array('password_repeat', 'required'),
            array('password', 'compare', 'compareAttribute' => 'password_repeat',),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'old_password' => 'Old Password',
            'password' => 'New Password',
            'password_repeat' => 'Repeat Password',
        );
    }

    /**
     * check valid old password.
     */
    public function checkValidOldPassword() {
        if (!$this->hasErrors()) {
            $UserModel = Users::model()->findByPk(Yii::app()->user->id);

            if ($UserModel->password != Yii::app()->getModule('admin')->encrypting($this->old_password))
                $this->addError('old_password', 'Old password is not valid.');
            else
                return true;
        }
    }

}

