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
                $('#Event_start_time').val(values[0]);
                $('#Event_end_time').val(values[1]);
                $('#fromtime').text(parseInt(values[0]).toString().replace(/\b(\d{1})\b/g, '0$1'));
                $('#totime').text(parseInt(values[1]).toString().replace(/\b(\d{1})\b/g, '0$1'));
            }
        });
    });
</script>
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>
<div class="container event-planner">
<div class="event-cat">
    <ul>
        <li class="complete">
            <h1>
                <img src="<?php echo Yii::app()->baseUrl; ?>/images/fish-icon.png" alt="" class="margin_right"/>
                <?php echo CHtml::link('General', Yii::app()->createUrl('eventPlanner/planEventGeneralEdit', array('id' => $oEventModel->id)), array('style' => 'color:#fff;')); ?>
            </h1>

            <div class="details">
                <?php
                echo CHtml::image(Common::getEventImage($oEventModel->event_image), '', array('width' => '120px', 'height' => '100px'));
                echo "<div class='clear' style='height:1px;'>&nbsp;</div>" . $oEventModel->event_title;
                ?>
            </div>
        </li>
        <li class="complete">
            <h1><img src="<?php echo Yii::app()->baseUrl; ?>/images/food-icon.png" alt="" class="margin_right"/>Food</h1>

            <div class="details"></div>
        </li>
        <li <?php echo ($oEventAccessories) ? 'class="complete"' : ''; ?>>
            <h1 class="two-line">
                <?php if ($oEventAccessories): ?>
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/acce-icon.png" alt=""/>
                    <?php echo CHtml::link('Accessories & Rentals', Yii::app()->createUrl('eventPlanner/planEventAccessoriesEdit', array('id' => $oEventModel->id)), array('style' => 'color:#fff;')); ?>
                <?php else: ?>
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/acce-icon.png" alt=""/>Accessories & Rentals
                <?php endif; ?>
            </h1>
            <div class="details">
                <?php if ($oEventAccessories):
                    echo CHtml::image(Yii::app()->baseUrl."/images/accessories.png", '', array('width' => '120px', 'height' => '100px', 'style' => 'margin-top:5px;'));
                    echo "<div class='clear' style='height:1px;'>&nbsp;</div> Birthday Suppy Pack";
                endif; ?>
            </div>
        </li>
        <li class="complete">
            <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/entertai-icon.png" alt=""/>Entertainers& Personnel</h1>

            <div class="details"></div>
        </li>
        <li class="complete">
            <h1><img src="<?php echo Yii::app()->baseUrl; ?>/images/trans-icon.png" alt="" class="margin_right"/>Transport</h1>

            <div class="details"></div>
        </li>
        <li class="active last">
            <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/gift-icon.png" alt=""/>Invitations & Gifts</h1>

            <div class="details"></div>
        </li>
    </ul>
</div>

<div class="event-block-bg">
<div class="event-block-title-bg">
    <div class="ribbn"><img src="<?php echo Yii::app()->baseUrl; ?>/images/ribbon-1.png" alt=""/></div>
    Invitation & Gifts
</div>
<div class="tab-menu">
    <ul>
        <li id="tabHead1" onclick="callpagecategory('<?php echo Yii::app()->params['categoryParentId']['partyAccessories'] ?>');tabToggle(1,4);" class="active first">Party Accessories</li>
        <li id="tabHead2" onclick="callpagecategory('<?php echo Yii::app()->params['categoryParentId']['equipmentRentals'] ?>');tabToggle(2,4);">Equipment Rentals</li>
        <li id="tabHead3" onclick="callpagecategory('<?php echo Yii::app()->params['categoryParentId']['costumes'] ?>');tabToggle(3,4);">Costumes</li>
        <li id="tabHead4" onclick="callpagecategory('<?php echo Yii::app()->params['categoryParentId']['cloths'] ?>');tabToggle(4,4);" class="last">Clothes</li>
    </ul>
</div>
<div style="clear:both">&nbsp;</div>
<div class="tab-content-bg whitebg">
<div style="display: none;" class="cat-menu-bg">
    <div class="cat-menu">
        <ul>
            <li class="delet"><a href="#">Category<img src="<?php echo Yii::app()->baseUrl; ?>/images/cross-icon.png" alt=""/></a></li>
            <li><a href="#">Category</a></li>
            <li><a href="#">Category</a></li>
            <li><a href="#">Category</a></li>
            <li style="padding:10px 0 0 0;"><a href="#">Category</a></li>
        </ul>
    </div>
    <div style="clear:both;"></div>
    <div class="cat-menu1">
        <ul>
            <li><a href="#">Category</a></li>
            <li class="delet1" style="margin:0 0 0 30px; padding:10px 60px 0 0px;"><a href="#">Category<img src="<?php echo Yii::app()->baseUrl; ?>/images/add-1.png" alt=""/></a></li>
            <li style="padding:10px 80px 0 0px;"><a href="#">Category</a></li>
            <li style="padding:10px 80px 0 0px;"><a href="#">Category</a></li>
            <li style="padding:10px 0 0 0;"><a href="#">Category</a></li>
        </ul>
    </div>
</div>
<div id="equalize" class="container">
<div class="event-send-invitation eventplanner-steps">
<div class="">Want to Promote Your Event on Facebook?</div>
<div class="confirm-dashboard">
    <ul>
        <li class="disable current">
            <p class="icon">1</p>

            <h2>My Event Details</h2>
        </li>
        <li class="disable">
            <p class="icon">2</p>

            <h2>Invite My Friends</h2>
        </li>
        <li class="disable">
            <p class="icon">3</p>

            <h2>Review</h2>
        </li>
    </ul>
</div>
<div style="clear:both;">&nbsp;</div>



</div>
<div class="event-general-content">
<?php
$form = $this->beginWidget('GxActiveForm', array(
    'id' => 'plan-event-general-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
echo CHtml::hiddenField('id', $oEventModel->id);
//echo $form->errorSummary($oEventModel);
?>
<div class="event-send-invitation-form">
    <div class="row">
        <div class="f-left">
            <div class="up-photos">
                <div class="add-photos-button">
                    <span class="button-add">
                        <?php
                        echo CHtml::image(Common::getEventImage($oEventModel->event_image), '', array('onclick'=>'$("#Event_event_image").click();', 'style' => 'cursor:pointer; width:100%;', 'id' => 'profile-photo'));
                        ?>
                        <?php
                        echo $form->fileField($oEventModel, 'event_image', array('onchange' => 'readURL(this,"profile-photo")','class'=>'image-file')); ?>
                    </span>
                    <label>Someone Birthday</label>
                </div>
            </div>
            <div><?php echo $form->error($oEventModel, 'event_image'); ?></div>
            <p class="chg-event"><a href="#">Change Event</a></p>

            <div class="time-block">
                <h2>Set Time and Date</h2>

                <div class="col">
                    <label><?php echo $form->labelEx($oEventModel, 'start_date'); ?></label>
                        <span>
                            <?php
                            $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $oEventModel,
                                'attribute' => 'start_date',
                                'value' => date('Y-m-d', strtotime($oEventModel->start_date)),
                                'options' => array(
                                    'showButtonPanel' => true,
                                    'buttomImageOnly' => true,
                                    'showTime' => true,
                                    'changeYear' => true,
                                    'changeMonth' => true,
                                    'dateFormat' => 'yy-mm-dd',
                                    'buttonImage' => Yii::app()->baseUrl . '/images/date-icon.png',
                                    'showOn' => 'button',
                                    'minDate' => 'new Date()',
                                )
                            ));
                            ?>
                        </span>
                    <?php echo $form->error($oEventModel, 'start_date'); ?>
                </div>
                <div class="col last">
                    <label><?php echo $form->labelEx($oEventModel, 'end_Date'); ?></label>
                        <span>
                            <?php
                            $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $oEventModel,
                                'attribute' => 'end_date',
                                'value' => date('Y-m-d', strtotime($oEventModel->end_date)),
                                'options' => array(
                                    'showButtonPanel' => true,
                                    'buttomImageOnly' => true,
                                    'showTime' => true,
                                    'changeYear' => true,
                                    'changeMonth' => true,
                                    'dateFormat' => 'yy-mm-dd',
                                    'buttonImage' => Yii::app()->baseUrl . '/images/date-icon.png',
                                    'showOn' => 'button',
                                    'minDate' => 'new Date()',
                                )
                            ));
                            ?>
                        </span>
                    <?php echo $form->error($oEventModel, 'end_date'); ?>
                </div>
            </div>
            <div class="slider-range">
                <table class="timeslidertable">
                    <tr>
                        <td width="4%">
                            <span id="fromtime">

                                <script>
                                    document.write(parseInt('<?php echo $oEventModel->start_time;?>').toString().replace(/\b(\d{1})\b/g, '0$1'));
                                </script>
                            </span>
                        </td>
                        <td width="80%">
                            <div id="slider_time" class="noUiSlider"></div>
                        </td>
                        <td width="10%" style="padding-left:12px; ">
                            <span id="totime">
                                <script>
                                    document.write(parseInt('<?php echo $oEventModel->end_time;?>').toString().replace(/\b(\d{1})\b/g, '0$1'));
                                </script>
                            </span>
                        </td>
                    </tr>
                </table>
                <?php //echo CHtml::image(Yii::app()->baseUrl . "/images/slider-range.png"); ?>
                <!--<div id="slider_time" class="noUiSlider"></div>-->

                <span></span>
                <?php
                echo $form->hiddenField($oEventModel, 'start_time', array('value' => $oEventModel->start_time));
                echo $form->hiddenField($oEventModel, 'end_time', array('value' => $oEventModel->end_time));
                ?>
            </div>
        </div>
        <div class="f-right">
            <h1><span>Event Info</span></h1>
            <ul class="info">
                <li>
                    <label><?php echo $form->labelEx($oEventModel, 'event_title'); ?></label>
                        <span>
                            <?php echo $form->textField($oEventModel, 'event_title', array("class" => "input")); ?>
                        </span>
                    <?php echo $form->error($oEventModel, 'event_title'); ?>
                </li>
                <li>
                    <label><?php echo $form->labelEx($oEventModel, 'person_age'); ?></label>
                        <span>
                            <?php echo $form->dropDownList($oEventModel, 'person_age', array('10-20' => '10-20', '20-30' => '20-30'), array('prompt' => 'Age', 'class' => 'select')); ?>
                        </span></li>
                <li>
                    <?php echo $form->labelEx($oEventModel, 'person_gender'); ?>
                    <span>
                            <p class="field switch">
                                <?php
                                echo $form->radioButtonList($oEventModel, 'person_gender', array('Male' => 'Male', 'Female' => 'Female'), array(
                                    'labelOptions' => array('style' => 'display:inline;display:none;'), // add this code
                                    'separator' => '',
                                ));
                                if ($oEventModel->person_gender == "Female") {
                                    ?>
                                    <label for="Event_person_gender_1" class="cb-enable selected"><span>Female</span></label>
                                    <label for="Event_person_gender_0" class="cb-disable"><span>Male</span></label>
                                <?php
                                } else {
                                    ?>
                                    <label for="Event_person_gender_0" class="cb-enable selected"><span>Male</span></label>
                                    <label for="Event_person_gender_1" class="cb-disable"><span>Female</span></label>
                                <?php
                                }
                                ?>
                            </p>
                        </span></li>
            </ul>
            <h1><span>Event Location</span></h1>
            <ul class="location">
                <li class="chk-box">
                    <?php echo CHtml::checkBox('use_my_address', $bChecked) ?>
                    <span>Use my address</span></li>
                <li>
                    <?php echo $form->labelEx($oEventModel, 'address_1'); ?>
                    <span>
                            <?php echo $form->textField($oEventModel, 'address_1', array('class' => 'input')); ?>
                        </span>
                    <?php echo $form->error($oEventModel, 'address_1'); ?>
                </li>
                <li>
                    <?php echo $form->labelEx($oEventModel, 'address_2'); ?>
                    <span>
                            <?php echo $form->textField($oEventModel, 'address_2', array('class' => 'input')); ?>
                        </span>
                </li>
                <li>
                    <div class="city">
                        <?php echo $form->labelEx($oEventModel, 'city'); ?>
                        <span>
                                <?php echo $form->textField($oEventModel, 'city', array('class' => 'input')); ?>
                            </span>
                        <?php echo $form->error($oEventModel, 'city'); ?>
                    </div>
                    <div class="state">
                        <?php echo $form->labelEx($oEventModel, 'state_id'); ?>
                        <span>
                                <?php echo $form->dropDownList($oEventModel, 'state_id', $amStates, array('class' => 'select')); ?>
                            </span>
                        <?php echo $form->error($oEventModel, 'state_id'); ?>
                    </div>
                    <div class="zipcode">
                        <?php echo $form->labelEx($oEventModel, 'zip'); ?>
                        <span>
                                <?php echo $form->textField($oEventModel, 'zip', array('class' => 'input')); ?>
                            </span>
                        <?php echo $form->error($oEventModel, 'zip'); ?>
                    </div>
                </li>
                <li>
                    <label>Additional Information</label>
                        <span>
                            <?php echo $form->textArea($oEventModel, 'additional_info'); ?>
                        </span>
                </li>
            </ul>
            <div class="submit a-right">
                <?php //echo CHtml::link(Yii::t('app', 'Back'), 'javascript:void(0);', array('class' => 'button_orange')); ?>
                <?php echo CHtml::submitButton(Yii::t('app', 'Save and Continue'), array('class' => 'button_green')); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
</div>
</div>

<div style="clear:both;">&nbsp;</div>
</div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".cb-enable").click(function () {
            var parent = $(this).parents('.switch');
            $('.cb-disable', parent).removeClass('selected');
            $(this).addClass('selected');
            $('.checkbox', parent).attr('checked', true);
        });
        $(".cb-disable").click(function () {
            var parent = $(this).parents('.switch');
            $('.cb-enable', parent).removeClass('selected');
            $(this).addClass('selected');
            $('.checkbox', parent).attr('checked', false);
        });

        $("input[type=checkbox]").change(function () {
            if ($(this).is(':checked')) {
                $('#Event_address_1').val('<?php echo $amUserData->address_1; ?>');
                $('#Event_address_2').val('<?php echo $amUserData->address_2; ?>');
                $('#Event_city').val('<?php echo $amUserData->city; ?>');
                $('#Event_zip').val('<?php echo $amUserData->zip; ?>');
                $('#Event_state_id').val('<?php echo $amUserData->state_id ?>');
            } else {
                $('#Event_address_1').val('');
                $('#Event_address_2').val('');
                $('#Event_city').val('');
                $('#Event_zip').val('');
                $('#Event_state_id').val('');
                return false;
            }
        });
    });

    function readURL(input, imgId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + imgId)
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    //w readURL(document.getElementById('event_image'),"profile-photo");

</script>