<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/local.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/popup.css"/>
<div class="form" style="background: #fff;">
    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'add-video-form',
        'enableAjaxValidation' => false
    ));
    ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'video_url'); ?>
        <?php echo $form->textField($model, 'video_url', array('size' => '50')); ?>
        <?php echo $form->error($model, 'video_url'); ?>
    </div>
    <!-- row -->
    <div class="row">
        <?php
        echo GxHtml::submitButton(Yii::t('app', 'Submit')) . '&nbsp;';
        echo GxHtml::button(Yii::t('app', 'Cancel'), array('onclick' => 'parent.jQuery.colorbox.close();'));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>