<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);


?>
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/local.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/popup.css"/>

<div class="vendorform ">
    <div class="center-align">
        <span class="heading">Login</span>
    </div>

    <!--<p class="no-margin no-padding" style="font-size: 12px;">Please fill out the following form with your login credentials:</p>-->

    <div class="form login-form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>

        <p class="note no-margin no-padding" style="font-size: 12px;color:red;">Fields with <span class="required">*</span> are required.</p>
        <table class="signup-table">
            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'username'); ?><br/>
                    <?php echo $form->textField($model, 'username', array('class' => 'input success')); ?>
                    <?php echo $form->error($model, 'username'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'password'); ?><br/>
                    <?php echo $form->passwordField($model, 'password', array('class' => 'input success')); ?>
                    <?php echo $form->error($model, 'password'); ?>
                </td>
            </tr>
            <tr>
                <td align="left" colspan="2">
                    <?php echo $form->checkBox($model, 'rememberMe'); ?>
                    <?php echo $form->label($model, 'rememberMe'); ?>
                    <?php echo $form->error($model, 'rememberMe'); ?>
                </td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <?php echo CHtml::submitButton('Login', array("class" => "orangebutton")); ?>
                </td>
            </tr>
        </table>








        <?php $this->endWidget(); ?>
    </div>
    <!-- form -->
</div>