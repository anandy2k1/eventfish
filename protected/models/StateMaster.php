<?php

Yii::import('application.models._base.BaseStateMaster');

class StateMaster extends BaseStateMaster
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}