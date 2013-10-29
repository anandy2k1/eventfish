<?php

Yii::import('application.models._base.BaseUserComments');

class UserComments extends BaseUserComments
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}