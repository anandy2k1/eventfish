<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>
<section>
    <div class="container">
        <div class="event-dashboard">
            <div class="confirm-dashboard">
                <ul>
                    <li class="disable active">
                        <p class="icon">1</p>

                        <h3>Account Details </h3>
                    </li>
                    <li class="disable active">
                        <p class="icon">2</p>

                        <h3>Create your Profile</h3>
                    </li>
                    <li class="disable current">
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
                <div class="create-profile">
                    <?php echo CHtml::image(Yii::app()->baseUrl . '/images/us-map.png', '', array('style' => 'margin-left:-130px;width:145%',)); ?>
                </div>

                <div class="clear"></div>
                <div class="submit a-right">
                    <?php echo GxHtml::htmlButton('<span><span>Next</span></span>', array('class' => 'button_green', 'type' => 'submit'));
                    ?>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</section>
