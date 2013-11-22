<?php

Yii::import('application.models._base.BaseUsers');

class Users extends BaseUsers
{
    public $retype_password;
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function rules()
    {
        return array(
            array('first_name,last_name,email,password', 'required'),
            array('email', 'email'),
            array('facebook_id, is_fblogin, ssn_number, routing_number, account_number, bank_name, address_1, address_2, city, state_id, country_id, zip, phone, mobile, office_phone, date_of_birth, gender, ethnicity, income, marital_status, user_type, short_description, start_time, end_time, available_days, status, last_login_at, created_at, updated_at', 'safe'),
            array('email', 'unique', 'className' => 'User', 'attributeName' => 'email', 'message'=>'This Email is already in use'),
            array('password', 'compare', 'compareAttribute' => 'retype_password' , 'message'=>'Please enter the same password twice'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent'),
            'role_id' => null,
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'facebook_id' => Yii::t('app', 'Facebook'),
            'is_fblogin' => Yii::t('app', 'Is Fblogin'),
            'ssn_number' => Yii::t('app', 'Ssn Number'),
            'routing_number' => Yii::t('app', 'Routing Number'),
            'account_number' => Yii::t('app', 'Account Number'),
            'bank_name' => Yii::t('app', 'Bank Name'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'address_1' => Yii::t('app', 'Address 1'),
            'address_2' => Yii::t('app', 'Address 2'),
            'city' => Yii::t('app', 'City'),
            'state_id' => Yii::t('app', 'State'),
            'country_id' => Yii::t('app', 'Country'),
            'zip' => Yii::t('app', 'Zip'),
            'phone' => Yii::t('app', 'Phone'),
            'mobile' => Yii::t('app', 'Mobile'),
            'office_phone' => Yii::t('app', 'Office Phone'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'gender' => Yii::t('app', 'Gender'),
            'ethnicity' => Yii::t('app', 'Ethnicity'),
            'income' => Yii::t('app', 'Income'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'user_type' => Yii::t('app', 'User Type'),
            'short_description' => Yii::t('app', 'Short Description'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'available_days' => Yii::t('app', 'Available Days'),
            'status' => Yii::t('app', 'Status'),
            'last_login_at' => Yii::t('app', 'Last Login At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'facebook_picture' => Yii::t('app', 'Facebook Picture'),
            'mstPages' => null,
            'mstPages1' => null,
            'userCategories' => null,
            'userComments' => null,
            'userComments1' => null,
            'userPhotoses' => null,
            'userTop5Questions' => null,
            'role' => null,
            'state' => null,
            'country' => null,
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('ssn_number', $this->ssn_number, true);
        $criteria->compare('routing_number', $this->routing_number, true);
        $criteria->compare('account_number', $this->account_number, true);
        $criteria->compare('bank_name', $this->bank_name, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('country_id', $this->country_id);
        $criteria->compare('marital_status', $this->marital_status, true);
        $criteria->compare('user_type', $this->user_type);
        $criteria->compare('start_time', $this->start_time, true);
        $criteria->compare('end_time', $this->end_time, true);
        $criteria->compare('available_days', $this->available_days, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('last_login_at', $this->last_login_at, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        $criteria->condition = "id <> 1";

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}