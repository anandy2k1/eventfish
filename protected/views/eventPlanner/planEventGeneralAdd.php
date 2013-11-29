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
                /*$(this).next('span').text(
                    values[0] + "  TO  " + values[1]

                );*/
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
        <li class="active">
            <h1>
                <img src="<?php echo Yii::app()->baseUrl; ?>/images/fish-icon.png" alt="" class="margin_right"/><?php echo CHtml::link('General', array('eventPlanner/planEventGeneral'), array('style' => 'color:#fff;')); ?>
            </h1>

            <div class="details" onclick="window.location.href = '<?php echo Yii::app()->createUrl('eventplanner/planEventGeneral'); ?>'"></div>
        </li>
        <li class="complete">
            <h1><img src="<?php echo Yii::app()->baseUrl; ?>/images/food-icon.png" alt="" class="margin_right"/>Food
            </h1>

            <div class="details"></div>
        </li>
        <li>
            <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/acce-icon.png" alt=""/>Accessories
                & Rentals</h1>

            <div class="details"></div>
        </li>
        <li>
            <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/entertai-icon.png" alt=""/>Entertainers
                & Personnel</h1>

            <div class="details"></div>
        </li>
        <li>
            <h1><img src="<?php echo Yii::app()->baseUrl; ?>/images/trans-icon.png" alt="" class="margin_right"/>Transport
            </h1>

            <div class="details"></div>
        </li>
        <li class="last">
            <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/gift-icon.png" alt=""/>Invitations
                & Gifts</h1>

            <div class="details"></div>
        </li>
    </ul>
</div>

<?php
$form = $this->beginWidget('GxActiveForm', array(
    'id' => 'plan-event-general-form',
    'enableAjaxValidation' => false,
    /*'clientOptions'=>array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>false,
        'validateOnType'=>false,
    ),*/
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
//echo $form->errorSummary($model);
?>

<div class="event-form">

    <div class="title">
        <span>1</span>

        <h1><strong>General:</strong> Add Your Event Details </h1>
    </div>
    <div class="row">
        <div class="f-left">
            <div class="up-photos">
                <div class="upload-container"> <span>
                            <?php echo $form->fileField($model, 'event_image', array('class' => 'image-upload','onchange' => 'readURL(this,"profile-photo")')); ?>
                        </span></div>
                <div class="add-photos-button">
                    <span class="button-add">
                        <?php echo CHtml::image(Yii::app()->baseUrl . "/images/up-img.png",'',array('style'=>'width:100%;','id'=>'profile-photo')); ?>
                    </span>
                    <label>Someone Birthday</label>
                </div>
            </div>
            <div><?php echo $form->error($model, 'event_image'); ?></div>
            <p class="chg-event"><a href="#">Change Event</a></p>

            <div class="time-block">
                <h2>Set Time and Date</h2>

                <div class="col">
                    <label><?php echo $form->labelEx($model, 'start_date'); ?></label>
                        <span>
                            <?php
                            $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'start_date',
                                'value' => $model->start_date,
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
                    <?php echo $form->error($model, 'start_date'); ?>
                </div>
                <div class="col last">
                    <label><?php echo $form->labelEx($model, 'end_Date'); ?></label>
                        <span>
                            <?php
                            $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'end_date',
                                'value' => $model->end_date,
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
                    <?php echo $form->error($model, 'end_date'); ?>
                </div>
            </div>
            <div class="slider-range">
                <?php //echo CHtml::image(Yii::app()->baseUrl . "/images/slider-range.png"); ?>
                <table class="timeslidertable">
                    <tr>
                        <td width="4%">
                            <span id="fromtime">00</span>
                        </td>
                        <td width="80%">
                            <div  id="slider_time" class="noUiSlider"></div>
                        </td>
                        <td width="10%" style="padding-left:12px; ">
                            <span id="totime">24</span>
                        </td>
                    </tr>
                </table>
                <?php
                echo $form->hiddenField($model, 'start_time', array('value' => '1'));
                echo $form->hiddenField($model, 'end_time', array('value' => '24'));
                ?>
            </div>
        </div>
        <div class="f-right">
            <h1><span>Event Info</span></h1>
            <ul class="info">
                <li>
                    <label><?php echo $form->labelEx($model, 'event_title'); ?></label>
                        <span>
                            <?php echo $form->textField($model, 'event_title', array("class" => "input")); ?>                            
                        </span>
                    <?php echo $form->error($model, 'event_title'); ?>
                </li>
                <li>
                    <label><?php echo $form->labelEx($model, 'person_age'); ?></label>
                        <span>
                            <?php echo $form->dropDownList($model, 'person_age', array('10-20' => '10-20', '20-30' => '20-30'), array('prompt' => 'Age', 'class' => 'select')); ?>
                        </span></li>
                <li>
                    <?php echo $form->labelEx($model, 'person_gender'); ?>
                    <span>
                            <p class="field switch">
                                <?php
                                echo $form->radioButtonList($model, 'person_gender', array('Male' => 'Male', 'Female' => 'Female'), array(
                                    'labelOptions' => array('style' => 'display:inline;display:none;'), // add this code
                                    'separator' => '',
                                ));
                                if ($model->person_gender == "Female") {
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
                    <?php echo $form->labelEx($model, 'address_1'); ?>
                    <span>
                            <?php echo $form->textField($model, 'address_1', array('class' => 'input')); ?>
                        </span>
                    <?php echo $form->error($model, 'address_1'); ?>
                </li>
                <li>
                    <?php echo $form->labelEx($model, 'address_2'); ?>
                    <span>
                            <?php echo $form->textField($model, 'address_2', array('class' => 'input')); ?>
                        </span>
                </li>
                <li>
                    <div class="city">
                        <?php echo $form->labelEx($model, 'city'); ?>
                        <span>
                                <?php echo $form->textField($model, 'city', array('class' => 'input')); ?>
                            </span>
                        <?php echo $form->error($model, 'city'); ?>
                    </div>
                    <div class="state">
                        <?php echo $form->labelEx($model, 'state_id'); ?>
                        <span>
                                <?php echo $form->dropDownList($model, 'state_id', $amStates, array('class' => 'select')); ?>
                            </span>
                        <?php echo $form->error($model, 'state_id'); ?>
                    </div>
                    <div class="zipcode">
                        <?php echo $form->labelEx($model, 'zip'); ?>
                        <span>
                                <?php echo $form->textField($model, 'zip', array('class' => 'input')); ?>
                            </span>
                        <?php echo $form->error($model, 'zip'); ?>
                    </div>
                </li>
                <li>
                    <label>Additional Information</label>
                        <span>
                            <?php echo $form->textArea($model, 'additional_info'); ?>
                        </span>
                </li>
            </ul>
            <div class="submit a-right">
                <?php echo CHtml::link(Yii::t('app', 'Back'), 'javascript:void(0);', array('class' => 'button_orange')); ?>
                <?php echo CHtml::submitButton(Yii::t('app', 'Save and Continue'), array('class' => 'button_green')); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
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

    function readURL(input,imgId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + imgId)
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>