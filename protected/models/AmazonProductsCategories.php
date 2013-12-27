<?php

Yii::import('application.models._base.BaseAmazonProductsCategories');

class AmazonProductsCategories extends BaseAmazonProductsCategories
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    public function relations() {
        return array(
            'product' => array(self::BELONGS_TO, 'AmazonProducts', 'product_id'),
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
        );
    }
}