<section>
    <div class="container">
        <div class="event-dashboard">
            <div class="confirm-dashboard">
                <ul>
                    <li class="current first">
                        <p class="icon">1</p>

                        <h3>Account Details </h3>
                    </li>
                    <li class="disable">
                        <p class="icon">2</p>

                        <h3>Create your Profile</h3>
                    </li>
                    <li class="disable">
                        <p class="icon">3</p>

                        <h3> Service Area</h3>
                    </li>
                    <li class="disable last">
                        <p class="icon">4</p>

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
                <div class="general-form">
                    <ul>
                        <li class="checkbox">
                            <?php echo $form->radioButtonList($model, 'user_type', array('INDIVDUAL' => 'Individual', 'COMPANY' => 'Company'), array('separator' => "", 'style' => 'float:left;')); ?>
                        </li>
                        <li>
                            <label><?php echo $form->labelEx($model, 'address_1'); ?></label>
                            <span><?php echo $form->textField($model, 'address_1', array('class' => 'input')); ?></span>
                        </li>
                        <li>
                            <label><?php echo $form->labelEx($model, 'address_2'); ?></label>
                            <span><?php echo $form->textField($model, 'address_2', array('class' => 'input  ')); ?></span>
                        </li>
                        <li>
                            <div class="city">
                                <label><?php echo $form->labelEx($model, 'city'); ?></label>
                                <span><?php echo $form->textField($model, 'city', array('class' => 'input  ')); ?></span>
                            </div>
                            <div class="state">
                                <label><?php echo $form->labelEx($model, 'state_id'); ?></label>
                                <span><?php echo $form->dropDownList($model, 'state_id', $amStates, array('class' => 'select')); ?></span>
                            </div>
                            <div class="zipcode">
                                <label><?php echo $form->labelEx($model, 'zip'); ?></label>
                                <span><?php echo $form->textField($model, 'zip', array('class' => 'zipcode input ')); ?></span>
                            </div>
                        </li>
                        <li class="phone">
                            <label><?php echo $form->labelEx($model, 'phone'); ?></label>
                            <span><?php echo $form->textField($model, 'phone', array("class" => "input ")); ?></span>
                        </li>
                        <li class="phone">
                            <label><?php echo $form->labelEx($model, 'mobile'); ?></label>
                            <span><?php echo $form->textField($model, 'mobile', array("class" => "input ")); ?></span>
                        </li>
                        <li class="phone">
                            <label><?php echo $form->labelEx($model, 'office_phone'); ?></label>
                            <span><?php echo $form->textField($model, 'office_phone', array("class" => "input ")); ?></span>
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
                                    <?php
                                    echo $form->radioButtonList($model, 'gender', array('Male' => 'Male', 'Female' => 'Female'), array(
                                        'labelOptions' => array('style' => 'display:inline;display:none;'), // add this code
                                        'separator' => '',
                                    ));
                                    if ($model->gender == "Female") {
                                        ?>
                                        <label for="Users_gender_1" class="cb-enable selected"><span>Female</span></label>
                                        <label for="Users_gender_0" class="cb-disable"><span>Male</span></label>
                                    <?php
                                    } else {
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
                                <span><?php echo $form->dropDownList($model, 'ethnicity', Yii::app()->params['displayEthnicity'], array("class" => "select")); ?></span>
                            </div>
                        </li>
                        <li>
                            <div class="col">
                                <label><?php echo $form->labelEx($model, 'income'); ?></label>
                                <span><?php echo $form->dropDownList($model, 'income', Yii::app()->params['displayIncomeLevel'], array("class" => "select")); ?></span>
                            </div>
                            <div class="col">
                                <label><?php echo $form->labelEx($model, 'marital_status'); ?></label>
                                <span><?php echo $form->dropDownList($model, 'marital_status', Yii::app()->params['displayMaritalStatus'], array("class" => "select")); ?></span>
                            </div>
                        </li>

                        <li class="search">
                            <label>What kind of services will you be providing?</label>
                            <span>
                                <?php
                                echo CHtml::textField('search_by', '', array('class' => 'input', 'ID' => 'search', 'style'=>'width:385px;', 'value'=>'', 'placeholder'=>'Search'));
                                //echo CHtml::button('Search', array('class' => 'button_orange'));
                                ?>

                            </span>
                        </li>

                    </ul>
                </div>
                <div class="tables">

                <div class="idTabs">
                    <div id="div_tab">
                        <!--<label for="search">
                            <strong>Enter keyword to search </strong>
                        </label>
                        <input type="text" id="search"/>
                        <label>e.g. bar, parking, tv</label>-->
                        <?php

                        $oCategories1 = Category::getRenderCategories(Yii::app()->params['categoryParentId']['food'],"");
                        $oCategories2 = Category::getRenderCategories(Yii::app()->params['categoryParentId']['rental'], "");
                        $oCategories3 = Category::getRenderCategories(Yii::app()->params['categoryParentId']['entertainment'], "");
                        $oCategories4 = Category::getRenderCategories(Yii::app()->params['categoryParentId']['transportation'], "");
                        $this->widget('zii.widgets.jui.CJuiTabs', array(
                            'tabs' => array(
                               /* 'Food & Catering' => array(  'ajax' => $this->createUrl('vendor/getRenderCategories', array('parent_id' => Yii::app()->params['categoryParentId']['food'], 'search_by' => $ssSearchBy)),'id'=>'tab1content'),
                                'Accesories & Rentals' => array('ajax' => $this->createUrl('vendor/getRenderCategories', array('parent_id' => Yii::app()->params['categoryParentId']['entertainment'], 'search_by' => $ssSearchBy)),'id'=>'tab2content'),
                                'Entertainment & Staff' => array('ajax' => $this->createUrl('vendor/getRenderCategories', array('parent_id' => Yii::app()->params['categoryParentId']['rental'], 'search_by' => $ssSearchBy)),'id'=>'tab3content'),
                                'Transportation' => array('ajax' => $this->createUrl('vendor/getRenderCategories', array('parent_id' => Yii::app()->params['categoryParentId']['transportation'], 'search_by' => $ssSearchBy)),'id'=>'tab4content'),*/
                                'Food & Catering' => array('content'=>$this->renderPartial('getRenderCategories',array('model'=>$oCategories1),TRUE)),
                                'Accesories & Rentals' => array('content'=>$this->renderPartial('getRenderCategories',array('model'=>$oCategories2),TRUE)),
                                'Entertainment & Staff' => array('content'=>$this->renderPartial('getRenderCategories',array('model'=>$oCategories3),TRUE)),
                                'Transportation' => array('content'=>$this->renderPartial('getRenderCategories',array('model'=>$oCategories4),TRUE)),
                            ),
                            'id' => 'MyTab-Menu',
                            'options'=>array(
                                'collapsible'=>true,
                                /*'select'=>"js:function(){ $('#tab1content').html('Loading...');$('#tab2content').html('Loading...');$('#tab3content').html('Loading...');$('#tab4content').html('Loading...'); $('#search').val('');}",*/
                            ),

                            'htmlOptions' => array('style' => 'float:left;padding-botton:5px;')
                        ));
                        ?>
                    </div>
                </div>
                </div>
                <div class="general-form">
                    <ul>
                        <li>
                            <label><?php echo $form->labelEx($model, 'ssn_number') . CHtml::image(Yii::app()->baseUrl . '/images/help.png') ?></label>
                            <span><?php echo $form->textField($model, 'ssn_number', array("class" => "input")); ?></span>
                        </li>
                        <li>
                            <label><?php echo $form->labelEx($model, 'bank_name'); ?></label>
                            <span><?php echo $form->textField($model, 'bank_name', array("class" => "input")); ?></span>
                        </li>
                        <li>
                            <div class="col">
                                <label><?php echo $form->labelEx($model, 'routing_number'); ?></label>
                                <span><?php echo $form->textField($model, 'routing_number', array("class" => "input", 'style' => 'width:140px')); ?></span>
                            </div>
                            <div class="col">
                                <label><?php echo $form->labelEx($model, 'account_number'); ?></label>
                                <span><?php echo $form->textField($model, 'account_number', array("class" => "input", 'style' => 'width:140px')); ?></span>
                            </div>
                        </li>

                        <li class="a-right">
                            <?php echo GxHtml::htmlButton('<span><span>Next</span></span>', array('class' => 'button_green', 'type' => 'submit')); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</section>
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
    function filterCategory(requestPage, arg, divId) {
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(divId).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", requestPage + "?q=" + arg, true);
        xmlhttp.send();
    }

    $(document).ready(function()
    {
        $('#search').keyup(function()
        {
            searchTable($(this).val());
        });
    });



    function searchTable(inputVal)
    {
//        var table = $('#tblData');
        var table = $('.target');
        table.find('tr').each(function(index, row)
        {
            var allCells = $(row).find('td');
            if(allCells.length > 0)
            {
                var found = false;
                allCells.each(function(index, td)
                {
                    var regExp = new RegExp(inputVal, 'i');
                    if(regExp.test($(td).text()))
                    {
                        found = true;
                        $(td).show();
                        //return false;
                    }
                    else
                    {
                        $(td).hide();
                    }
                });
                /*if(found == true)
                {
                    $(row).show();
                }
                else
                {
                    $(row).hide();
                }*/
            }
        });
    }




</script>