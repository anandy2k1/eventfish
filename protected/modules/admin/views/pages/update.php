<?php

$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
    Yii::t('app', 'Edit')
);
$this->menu = array(
    array('label' => Yii::t('app', 'List Pages'), 'url' => array('admin')),
);
$this->renderPartial('_form', array(
    'model' => $model));
?>