<div class="form">
    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'category-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>
    <?php echo $form->errorSummary($model); ?>
    <?php /*
      <div class="row">
      <?php echo $form->labelEx($model, 'parent_id'); ?>
      <?php echo $form->dropDownList($model, 'parent_id', $amCategories); ?>
      <?php echo $form->error($model, 'parent_id'); ?>
      </div><!-- row -->
     */ ?>
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'category_type'); ?></h1>
        <?php echo $form->dropDownList($model, 'category_type', Yii::app()->params['categoryType']); ?>
        <?php echo $form->error($model, 'category_type'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'parent_id'); ?></h1>
        <?php echo $form->dropDownList($model, 'parent_id', Category::getAllActiveCategories('VENDOR', true, true), array('prompt' => 'Select')); ?>
        <?php echo $form->error($model, 'parent_id'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'category_name'); ?></h1>
        <?php echo $form->textField($model, 'category_name', array('maxlength' => 255)); ?>
        <?php echo $form->error($model, 'category_name'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'category_image'); ?></h1>
        <?php echo $form->fileField($model, 'category_image'); ?>
        <?php echo $form->error($model, 'image_url'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'category_description'); ?></h1>
        <?php echo $form->textArea($model, 'category_description'); ?>
        <?php echo $form->error($model, 'category_description'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'status'); ?></h1>
        <?php echo $form->dropDownList($model, 'status', array(0 => "InActive", 1 => "Active")); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div><!-- row -->

    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->