<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'amazon_product_id'); ?>
		<?php echo $form->textField($model, 'amazon_product_id', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'product_name'); ?>
		<?php echo $form->textField($model, 'product_name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'product_image'); ?>
		<?php echo $form->textField($model, 'product_image', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'product_description'); ?>
		<?php echo $form->textArea($model, 'product_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'reviews'); ?>
		<?php echo $form->textField($model, 'reviews', array('maxlength' => 10)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
