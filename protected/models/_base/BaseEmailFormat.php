<?php

/**
 * This is the model base class for the table "email_format".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "EmailFormat".
 *
 * Columns in table "email_format" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $title
 * @property string $subject
 * @property string $body
 * @property string $file_name
 * @property string $last_updated
 * @property string $status
 *
 */
abstract class BaseEmailFormat extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'email_format';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'EmailFormat|EmailFormats', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('title, subject, body, file_name, last_updated', 'required'),
			array('title, status', 'length', 'max'=>1),
			array('subject, file_name', 'length', 'max'=>255),
			array('status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, title, subject, body, file_name, last_updated, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'title' => Yii::t('app', 'Title'),
			'subject' => Yii::t('app', 'Subject'),
			'body' => Yii::t('app', 'Body'),
			'file_name' => Yii::t('app', 'File Name'),
			'last_updated' => Yii::t('app', 'Last Updated'),
			'status' => Yii::t('app', 'Status'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('subject', $this->subject, true);
		$criteria->compare('body', $this->body, true);
		$criteria->compare('file_name', $this->file_name, true);
		$criteria->compare('last_updated', $this->last_updated, true);
		$criteria->compare('status', $this->status, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}