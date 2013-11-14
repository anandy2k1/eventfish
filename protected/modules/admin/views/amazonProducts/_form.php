<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'amazon-products-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'amazon_product_id'); ?>
        <?php echo $form->textField($model, 'amazon_product_id', array('maxlength' => 255)); ?>
        <?php echo $form->error($model, 'amazon_product_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'product_name'); ?>
        <?php echo $form->textField($model, 'product_name', array('maxlength' => 255)); ?>
        <?php echo $form->error($model, 'product_name'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'product_image'); ?>
        <?php echo $form->textField($model, 'product_image', array('maxlength' => 255)); ?>
        <?php echo $form->error($model, 'product_image'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'product_description'); ?>
        <?php echo $form->textArea($model, 'product_description'); ?>
        <?php echo $form->error($model, 'product_description'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'reviews'); ?>
        <?php echo $form->textField($model, 'reviews', array('maxlength' => 10)); ?>
        <?php echo $form->error($model, 'reviews'); ?>
    </div><!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->