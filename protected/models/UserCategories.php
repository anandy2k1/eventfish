<?php

Yii::import('application.models._base.BaseUserCategories');

class UserCategories extends BaseUserCategories
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}