<?php

Yii::import('application.models._base.BaseUserVideos');

class UserVideos extends BaseUserVideos
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function rules()
    {
        return array(
            array('video_url', 'required'),
            array('video_url', 'url'),
            array('video_url', 'length', 'max' => 255),
            array('id, user_id, video_url', 'safe', 'on' => 'search'),
        );
    }
}