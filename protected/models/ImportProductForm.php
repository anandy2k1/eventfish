<?php

/**
 * ImportProductForm class.
 * ImportProductForm is the data structure for keeping
 */
class ImportProductForm extends CFormModel
{

    public $category_ids;
    public $csvfile;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            array('category_ids', 'required'),
            array('csvfile', 'file',
                'types' => 'csv',
                //'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.',
                'allowEmpty' => true
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'category_ids' => Yii::t('app', 'Categories'),
            'csvfile' => Yii::t('app', 'Select CSV File'),
        );
    }

}

