<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'parent_id',
array(
			'name' => 'role',
			'type' => 'raw',
			'value' => $model->role !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->role)), array('userRole/view', 'id' => GxActiveRecord::extractPkValue($model->role, true))) : null,
			),
'email',
'password',
'facebook_id',
'is_fblogin:boolean',
'ssn_number',
'routing_number',
'account_number',
'bank_name',
'first_name',
'last_name',
'address_1',
'address_2',
'city',
array(
			'name' => 'state',
			'type' => 'raw',
			'value' => $model->state !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->state)), array('stateMaster/view', 'id' => GxActiveRecord::extractPkValue($model->state, true))) : null,
			),
array(
			'name' => 'country',
			'type' => 'raw',
			'value' => $model->country !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->country)), array('countryMaster/view', 'id' => GxActiveRecord::extractPkValue($model->country, true))) : null,
			),
'zip',
'phone',
'phone_type',
'date_of_birth',
'gender',
'ethnicity',
'income',
'marital_status',
'user_type:boolean',
'short_description',
'start_time',
'end_time',
'available_days',
'status:boolean',
'last_login_at',
'created_at',
'updated_at',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('userCategories')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->userCategories as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('userCategories/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('userComments')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->userComments as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('userComments/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('userComments1')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->userComments1 as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('userComments/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('userPhotoses')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->userPhotoses as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('userPhotos/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('userTop5Questions')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->userTop5Questions as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('userTop5Questions/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>