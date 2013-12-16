<?php

Yii::import('application.models._base.BaseAmazonProducts');

class AmazonProducts extends BaseAmazonProducts {

    public static function model($className = __CLASS__) {
        return parent::model($className);
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('amazon_asin_number', $this->amazon_asin_number, true);
        $criteria->compare('amazon_product_id', $this->amazon_product_id, true);
        $criteria->compare('product_name', $this->product_name, true);
        $criteria->compare('product_image', $this->product_image, true);
        $criteria->compare('product_description', $this->product_description, true);
        $criteria->compare('product_price', $this->product_price, true);
        $criteria->compare('amazon_product_detail_page_url', $this->amazon_product_detail_page_url, true);
        $criteria->compare('publisher', $this->publisher, true);
        $criteria->compare('reviews', $this->reviews, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array("pageSize" => 5)
        ));
    }
}