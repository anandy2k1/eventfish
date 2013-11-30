<?php
$form = $this->beginWidget('GxActiveForm', array(
    'id' => 'plan-event-general-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
//echo $form->errorSummary($model);
?>
    <div id="one" class="tabContent">
        <div class="up-img-block">
            <div class="f-left">
                <div class="up-photos">
                    <div class="upload-container"> <span>
                        <?php
                        if (count($model->userPhotoses) < 3):
                            echo $form->fileField($model, 'vendor_image', array('class' => 'image-upload'));
                        endif;
                        ?>
                    </span></div>
                    <div class="add-photos-button">
                    <span class="button-add">
                        <?php
                        echo CHtml::image(Common::getVendorLastPhoto($model->userPhotoses));
                        ?>
                    </span>
                    </div>
                </div>
                <ul class="uploaded-img">
                    <?php
                    if ($model->userPhotoses):
                        $snTotalImages = count($model->userPhotoses);
                        foreach ($model->userPhotoses as $omUserPhotos):
                            ?>
                            <li>
                                <?php echo CHtml::image(Common::getVendorImage($omUserPhotos->photo_url), '', array('width' => '26px', 'height' => '30px')); ?>
                                <!--<li><img src="<?php //echo Yii::app()->baseUrl; ?>/images/default-img.png"></li>-->
                            </li>
                        <?php
                        endforeach; else:
                        ?>
                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/default-img.png"></li>
                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/default-img.png"></li>
                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/default-img.png"></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="f-right">
                <ul class="general-form">
                    <li class="checkbox">
                        <?php echo $form->checkBox($model, 'use_fb_picture'); ?> <span>Use your Facebook Photo</span>
                    </li>
                    <li>
                        <label><?php echo $form->labelEx($model, 'short_description'); ?></label>
                    <span>
                        <?php echo $form->textArea($model, 'short_description', array('class' => 'textarea')); ?>
                    </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="up-video-block">
            <div class="f-left">
                <div class="up-photos">
                    <div class="upload-container"> <span>
                        <?php echo $form->fileField($model, 'vendor_video', array('class' => 'image-upload')); ?>
                    </span></div>
                    <div class="add-photos-button">
                        <span class="button-add"> <img src="<?php echo Yii::app()->baseUrl; ?>/images/video.png"> </span>
                    </div>
                </div>
                <ul class="uploaded-img">
                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/vedio-1.png"></li>
                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/vedio-1.png"></li>
                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/vedio-1.png"></li>
                </ul>
            </div>
            <div class="f-right">
                <ul class="general-form">
                    <li><label>What days are you available?</label></li>
                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/proses-bg.png"></li>
                </ul>
            </div>
            <div class="add-qus">
                <label>Top 5 Question Asked: <em>Vendor Title</em></label>
                <?php if ($model->userTop5Questions):
                    $snTotalQuestion = 5;
                    $snUserQuestionCount = count($model->userTop5Questions);
                    foreach ($model->userTop5Questions as $omTop5Questions):
                        echo CHtml::textField('questions[]',$omTop5Questions->question, array('class' => "input"));
                    endforeach;
                    if ($snUserQuestionCount != $snTotalQuestion):?>
                        <span>
                            <span class="copy">
                                <?php echo CHtml::textField('questions[]', '', array('class' => "input")); ?>
                                <a id="copylink" href="#" rel=".copy" class="add-more">&nbsp;</a>
                            </span>
                            <?php
                            $this->widget('ext.jqrelcopy.JQRelcopy', array(
                                'id' => 'copylink',
                                //'removeText' => 'remove', //uncomment to add remove link
                                'options' => array(
                                    'limit' => $snTotalQuestion - $snUserQuestionCount,
                                )
                            ));
                            ?>
                        </span>
                    <?php
                    endif; else:?>
                    <span>
                        <span class="copy">
                            <?php echo CHtml::textField('questions[]', '', array('class' => "input")); ?>
                            <a id="copylink" href="#" rel=".copy" class="add-more">&nbsp;</a>
                        </span>
                        <?php
                        $this->widget('ext.jqrelcopy.JQRelcopy', array(
                            'id' => 'copylink',
                            //'removeText' => 'remove', //uncomment to add remove link
                            'options' => array(
                                'limit' => 5,
                            )
                        ));
                        ?>
                        </span>
                <?php endif; ?>
            </div>

            <div class="submit a-right">
                <?php echo GxHtml::htmlButton('<span><span>Next</span></span>', array('class' => 'button_green', 'type' => 'submit'));
                ?>
            </div>
        </div>
    </div>
<?php $this->endWidget(); ?>