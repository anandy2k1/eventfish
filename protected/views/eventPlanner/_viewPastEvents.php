<div class="lef-content-wrap">
    <div class="lef-content-data-1">
        <div class="lef-data-img">
            <?php echo CHtml::image(Common::getEventImage($data->event_image), '', array('width' => '169px', 'height' => '200px')); ?>
        </div>
        <div class="lef-data-title"><h3><?php echo $data->event_title; ?></h3></div>
        <div class="lef-data-middle-bg">
            <div class="date-content">
                <?php echo CHtml::image(Yii::app()->baseUrl . "/images/date-icon.png"); ?>
                <p><?php echo date('M d, Y', strtotime($data->start_date)) . ' to ' . date('M d, Y', strtotime($data->end_date)); ?></p>
            </div>
            <div style="clear:both;"></div>
            <div class="watch-content">
                <?php echo CHtml::image(Yii::app()->baseUrl . "/images/watch-icon.png"); ?>
                <p><?php echo date('g:i a', mktime($data->start_time, 0)) . ' to ' . date('g:i a', mktime($data->end_time, 0)); ?></p>
            </div>
            <div style="clear:both;"></div>
            <div class="b-day-bash">
                <ul>
                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-1.png" alt=""/></li>
                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-2.png" alt=""/></li>
                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-3.png" alt=""/></li>
                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-4.png" alt=""/></li>
                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-5.png" alt=""/></li>
                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-6.png" alt=""/></li>
                </ul>
            </div>
        </div>
        <div class="user-cont f-left">
            <div class="user-img f-left"><img src="<?php echo Yii::app()->baseUrl; ?>/images/user.png" alt=""/></div>
            <div class="user-amount f-left"><h5>110</h5></div>
        </div>
        <div class="btn-bg f-right">
            <ul>
                <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/temp-button.png" alt=""/></li>
                <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/temp-button1.png" alt=""/></li>
            </ul>
        </div>
    </div>
</div>
                   
