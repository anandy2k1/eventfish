<?php

Yii::import('application.models._base.BaseUserPhotos');

class UserPhotos extends BaseUserPhotos
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}