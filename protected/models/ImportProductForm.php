<?php

/**
 * ImportProductForm class.
 * ImportProductForm is the data structure for keeping
 */
class ImportProductForm extends CFormModel {

    public $category_ids;
    public $search_type;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('category_ids,search_type', 'required'),
        );
    }

    public function attributeLabels() {
        return array(
            'category_ids' => Yii::t('app', 'Categories'),
            'search_type' => Yii::t('app', 'Amazon Search'),
        );
    }

}

