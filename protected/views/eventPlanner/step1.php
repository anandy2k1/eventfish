<div class="event-dashboard eventplanner-steps">
    <div class="confirm-dashboard">
        <ul>
            <li class="disable current">
                <p class="icon">1</p>

                <h3>Personal Details </h3>
            </li>
            <li class="disable">
                <p class="icon">2</p>

                <h3>My Wish list</h3>
            </li>
            <li class="disable">
                <p class="icon">3</p>

                <h3>Review</h3>
            </li>
        </ul>
    </div>

    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'event-step1-form',
        'enableAjaxValidation' => false
    ));
    ?>

    <div class="account-details">
        <div class="create-profile">


            <div class="general-form">
                <ul>

                    <li>
                        <label><?php echo $form->labelEx($model, 'address_1'); ?></label>
                        <span><?php echo $form->textField($model, 'address_1', array('class' => 'input  ')); ?></span>
                    </li>
                    <li>
                        <label><?php echo $form->labelEx($model, 'address_2'); ?></label>
                        <span><?php echo $form->textField($model, 'address_2', array('class' => 'input  ')); ?></span>
                    </li>

                    <li>
                        <div class="city">
                            <label><?php echo $form->labelEx($model, 'city'); ?></label>
                                <span>
                                    <?php echo $form->textField($model, 'city', array('class' => 'input  ')); ?>
                                </span>
                        </div>
                        <div class="state">


                            <label><?php echo $form->labelEx($model, 'state_id'); ?></label>
                                <span>
                            <?php echo $form->dropDownList($model, 'state_id', $amStates, array('class' => 'select')); ?>
                                </span>
                        </div>
                        <div class="zipcode">
                            <label> <?php echo $form->labelEx($model, 'zip'); ?>
                            </label>
                                <span>
                                    <?php echo $form->textField($model, 'zip', array('class' => 'zipcode input ')); ?>
                                </span>
                        </div>
                    </li>

                    <li class="phone">

                        <label><?php echo $form->labelEx($model, 'phone'); ?></label>
                        <span>
                            <?php echo $form->textField($model, 'phone', array("class" => "input ")); ?>
                            <?php /*echo $form->dropDownList($model, 'phone_type', array('HOME' => 'Home', 'MONBILE' => 'Mobile'), array("class" => "select")); */?><!--
                            <button class="add-more">&nbsp;</button>-->
                        </span>
                    </li>
                    <li class="phone">

                        <label><?php echo $form->labelEx($model, 'mobile'); ?></label>
                        <span>
                            <?php echo $form->textField($model, 'mobile', array("class" => "input ")); ?>
                        </span>
                    </li>
                    <li class="phone">

                        <label><?php echo $form->labelEx($model, 'office_phone'); ?></label>
                        <span>
                            <?php echo $form->textField($model, 'office_phone', array("class" => "input ")); ?>
                        </span>
                    </li>
                    <li>
                        <label><?php echo $form->labelEx($model, 'date_of_birth'); ?></label>
                            <span>
                                <?php
                                $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'date_of_birth',
                                    'value' => $model->date_of_birth,
                                    'options' => array(
                                        'showButtonPanel' => true,
                                        'changeYear' => true,
                                        'changeMonth' => true,
                                        'dateFormat' => 'yy-mm-dd'
                                    )
                                ));
                                ?>
                            </span>
                    </li>
                    <li>
                        <div class="col">
                            <?php echo $form->labelEx($model, 'gender'); ?>

                            <p class="field switch">
                                <?php echo $form->radioButtonList($model, 'gender', array('Male' => 'Male', 'Female' => 'Female'), array(
                                    'labelOptions' => array('style' => 'display:inline;display:none;'), // add this code
                                    'separator' => '',
                                ));
                                if ($model->gender == "Female")
                                {
                                    ?>
                                    <label for="Users_gender_1" class="cb-enable selected"><span>Female</span></label>
                                    <label for="Users_gender_0" class="cb-disable"><span>Male</span></label>
                                    <?php
                                }
                                else
                                {
                                 ?>
                                    <label for="Users_gender_0" class="cb-enable selected"><span>Male</span></label>
                                    <label for="Users_gender_1" class="cb-disable"><span>Female</span></label>
                                <?php
                                }
                                ?>
                            </p>


                        </div>
                        <div class="col">


                            <label><?php echo $form->labelEx($model, 'ethnicity'); ?></label>
                                <span>
                        <?php echo $form->dropDownList($model, 'ethnicity', Yii::app()->params['displayEthnicity'], array("class" => "select")); ?>
                                </span>
                        </div>
                    </li>
                    <li>
                        <div class="col">
                            <label><?php echo $form->labelEx($model, 'income'); ?></label>
                                <span>
                                    <?php echo $form->dropDownList($model, 'income', Yii::app()->params['displayIncomeLevel'],array("class" => "select")); ?>
                                </span>
                        </div>
                        <div class="col">


                            <label><?php echo $form->labelEx($model, 'marital_status'); ?></label>
                                <span>
                            <?php echo $form->dropDownList($model, 'marital_status', Yii::app()->params['displayMaritalStatus'],array("class" => "select")); ?>
                                </span>
                        </div>
                    </li>

                   <!-- <li class="search">
                        <label>What kind of services will you be providing?</label>
                        <span><input class="input"><button class="samll-btn"><span><span>Search</span></span>
                            </button></span>
                    </li>-->
                    <li class="a-right">
                        <?php //echo GxHtml::submitButton('Next', array('class' => 'general-btn-1'));?>
                        <?php echo GxHtml::htmlButton('<span><span>Next</span></span>', array('class' => 'general-btn-1','type'=>'submit'));?>
                    </li>

                </ul>
            </div>






            <?php     $this->endWidget(); ?>

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
        });
    </script>