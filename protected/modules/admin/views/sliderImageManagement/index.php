<?php

$this->breadcrumbs = array(
	SliderImageManagement::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . SliderImageManagement::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . SliderImageManagement::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(SliderImageManagement::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 