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
            array('first_name,last_name,email', 'required'),
            array('email', 'email'),
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
        $criteria->compare('matial_status', $this->matial_status, true);
        $criteria->compare('user_type', $this->user_type);
        $criteria->compare('user_type2', $this->user_type2, true);
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