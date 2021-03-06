<?php

/**
 * This is the model base class for the table "user_categories".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserCategories".
 *
 * Columns in table "user_categories" available as properties of the model,
 * followed by relations of table "user_categories" available as properties of the model.
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $category_id
 *
 * @property Category $category
 * @property Users $user
 */
abstract class BaseUserCategories extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user_categories';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserCategories|UserCategories', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('user_id, category_id', 'numerical', 'integerOnly'=>true),
			array('user_id, category_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, category_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => null,
			'category_id' => null,
			'category' => null,
			'user' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('category_id', $this->category_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}