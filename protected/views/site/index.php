<!--<figure>
    <img src="<?php //echo Yii::app()->request->baseUrl;            ?>/images/banner-img.png" width="953" height="436" alt="Eventfish" title="Eventfish" />
</figure>-->
<!-- Start WOWSlider.com BODY section -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/slider/engine1/style.css" />
<div id="wowslider-container1">
    <div class="ws_images"><ul>
            <?php
            if ($omSliders):
                foreach ($omSliders as $oDataSet):
                    ?>
                    <li>
                        <?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/slider_images/" . $oDataSet->image_url); ?>
                        <div class="slider_content" style="text-align: left;flaot:left;padding:10px 0px 25px 0px;">
                            <div class="slider_caption" style="width:80%">
                                <h3><?php echo $oDataSet->caption; ?></h3>
                            </div>
                            <div class="slider_desc" style="width:80%">
                                <?php echo $oDataSet->description; ?>
                            </div>                    
                        </div>
                    </li>
                    <?php
                endforeach;
            endif;
            ?>
        </ul></div>
    <div class = "ws_bullets"><div>
            <?php
            if ($omSliders):
                $snI = 1;
                foreach ($omSliders as $oDataSet):
                    echo CHtml::link($snI, "javascript:void(0);");
                    $snI++;
                endforeach;
            endif;
            ?>            
        </div></div>

    <div class = "ws_shadow"></div>
    <div class = "btn_watch_vidoe" style = "position: absolute; right: 20px; z-index: 9999; bottom: 25px;">
        <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/images/watch_video.png"),"#")?>
    </div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/slider/engine1/slider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/slider/engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->
<div style='clear: both;'>&nbsp;</div>
<div class="inner-content-block left">
    <h1>Plan an Event</h1>
    <div class="inner-block">
        <ul>
            <?php
            if ($omEventVendorCategories):
                foreach ($omEventVendorCategories as $omDataSet):
                    if ($omDataSet->category_type == "EVENT"):
                        ?>
                        <li>
                            <div class="img">
                                <!--<img src="<?php //echo Yii::app()->request->baseUrl; ?>/images/productbox01.png" width="137" height="97" alt="Eventfish" title="Eventfish" />-->
                                <?php echo CHtml::image(Common::getCategoryImageUrl($omDataSet->category_image),'Eventfish',array('width' => '137', 'height' => '97'));?>
                            </div>
                            <div class="title">
                                <?php echo CHtml::link($omDataSet->category_name, "#", array('title' => $omDataSet->category_name)); ?>
                            </div>
                        </li>                        
                        <?php
                    endif;
                endforeach;
            endif;
            ?>
        </ul>
    </div>
    <div class="bottom-title">much more &gt;</div>
</div>
<div class="inner-content-block right">
    <h1>Become a Vendor</h1>
    <div class="inner-block">
        <ul>
            <?php
            if ($omEventVendorCategories):
                foreach ($omEventVendorCategories as $omDataSet):
                    if ($omDataSet->category_type == "VENDOR"):
                        ?>
                        <li>
                            <div class="img">
                                <!--<img src="<?php //echo Yii::app()->request->baseUrl; ?>/images/productbox01.png" width="137" height="97" alt="Eventfish" title="Eventfish" />-->
                                <?php echo CHtml::image(Common::getCategoryImageUrl($omDataSet->category_image),'Eventfish',array('width' => '137', 'height' => '97'));?>
                            </div>
                            <div class="title">
                                <?php echo CHtml::link($omDataSet->category_name, "#", array('title' => $omDataSet)); ?>
                            </div>
                        </li>                        
                        <?php
                    endif;
                endforeach;
            endif;
            ?>            
        </ul>
    </div>
    <div class="bottom-title">much more &gt;</div>
</div>
<div class="home-social-block">
    <p class="small-banner"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner01.png" width="408" height="183" alt="Eventfish" title="Eventfish" /></p><br/>
    <div class="social-content-block">
        <div class="social-icon"><a class="active" href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/footer-icon-large.png" width="89" height="89" alt="Eventfish" /></a> <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/twitter-icon-large.png" width="89" height="89" alt="Eventfish" /></a> <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/in-icon-large.png" width="89" height="89" alt="Eventfish" /></a> <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/yt-icon-large.png" width="89" height="89" alt="Eventfish" /></a></div>
        <p class="small-banner"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/facebook-img.png" width="393" height="170" alt="Eventfish" title="Eventfish" /></p><br/>
    </div>
</div>
<div class="home-event-block idTabs">
    <ul class="tabContainer">
        <li class="left"><a href="#jquery">Past Events</a></li>
        <li class="right"><a href="#official">Past Events</a></li>
    </ul>
    <div class="tabContent" id="jquery">
        <ul>
            <li>
                <div class="f-left">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/blog-img.png" />
                </div>
                <div class="f-right">
                    <div class="postmeta">
                        <span class="date">Feb 12, 2012</span>
                        <span class="author">Jimmy Fund Fundrasier</span>
                    </div>
                    <div class="contento">
                        <p>This will give us a dump of all the Eventfish that worked this event. </p>
                        <a href="#">Click for details</a>
                    </div>
                </div>
            </li>

            <li>
                <div class="f-left">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/blog-img.png" />
                </div>
                <div class="f-right">
                    <div class="postmeta">
                        <span class="date">Feb 12, 2012</span>
                        <span class="author">Jimmy Fund Fundrasier</span>
                    </div>
                    <div class="contento">
                        <p>This will give us a dump of all the Eventfish that worked this event. </p>
                        <a href="#">Click for details</a>
                        <div class="social-media"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ssocail-media.png" /></div>
                    </div>
                </div>
            </li>
            <li>
                <div class="f-left">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/blog-img.png" />
                </div>
                <div class="f-right">
                    <div class="postmeta">
                        <span class="date">Feb 12, 2012</span>
                        <span class="author">Jimmy Fund Fundrasier</span>
                    </div>
                    <div class="contento">
                        <p>This will give us a dump of all the Eventfish that worked this event. </p>
                        <a href="#">Click for details</a>
                    </div>
                </div>
            </li>

        </ul>
    </div>    
</div>