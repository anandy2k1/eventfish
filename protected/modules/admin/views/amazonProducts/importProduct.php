<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Manage Products') => array('admin'),
    Yii::t('app', 'Import'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'Manage Products'), 'url' => array('admin')),
);
?>
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
        <?php echo $form->labelEx($model, 'search_type'); ?>
        <?php echo $form->textField($model, 'search_type'); ?>
        <?php echo $form->error($model, 'search_type'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'category_ids'); ?>
        <?php echo $form->ListBox($model, 'category_ids', $amCategories, array('size' => '5', 'multiple' => 'multiple')); ?>
        <?php echo $form->error($model, 'category_ids'); ?>
    </div><!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Submit'));
    $this->endWidget();
    ?>
</div><!-- form -->