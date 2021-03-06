<?php

Yii::import('application.models._base.BaseCategory');

class Category extends BaseCategory {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('category_name,category_type', 'required'),
            array('category_image', 'file',
                'types' => 'jpg,jpeg,gif,png,bmp',
                'maxSize' => 1024 * 1024 * 50, // 50MB
                //'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.',
                'allowEmpty' => true,
                'on' => 'edit_mode'
            ),
            array('parent_id, status', 'numerical', 'integerOnly' => true),
            array('category_name', 'length', 'max' => 255),
            array('category_type', 'length', 'max' => 6),
            array('category_description, created_at, updated_at', 'safe'),
            array('parent_id, category_name, category_type, category_description, status, created_at, updated_at', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, parent_id, category_name, category_type, category_description, status, created_at, updated_at', 'safe', 'on' => 'search'),
        );
    }
    /**
     * Relation function
    **/
    public function relations() {
        return array(
            'userCategories' => array(self::HAS_MANY, 'UserCategories', 'category_id'),
            'parent' => array(self::BELONGS_TO, 'Category', 'parent_id', 'condition' => 't.parent_id <> 0')
        );
    }
    /** function getCategoriesArray()
     * for get all active categories array
     * return  object
     */
    public static function getCategoriesArray() {
        $oCriteria = new CDbCriteria;
        $oCriteria->alias = 'c';
        $oCriteria->condition = "c.status = 1";
        $omResultSet = self::model()->findAll($oCriteria);

        $amCategories = CHtml::listData($omResultSet, 'id', 'category_name');
        return array_merge(array("0" => '--Select--'), $amCategories);
    }

    /** function getAllActiveCategories()
     * for get all active categories
     * return  object
     */
    public static function getAllActiveCategories($ssType = '', $bIsArray = false, $bOnlyParent = false) {
        $oCriteria = new CDbCriteria;
        $oCriteria->alias = 'c';
        $oCriteria->condition = "c.status = 1";
        if ($ssType != '') {
            $oCriteria->addCondition("category_type = '$ssType'");
        }
        if ($bOnlyParent) {
            $oCriteria->addCondition("parent_id = 0");
        }
        $omResultSet = self::model()->findAll($oCriteria);



        return ($bIsArray) ? CHtml::listData($omResultSet, 'id', 'category_name') : $omResultSet;
    }
    /**
     Function to get
     */

    public static function getAllChildActiveCategories($ssType = '', $bIsArray = false, $bOnlyParent = false) {
        $oCriteria = new CDbCriteria;
        if ($ssType != '') {
            $oCriteria->addCondition("category_type = '$ssType'");
        }
        if ($bOnlyParent) {
            $oCriteria->addCondition("parent_id = 0");
        }
        $omResultSet = self::model()->with('parent')->findAll($oCriteria);



        return ($bIsArray) ? CHtml::listData($omResultSet, 'id', 'category_name','parent_id') : $omResultSet;
    }
    /**
     Function to get category parent name and id
    **/
    public static function getCategoryParentDetails($oCatId)
    {
        $oCriteria = new CDbCriteria();
        $oCriteria->condition = " id =  " . $oCatId . " ";
        $omResultSet = self::model()->findAll($oCriteria);

        return $omResultSet;
    }

    /** function getRenderCategories()
     * for get all active categories
     * return  object
     */
    public static function getRenderCategories($snParentId, $ssSearchBy = '') {
        $oCriteria = new CDbCriteria;
        $oCriteria->alias = 'c';
        $oCriteria->condition = "c.status = 1 AND category_type = 'VENDOR' AND parent_id = $snParentId";

        if ($ssSearchBy != '') {
            $oCriteria->addCondition("category_name LIKE '%$ssSearchBy%'");
        }
        $omResultSet = self::model()->findAll($oCriteria);

        return $omResultSet;
    }

    public static function getCategoriesByType($ssType) {
        $oCriteria = new CDbCriteria;
        $oCriteria->alias = 'c';
        $oCriteria->condition = "c.status = 1 AND c.category_type =:ssType";
        $oCriteria->limit = Yii::app()->params['home_category_limit'];
        $oCriteria->params = array(':ssType' => $ssType);
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

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('category_name', $this->category_name, true);
        $criteria->compare('category_image', $this->category_image, true);
        $criteria->compare('category_type', $this->category_type, true);
        $criteria->compare('category_description', $this->category_description, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        $criteria->order = 'id DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}