<div>
    <span>Pick your account type</span>
</div>
<div class="form">
    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'sign-up-form',
        'enableAjaxValidation'=>false,
//        'clientOptions'=>array(
//            'validateOnSubmit'=>true,
//            'beforeSend' => '$("#loading").show();',
//            'complete' => '$("#loading").hide()'
//        ),
    ));
    ?>
    <div id="loading" style="display:none">Loading....</div>
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'user_type2'); ?></h1>
        <?php echo $form->radioButtonList($model, 'user_type2', Yii::app()->params['categoryType']); ?>
        <?php echo $form->error($model, 'user_type2'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'first_name'); ?></h1>
        <?php echo $form->textField($model, 'first_name', array('maxlength' => 255)); ?>
        <?php echo $form->error($model, 'first_name'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'last_name'); ?></h1>
        <?php echo $form->textField($model, 'last_name'); ?>
        <?php echo $form->error($model, 'last_name'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'email'); ?></h1>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'password'); ?></h1>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div><!-- row -->
    <div class="row">
        <h1><?php echo $form->labelEx($model, 'retype_password'); ?></h1>
        <?php echo $form->passwordField($model, 'retype_password'); ?>
        <?php echo $form->error($model, 'retype_password'); ?>
    </div><!-- row -->
    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Sign Up'));
    $this->endWidget();
    ?>
</div><!-- form -->
