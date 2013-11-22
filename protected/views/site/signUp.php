<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/local.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/popup.css"/>


<div class="form vendorform">
    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'sign-up-form',
        'enableAjaxValidation' => true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'validateOnChange'=>false,
            'validateOnType'=>false,
        ),
    ));
   /* require_once Yii::getPathOfAlias('webroot')."/protected/extensions/facebook/lib/facebook.php";
    // Create our Application instance (replace this with your appId and secret).
    $facebook = new Facebook(array(
        'appId'  => Yii::app()->params['FACEBOOK_APPID'],
        'secret' => Yii::app()->params['FACEBOOK_SECRET'],
    ));
    // Login or logout url will be needed depending on current user state.
    $user = $facebook->getUser();
    if ($user)
    {
        try
        {
            // Proceed knowing you have a logged in user who's authenticated.
            $user_profile = $facebook->api('/me');
        }
        catch (FacebookApiException $e)
        {
            error_log($e);
            $user = null;
        }
    }
    $facebook_Url  = $facebook->getLoginUrl( array(	'req_perms' => 'email','login'=>'facebook'));
//    $facebook_Url  = $facebook->getLoginUrl( array(	'req_perms' => 'email','login'=>'facebook'));
    $params['facebook'] = $facebook_Url;*/
    ?>
    <div class="center-align">
        <span class="heading">Pick your account type</span><br/>
        <span id="loading" style="display:none;">Loading ...</span>
    </div>

    <div class="row usertype-radio">
        <?php echo $form->radioButtonList($model, 'role_id', $amRoles); ?>
        <?php echo $form->error($model, 'role_id'); ?>
    </div>
    <!-- row -->
    <div class="facebook" >
        <?php //echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/facebook.png'),$params['facebook'],array("target"=>"_top"));?>
        <?php
        $this->widget('application.widgets.facebook.Facebook',array('appId'=>Yii::app()->params['FACEBOOK_APPID'])); ?>
    </div>
    <div style="text-align: center;color:#545454;padding:13px 0;font-size: 20px;" onclick="toggleEmailsignup();">or sign up with you <span style="color:#5481a4;cursor: pointer;">email address </span></div>
    <div class="emailsignup" id="emailsignup">
        <table class="signup-table">
            <tr>
                <td>
                    <label><?php echo $form->labelEx($model, 'first_name'); ?></label>
                    <?php echo $form->textField($model, 'first_name', array('class'=> 'input success')); ?>
                    <?php echo $form->error($model, 'first_name'); ?>
                </td>
                <td>
                    <label><?php echo $form->labelEx($model, 'last_name'); ?></label>
                    <?php echo $form->textField($model, 'last_name',array('class'=> 'input success')); ?>
                    <?php echo $form->error($model, 'last_name'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">

                    <label><?php echo $form->labelEx($model, 'email'); ?></label><br/>
                    <?php echo $form->textField($model, 'email',array('class'=> 'input success','style'=>'width:330px;')); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label><?php echo $form->labelEx($model, 'password'); ?></label>
                    <?php echo $form->passwordField($model, 'password',array('class'=> 'input success')); ?>
                    <?php echo $form->error($model, 'password'); ?>
                </td>
                <td>
                    <label><?php echo $form->labelEx($model, 'retype_password'); ?></label>
                    <?php echo $form->passwordField($model, 'retype_password',array('class'=> 'input success')); ?>
                    <?php echo $form->error($model, 'retype_password'); ?>
                </td>
             </tr>
            <tr>
                <td colspan="2" align="right">
                    <?php echo GxHtml::submitButton(Yii::t('app', 'Sign Up'),array("class"=>"orangebutton"));?>
                </td>
            </tr>

        </table>
        <?php

        $this->endWidget();
        ?>
    </div>
    <script type="text/javascript">
        function toggleEmailsignup()
        {
            jQuery('#emailsignup').toggle('slow')
        }

    </script>
</div><!-- form -->
