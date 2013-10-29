<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'users-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model, 'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php echo $form->dropDownList($model, 'role_id', GxHtml::listDataEx(UserRole::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'role_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'facebook_id'); ?>
		<?php echo $form->textField($model, 'facebook_id', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'facebook_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'is_fblogin'); ?>
		<?php echo $form->checkBox($model, 'is_fblogin'); ?>
		<?php echo $form->error($model,'is_fblogin'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ssn_number'); ?>
		<?php echo $form->textField($model, 'ssn_number', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'ssn_number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'routing_number'); ?>
		<?php echo $form->textField($model, 'routing_number', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'routing_number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'account_number'); ?>
		<?php echo $form->textField($model, 'account_number', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'account_number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'bank_name'); ?>
		<?php echo $form->textField($model, 'bank_name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'bank_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model, 'first_name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'first_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model, 'last_name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'last_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address_1'); ?>
		<?php echo $form->textArea($model, 'address_1'); ?>
		<?php echo $form->error($model,'address_1'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address_2'); ?>
		<?php echo $form->textArea($model, 'address_2'); ?>
		<?php echo $form->error($model,'address_2'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'city'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'state_id'); ?>
		<?php echo $form->dropDownList($model, 'state_id', GxHtml::listDataEx(StateMaster::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'state_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->dropDownList($model, 'country_id', GxHtml::listDataEx(CountryMaster::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'country_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model, 'zip', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'zip'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'phone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'phone_type'); ?>
		<?php echo $form->textField($model, 'phone_type', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'phone_type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'date_of_birth',
			'value' => $model->date_of_birth,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model, 'gender', array('maxlength' => 6)); ?>
		<?php echo $form->error($model,'gender'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ethnicity'); ?>
		<?php echo $form->textField($model, 'ethnicity', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'ethnicity'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'income'); ?>
		<?php echo $form->textField($model, 'income', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'income'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'matial_status'); ?>
		<?php echo $form->textField($model, 'matial_status', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'matial_status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_type'); ?>
		<?php echo $form->checkBox($model, 'user_type'); ?>
		<?php echo $form->error($model,'user_type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_type2'); ?>
		<?php echo $form->textField($model, 'user_type2', array('maxlength' => 9)); ?>
		<?php echo $form->error($model,'user_type2'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'short_description'); ?>
		<?php echo $form->textArea($model, 'short_description'); ?>
		<?php echo $form->error($model,'short_description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php echo $form->textField($model, 'start_time'); ?>
		<?php echo $form->error($model,'start_time'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php echo $form->textField($model, 'end_time'); ?>
		<?php echo $form->error($model,'end_time'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'available_days'); ?>
		<?php echo $form->textField($model, 'available_days', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'available_days'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model, 'status'); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'last_login_at'); ?>
		<?php echo $form->textField($model, 'last_login_at'); ?>
		<?php echo $form->error($model,'last_login_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model, 'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('userCategories')); ?></label>
		<?php echo $form->checkBoxList($model, 'userCategories', GxHtml::encodeEx(GxHtml::listDataEx(UserCategories::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('userComments')); ?></label>
		<?php echo $form->checkBoxList($model, 'userComments', GxHtml::encodeEx(GxHtml::listDataEx(UserComments::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('userComments1')); ?></label>
		<?php echo $form->checkBoxList($model, 'userComments1', GxHtml::encodeEx(GxHtml::listDataEx(UserComments::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('userPhotoses')); ?></label>
		<?php echo $form->checkBoxList($model, 'userPhotoses', GxHtml::encodeEx(GxHtml::listDataEx(UserPhotos::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('userTop5Questions')); ?></label>
		<?php echo $form->checkBoxList($model, 'userTop5Questions', GxHtml::encodeEx(GxHtml::listDataEx(UserTop5Questions::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->