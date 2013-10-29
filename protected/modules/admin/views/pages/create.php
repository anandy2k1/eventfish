<?php

$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
    Yii::t('app', 'Add')
);
$this->menu = array(
    array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));
?>