<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Manage Slider') => array('admin'),
    Yii::t('app', 'Add'),
);
$this->menu = array(
    array('label' => Yii::t('app', 'Manage Slider Images'), 'url' => array('admin')),
);
?>
<h1><?php echo Yii::t('app', 'Add Slider Image'); ?></h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));
?>