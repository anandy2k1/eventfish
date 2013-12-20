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
            <li class="complete">
                <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/acce-icon.png"
                                          alt=""/><?php echo CHtml::link('Accessories& Rentals', Yii::app()->createUrl('eventPlanner/planEventAccessoriesEdit', array('id' => $oEventModel->id)), array('style' => 'color:#fff;')); ?>
                </h1>

                <div class="details">
                    Accessories added
                </div>
            </li>
            <li>
                <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/entertai-icon.png" alt=""/>Entertainers& Personnel</h1>

                <div class="details"></div>
            </li>
            <li>
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
                    <div class="confirm-dashboard">
                        <ul>
                            <li class="disable active">
                                <p class="icon">1</p>

                                <h2>My Event Details</h2>
                            </li>
                            <li class="disable current">
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
                        <div class="event-invite-friends">
                            Invite Your Friends
                        </div>
                        <div class="facebook" >
                            <div id="fb_login_button_id">Facebook Connect</div>
                            <?php // echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/facebook.png'),$params['facebook'],array("target"=>"_top"));?>
                            <?php
                            //$this->widget('application.widgets.facebook.Facebook',array('appId'=>Yii::app()->params['FACEBOOK_APPID'],'facebookLoginUrl'=>'eventPlanner/inviteFriends')); ?>
                        </div>
                        <!--<div class="facebook">
                            <?php  $this->widget('application.widgets.facebook.Facebook', array('appId' => Yii::app()->params['FACEBOOK_APPID'], 'type' => 'invitation', 'facebookLoginUrl' => Yii::app()->createAbsoluteUrl('eventPlanner/sendEventInvitationStep3', array('id' => $oEventModel->id)))); ?>
                        </div>-->
                        <div class="clear"></div>
                        <div class="submit a-right">
                            <?php echo CHtml::submitButton(Yii::t('app', 'Next'), array('class' => 'button_green')); ?>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>

                </div>
            </div>
            <div style="clear:both;">&nbsp;</div>
        </div>
    </div>