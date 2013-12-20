<?php

Yii::import('application.models._base.BaseEventAccessories');

class EventAccessories extends BaseEventAccessories
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /** function beforeSave()
     * override parent method
     */
    public function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->created_at = new CDbExpression('NOW()');
        }
        $this->updated_at = new CDbExpression('NOW()');
        return parent::beforeSave();
    }
}