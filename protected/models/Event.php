<?php

Yii::import('application.models._base.BaseEvent');

class Event extends BaseEvent {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('event_title, start_date, end_date, address_1, city, state_id, zip', 'required'),
            array('event_image', 'file',
                'types' => 'jpg,jpeg,gif,png,bmp',
                'maxSize' => 1024 * 1024 * 50, // 50MB
                //'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.',
                'allowEmpty' => false,
                'on' => 'add_mode'
            ),
            array('event_image', 'file',
                'types' => 'jpg,jpeg,gif,png,bmp',
                'maxSize' => 1024 * 1024 * 50, // 50MB
                //'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.',
                'allowEmpty' => true,
                'on' => 'edit_mode'
            ),
            array('state_id', 'numerical', 'integerOnly' => true),
            array('event_title, event_image, city, zip', 'length', 'max' => 255),
            array('person_gender', 'length', 'max' => 6),
            array('start_time, end_time, address_1, address_2, additional_info, start_date, end_date', 'safe'),
            array('event_title, event_image, person_age, person_gender, address_1, address_2, city, state_id, zip, additional_info, start_date, end_date', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, event_title, event_image, person_age, person_gender, address_1, address_2, city, state_id, zip, additional_info, start_date, end_date', 'safe', 'on' => 'search'),
            array('end_date', 'compare', 'compareAttribute' => 'start_date', 'operator' => '>=', 'allowEmpty' => false),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'event_title' => Yii::t('app', 'Event Title'),
            'event_image' => Yii::t('app', 'Event Image'),
            'person_age' => Yii::t('app', 'Age'),
            'person_gender' => Yii::t('app', 'Gender'),
            'address_1' => Yii::t('app', 'Address Line 1'),
            'address_2' => Yii::t('app', 'Address Line 2'),
            'city' => Yii::t('app', 'City'),
            'state_id' => Yii::t('app', 'State'),
            'zip' => Yii::t('app', 'Zip'),
            'additional_info' => Yii::t('app', 'Additional Information'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'state' => null,
        );
    }

    public static function getUserEvents($snUserId) {
        $oCriteria = new CDbCriteria;
        $oCriteria->alias = 'e';
        $oCriteria->condition = "e.start_date >= DATE_FORMAT(NOW(),'%Y-%m-%d') AND e.user_id = :userID";
        $oCriteria->params = array(':userID' => $snUserId);
        $omResultSet = self::model()->findAll($oCriteria);
        
        return $omResultSet;
    }

}