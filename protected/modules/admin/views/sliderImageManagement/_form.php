<div class="form">

    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'slider-image-management-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <h1><?php echo $form->labelEx($model, 'caption'); ?></h1>
        <?php echo $form->textField($model, 'caption',array('cols' => 250, 'rows' => 10)); ?>
        <?php echo $form->error($model, 'caption'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'description'); ?></h1>
        <?php echo $form->textArea($model, 'description',array('cols' => 250, 'rows' => 10)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'image_url'); ?></h1>
        <?php echo $form->fileField($model, 'image_url'); ?><br />
        <strong style="padding-left: 150px;color:red;">Note: Image ratio must be 953X436.</strong>
        <?php echo $form->error($model, 'image_url'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'status'); ?></h1>
        <?php echo $form->dropDownList($model, 'status', Yii::app()->params['defaultStatus']); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div><!-- row -->
    <div class="row">
        <?php
        echo GxHtml::submitButton(Yii::t('app', 'Save'));
        $this->endWidget();
        ?>
    </div>
</div><!-- form -->