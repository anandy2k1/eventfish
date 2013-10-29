<?php

Yii::import('application.models._base.BaseUserTop5Questions');

class UserTop5Questions extends BaseUserTop5Questions
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}