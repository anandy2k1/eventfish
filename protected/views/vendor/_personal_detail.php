<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.nouislider.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.nouislider.css"/>
<script>

    // Wait until the document is ready
    $(function () {

        // Initialise noUiSlider
        $('.noUiSlider').noUiSlider({
            range: [0, 24], start: [0, 24],
            step: 1, slide: function () {
                var values = $(this).val();
                $('#Users_start_time').val(values[0]);
                $('#Users_end_time').val(values[1]);
                $('#fromtime').text(parseInt(values[0]).toString().replace(/\b(\d{1})\b/g, '0$1'));
                $('#totime').text(parseInt(values[1]).toString().replace(/\b(\d{1})\b/g, '0$1'));
                /*$(this).next('span').text(
                 values[0] + "  TO  " + values[1]

                 );*/
            }
        });

    });


</script>
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
                        <?php echo CHtml::image(Common::getVendorImage($omUserPhotos->photo_url), '', array('style' => "width:37px !important;height:30px;")); ?>
                        <!--<li><img src="<?php //echo Yii::app()->baseUrl;        ?>/images/default-img.png"></li>-->
                    </li>
                <?php
                endforeach;
            else:
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
            <!--                <div class="upload-container" onclick="alert(12);"></div>-->
            <div class="add-photos-button">
                    <span class="button-add">
                        <?php
                        if (count($model->userVideoses) < 3):
                            echo CHtml::image(Common::getVendorLastVideoImage($model->userVideoses), 'Video Image', array('onclick' => 'js:openColorBox("' . Yii::app()->createUrl("vendor/addVideo") . '","500","600");return false;', 'class' => 'ajax', 'style' => 'cursor:pointer;'));
                        else:
                            echo CHtml::image(Common::getVendorLastVideoImage($model->userVideoses));
                        endif;?>
                    </span>
            </div>
        </div>
        <ul class="uploaded-img">
            <?php
            if ($model->userVideoses):
                $snTotalImages = count($model->userVideoses);
                foreach ($model->userVideoses as $omUserVideos):
                    ?>
                    <li>
                        <?php echo CHtml::image($omUserVideos->video_image, '', array('style' => "width:37px !important;height:30px;")); ?>
                    </li>
                <?php
                endforeach;
            else:
                ?>
                <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/vedio-1.png"></li>
                <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/vedio-1.png"></li>
                <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/vedio-1.png"></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="f-right">
        <ul class="general-form">
            <li><label>What days are you available?</label></li>
            <li>
                <div class="weekbox">
                    <div class="days">
                        <!--<img src="<?php //echo Yii::app()->baseUrl;        ?>/images/proses-bg.png">-->

                            <span class="days_span"><a href="javascript:void(0);" class="daylink s_check <?php echo @strstr($model->available_days, '0') ? 'active' : ''; ?>">Sun<input type="checkbox"
                                                                                                                                                                                        id="daycheck0"
                                                                                                                                                                                        class="styled"
                                                                                                                                                                                        name="Users[available_days][]" <?php echo @strstr($model->available_days, '0') ? 'checked="checked"' : ''; ?>
                                                                                                                                                                                        value="0"/></a></span>
                            <span class="days_span"><a href="javascript:void(0);" class="daylink m_check <?php echo @strstr($model->available_days, '1') ? 'active' : ''; ?>">Mon<input type="checkbox"
                                                                                                                                                                                        id="daycheck1"
                                                                                                                                                                                        class="styled"
                                                                                                                                                                                        name="Users[available_days][]" <?php echo @strstr($model->available_days, '1') ? 'checked="checked"' : ''; ?>
                                                                                                                                                                                        value="1"/></a></span>
                            <span class="days_span"><a href="javascript:void(0);" class="daylink t_check <?php echo @strstr($model->available_days, '2') ? 'active' : ''; ?>">Tue<input type="checkbox"
                                                                                                                                                                                        id="daycheck2"
                                                                                                                                                                                        class="styled"
                                                                                                                                                                                        name="Users[available_days][]" <?php echo @strstr($model->available_days, '2') ? 'checked="checked"' : ''; ?>
                                                                                                                                                                                        value="2"/></a></span>
                            <span class="days_span"><a href="javascript:void(0);" class="daylink w_check <?php echo @strstr($model->available_days, '3') ? 'active' : ''; ?>">Wed<input type="checkbox"
                                                                                                                                                                                        id="daycheck3"
                                                                                                                                                                                        class="styled"
                                                                                                                                                                                        name="Users[available_days][]" <?php echo @strstr($model->available_days, '3') ? 'checked="checked"' : ''; ?>
                                                                                                                                                                                        value="3"/></a></span>
                            <span class="days_span"><a href="javascript:void(0);" class="daylink t_check <?php echo @strstr($model->available_days, '4') ? 'active' : ''; ?>">Thu<input type="checkbox"
                                                                                                                                                                                        id="daycheck4"
                                                                                                                                                                                        class="styled"
                                                                                                                                                                                        name="Users[available_days][]" <?php echo @strstr($model->available_days, '4') ? 'checked="checked"' : ''; ?>
                                                                                                                                                                                        value="4"/></a></span>
                            <span class="days_span"><a href="javascript:void(0);" class="daylink f_check <?php echo @strstr($model->available_days, '5') ? 'active' : ''; ?>">Fri<input type="checkbox"
                                                                                                                                                                                        id="daycheck5"
                                                                                                                                                                                        class="styled"
                                                                                                                                                                                        name="Users[available_days][]" <?php echo @strstr($model->available_days, '5') ? 'checked="checked"' : ''; ?>
                                                                                                                                                                                        value="5"/></a></span>
                            <span class="days_span"><a href="javascript:void(0);" class="daylink s_check no-border <?php echo @strstr($model->available_days, '6') ? 'active' : ''; ?>">Sat<input
                                        type="checkbox"
                                        id="daycheck6"
                                        class="styled"
                                        name="Users[available_days][]" <?php echo @strstr($model->available_days, '6') ? 'checked="checked"' : ''; ?>
                                        value="6"/></a></span>
                    </div>

                    <table class="timeslidertable">
                        <tr>
                            <td width="10%" align="center">
                                <span id="fromtime">00</span>
                            </td>
                            <td width="65%">
                                <div id="slider_time" class="noUiSlider"></div>
                            </td>
                            <td width="15%" style="padding-left:12px; " align="center">
                                <span id="totime">24</span>
                            </td>
                        </tr>
                    </table>
                    <?php
                    echo $form->hiddenField($model, 'start_time', array('value' => '1'));
                    echo $form->hiddenField($model, 'end_time', array('value' => '24'));
                    ?>
                </div>
            </li>
            <li>

            </li>
        </ul>
    </div>
    <div class="add-qus">
        <label>Top 5 Question Asked: <em>Vendor Title</em></label>
        <?php
        if ($model->userTop5Questions):
            $snTotalQuestion = 5;
            $snUserQuestionCount = count($model->userTop5Questions);
            foreach ($model->userTop5Questions as $omTop5Questions):
                echo CHtml::textField('questions[]', $omTop5Questions->question, array('class' => "input"));
            endforeach;
            if ($snUserQuestionCount != $snTotalQuestion):
                ?>
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
            endif;
        else:
            ?>
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
    <div class="clear"></div>
    <div class="submit a-right">
        <?php echo GxHtml::htmlButton('<span><span>Next</span></span>', array('class' => 'button_green', 'type' => 'submit'));
        ?>
    </div>
</div>
</div>
<?php $this->endWidget(); ?>
<script>
    $(".daylink").click(function () {
        if (!$(this).hasClass("active")) {
            $(this).addClass("active");
            var snCheckboxId = $(this).children('input').attr('id');
            $("#" + snCheckboxId).attr('checked', 'checked');
        }
        else {
            $(this).removeClass("active");
            var snCheckboxId = $(this).children('input').attr('id');
            //$("#"+snCheckboxId).attr('checked','');
            $("#" + snCheckboxId).attr('checked', false);
        }
    });
</script>