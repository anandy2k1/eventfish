<div class="home-bottom-banner-block">
    <!---- plan event account start -->
    <div class="inner-content-block-1 left">
        <div class="lef-content-bg f-left">
            <div class="content-title"><h2>My Upcoming Events</h2></div>
            <div class="main-lef-wrap">
                <?php
                if ($omEvents):
                    foreach ($omEvents as $omEvent):
                        ?>
                        <div class="lef-content-wrap">
                            <div class="lef-content-data-1">
                                <div class="lef-data-img">                                    
                                    <?php echo CHtml::image(Common::getEventImage($omEvent->event_image),'', array('width' => '169px', 'height' => '200px'));?>
                                </div>
                                <div class="lef-data-title"><h3><?php echo $omEvent->event_title; ?></h3></div>
                                <div class="lef-data-middle-bg">
                                    <div class="date-content">
                                        <?php echo CHtml::image(Yii::app()->baseUrl . "/images/date-icon.png"); ?>
                                        <p><?php echo date('M d, Y',  strtotime($omEvent->start_date)).' to '. date('M d, Y', strtotime($omEvent->end_date)); ?></p>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div class="watch-content">
                                        <?php echo CHtml::image(Yii::app()->baseUrl . "/images/watch-icon.png"); ?>
                                        <p><?php echo date('g:i a', mktime($omEvent->start_time,0)).' to '. date('g:i a', mktime($omEvent->end_time,0));?></p>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div class="b-day-bash">
                                        <ul>
                                            <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-1.png" alt="" /></li>
                                            <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-2.png" alt="" /></li>
                                            <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-3.png" alt="" /></li>
                                            <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-4.png" alt="" /></li>
                                            <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-5.png" alt="" /></li>
                                            <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-6.png" alt="" /></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="user-cont f-left">
                                    <div class="user-img f-left"><img src="<?php echo Yii::app()->baseUrl; ?>/images/user.png" alt="" /></div>
                                    <div class="user-amount f-left"><h5>110</h5></div>
                                </div>
                                <div class="btn-bg f-right">
                                    <ul>
                                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/temp-button.png" alt="" /></li>
                                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/temp-button1.png" alt="" /></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
                <div class="lef-content-wrap">
                    <div class="lef-content-data-1">
                        <div class="lef-data-img"><img src="<?php echo Yii::app()->baseUrl; ?>/images/img-4.png" alt="" /></div>
                        <div class="lef-data-title"><h3>My Next Event</h3></div>
                        <div class="lef-data-middle-bg">
                            <div class="next-event-cont">
                                <div class="f-left next-event-img">
                                    <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . "/images/a-icon-8.png"), array('eventPlanner/planEventGeneralAdd'),array('title' => 'Click here to add event')); ?>
                                </div>
                                <div class="f-left next-event-title"><h2>Book an Event</h2></div>
                            </div>
                        </div>                        
                        <div class="btn-bg f-right">
                            <ul>
                                <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/temp-button2.png" alt="" /></li>
                                <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/temp-button3.png" alt="" /></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rit-content-bg f-right">
            <div class="content-title"><h2>Budget Your Events</h2></div>
            <div class="main-rit-wrap">
                <div class="select-event">
                    <select class="select-event-type">
                        <option>Select Event Type</option>                        
                    </select>
                </div>
                <div style="clear:both;"></div>
                <div class="bgt-event">
                    <ul>
                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-9.png" alt="" /></li>
                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-10.png" alt="" /></li>
                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-12.png" alt="" /></li>
                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-11.png" alt="" /></li>
                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-13.png" alt="" /></li>
                        <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/a-icon-14.png" alt="" /></li>
                    </ul>
                </div>
                <div class="bgt-tex-box">
                    <h2>General</h2>
                    <textarea class="bgt-text-area"></textarea>
                </div>
                <div class="f-right marg-in">
                    <div class="cler-btn f-left"><img src="<?php echo Yii::app()->baseUrl; ?>/images/temp-button4.png" alt="" /></div>
                    <div class="nxt-btn f-left"><img src="<?php echo Yii::app()->baseUrl; ?>/images/temp-button5.png" alt="" /></div>
                </div>
            </div>
        </div>

        <div class="rit-bottom-content-bg f-right">
            <div class="content-title"><h2>My Group Invitarion List</h2></div>
            <div class="CSSTableGenerator" >
                <table>
                    <tr>
                        <td>
                            Group Name
                        </td>
                        <td >
                            List Size
                        </td>
                        <td>
                            Edit
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/add-1.png" alt="" class="tble-marg-in"/> Add a Group List
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>                    
                </table>
            </div>

        </div>

    </div>
    <!---- plan event account end -->
</div>