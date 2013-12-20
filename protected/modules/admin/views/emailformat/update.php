<?php
$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
	Yii::t('app', 'Update'),
);
$this->renderPartial('_form', array(
    'model' => $model));
?>