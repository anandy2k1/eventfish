<?php

Yii::import('application.models._base.BaseSliderImageManagement');

class SliderImageManagement extends BaseSliderImageManagement {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('caption, description', 'required'),
            array('image_url', 'file',
                'types' => 'jpg,jpeg,gif,png,bmp',
                'maxSize' => 1024 * 1024 * 50, // 50MB
                //'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.',
                'allowEmpty' => false,
                'on' => 'add_mode'
            ),
            array('image_url', 'file',
                'types' => 'jpg,jpeg,gif,png,bmp',
                'maxSize' => 1024 * 1024 * 50, // 50MB
                //'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.',
                'allowEmpty' => true,
                'on' => 'edit_mode'
            ),
            array('description, created_at, updated_at', 'safe'),
            array('description, image_url, status, created_at, updated_at', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, description, image_url, status, created_at, updated_at', 'safe', 'on' => 'search'),
        );
    }

    /** function getAllActiveSliders()
     * for get all active slider images
     * return  object
     */
    public static function getAllActiveSliders() {
        $oCriteria = new CDbCriteria;
        $oCriteria->alias = 's';
        $oCriteria->condition = "s.status = 1";
        $omResultSet = self::model()->findAll($oCriteria);

        return $omResultSet;
    }

    /** function beforeSave() 
     * override parent method
     */
    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->created_at = new CDbExpression('NOW()');
        }
        $this->updated_at = new CDbExpression('NOW()');
        return parent::beforeSave();
    }

}