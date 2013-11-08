<div class="event-dashboard">
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
    <div class="account-details">
        <div class="create-profile">
            <?php
            $form = $this->beginWidget('GxActiveForm', array(
                'id' => 'event-step1-form',
                'enableAjaxValidation' => false
            ));
            ?>
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'address_1'); ?></h1>
                <?php echo $form->textField($model, 'address_1'); ?>                
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'address_2'); ?></h1>
                <?php echo $form->textField($model, 'address_2'); ?>                
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'city'); ?></h1>
                <?php echo $form->textField($model, 'city'); ?>                
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'state_id'); ?></h1>
                <?php echo $form->dropDownList($model, 'state_id', $amStates); ?>                
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'zip'); ?></h1>
                <?php echo $form->textField($model, 'zip'); ?>
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'phone'); ?></h1>
                <?php echo $form->textField($model, 'phone'); ?>
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'phone_type'); ?></h1>
                <?php echo $form->dropDownList($model, 'phone_type', array('HOME' => 'Home', 'MONBILE' => 'Mobile')); ?>
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'date_of_birth'); ?></h1>
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
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'gender'); ?></h1>
                <?php echo $form->radioButtonList($model, 'gender', array('Male' => 'Male', 'Female' => 'Female')); ?>
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'ethnicity'); ?></h1>
                <?php echo $form->dropDownList($model, 'ethnicity', array('prompt' => 'Choose Ethnicity')); ?>
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'income'); ?></h1>
                <?php echo $form->dropDownList($model, 'income', array('prompt' => 'Income Level')); ?>
            </div><!-- row -->
            <div class="row">
                <h1><?php echo $form->labelEx($model, 'matial_status'); ?></h1>
                <?php echo $form->dropDownList($model, 'matial_status', array('prompt' => 'Choose Status')); ?>
            </div><!-- row -->
            <div style="clear:both;">

            <?php
            echo GxHtml::submitButton('Next', array('class' => 'general-btn'));
            $this->endWidget();
            ?>
        </div>
    </div>
</div>