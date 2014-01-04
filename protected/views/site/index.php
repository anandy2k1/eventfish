<!--<figure>
    <img src="<?php //echo Yii::app()->request->baseUrl;              ?>/images/banner-img.png" width="953" height="436" alt="Eventfish" title="Eventfish" />
</figure>-->
<!-- Start WOWSlider.com BODY section -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/slider/engine1/style.css"/>
<SCRIPT LANGUAGE="JavaScript">
    var ip = '<!--#echo var="REMOTE_ADDR"-->';
    document.write("Your IP address is" + ip);
</script>

<div id="wowslider-container1">
    <div class="ws_images ">
        <ul>
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
        </ul>
    </div>
    <div class="ws_bullets">
        <div>
            <?php
            if ($omSliders):
                $snI = 1;
                foreach ($omSliders as $oDataSet):
                    echo CHtml::link($snI, "javascript:void(0);");
                    $snI++;
                endforeach;
            endif;
            ?>
        </div>
    </div>

    <div class="ws_shadow"></div>
    <div class="btn_watch_vidoe" style="position: absolute; right: 20px; z-index: 9999; bottom: 25px;">

        <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/watch_video.png"), 'javascript:void(0)', array('onclick' => 'js:openColorBox("https://www.youtube.com/embed/Jf1fRu9YgfE", "560","315");return false;', 'class' => 'ajax general-btn-1')); ?>
    </div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/slider/engine1/slider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/slider/engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->
<div style='clear: both;'>&nbsp;</div>
<div class="inner-content-block left">
    <h1>Plan an Event</h1>

    <div id="planner_category">
        <div class="inner-block cbox">
            <ul>
                <?php
                if ($omEventVendorCategories):
                    foreach ($omEventVendorCategories as $omDataSet):
                        if ($omDataSet->category_type == "EVENT"):
                            if (Common::getSubCategoryCount($omDataSet->id) > 0) {
                                ?>
                                <li class="cbox-column cursor-pointer" onclick="load_child_categories('<?php echo $omDataSet->id ?>','planner_category',0)">
                            <?php
                            } else {
                                ?>
                                <li class="cbox-column">
                            <?php
                            }
                            ?>
                            <div class="img">
                                <!--<img src="<?php //echo Yii::app()->request->baseUrl;   ?>/images/productbox01.png" width="137" height="97" alt="Eventfish" title="Eventfish" />-->
                                <?php echo CHtml::image(Common::getCategoryImageUrl($omDataSet->category_image), 'Eventfish', array('width' => '137', 'height' => '97')); ?>
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
    </div>
    <div class="bottom-title">much more &gt;</div>
</div>
<div class="inner-content-block right">
    <h1>Become a Vendor</h1>

    <div id="vendor_category">
        <div class="inner-block cbox">
            <ul>
                <?php
                if ($omEventVendorCategories):
                    foreach ($omEventVendorCategories as $omDataSet):
                        if ($omDataSet->category_type == "VENDOR"):
                            if (Common::getSubCategoryCount($omDataSet->id) > 0) {
                                ?>
                                <li class="cbox-column cursor-pointer" onclick="load_child_categories('<?php echo $omDataSet->id ?>','vendor_category',0)" >
                            <?php
                            } else {
                                ?>
                                <li class="cbox-column">
                            <?php
                            }
                            ?>
                            <div class="img">
                                <!--<img src="<?php //echo Yii::app()->request->baseUrl;   ?>/images/productbox01.png" width="137" height="97" alt="Eventfish" title="Eventfish" />-->
                                <?php echo CHtml::image(Common::getCategoryImageUrl($omDataSet->category_image), 'Eventfish', array('width' => '137', 'height' => '97')); ?>
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
    </div>
    <div class="bottom-title">much more &gt;</div>
</div>
<div class="home-social-block">
    <p class="small-banner">
        <?php
        $bannerUrl = Yii::app()->request->baseUrl . "/images/banner01.png";;
        foreach ($omBanner as $banner) {
            $bannerUrl = Yii::app()->request->baseUrl . "/uploads/slider_images/" . $banner->image_url;
            break;
        }
        ?>
        <img src="<?php echo $bannerUrl ?>" width="408" height="183" alt="Eventfish" title="Eventfish"/>
    </p>
    <br/>

    <div class="social-content-block">
        <div class="social-icon">
            <?php
            echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/footer-icon-large.png', 'Eventfish', array('width' => '89', 'height' => '89')), "https://www.facebook.com/eventfish", array('target' => '_blank', 'class' => 'active'));
            echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/twitter-icon-large.png', 'Eventfish', array('width' => '89', 'height' => '89')), "https://twitter.com/eventfish", array('target' => '_blank', 'class' => 'active'));
            echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/in-icon-large.png', 'Eventfish', array('width' => '89', 'height' => '89')), "http://linkd.in/1gvcoQW", array('target' => '_blank', 'class' => 'active'));
            echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/yt-icon-large.png', 'Eventfish', array('width' => '89', 'height' => '89')), "http://www.youtube.com/channel/UCwzEDpI7GzzAF3Hz7btvPeA", array('target' => '_blank', 'class' => 'active'));
            ?>
        </div>
        <p class="small-banner"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/facebook-img.png" width="393" height="170" alt="Eventfish" title="Eventfish"/></p><br/>
    </div>
</div>
<div class="home-event-block idTabs">
    <ul class="tabContainer">
        <li id="tabHead1" onclick="functionTabToggle(1,2);" class="left active">Past Events</li>
        <li id="tabHead2" onclick="functionTabToggle(2,2);" class="right">Future Event</li>
    </ul>
    <div class="tabContent" id="jquery">
        <ul id="tab1">
            <?php
            foreach ($omPastEventList as $omEvent) {

                ?>
                <li>
                    <div class="f-left">
                        <img src="<?php echo Yii::app()->baseUrl . Yii::app()->params['event_image_thumb_path'] . $omEvent->event_image ?>" style="width:175px;"/>
                    </div>
                    <div class="f-right">
                        <div class="postmeta">
                            <span class="date"><?php date("M d, Y", strtotime($omEvent->start_date)); ?></span>
                            <span class="author"><?php echo $omEvent->event_title; ?></span>
                        </div>
                        <div class="contento">
                            <p><?php echo $omEvent->additional_info; ?></p>
                            <a href="#">Click for details</a>
                        </div>
                    </div>
                </li>
            <?php
            }
            ?>


        </ul>
        <ul id="tab2">
            <?php
            foreach ($omFutureEventList as $omEvent) {

                ?>
                <li>
                    <div class="f-left">
                        <img src="<?php echo Yii::app()->baseUrl . Yii::app()->params['event_image_thumb_path'] . $omEvent->event_image ?>" style="width:175px;"/>
                    </div>
                    <div class="f-right">
                        <div class="postmeta">
                            <span class="date"><?php date("M d, Y", strtotime($omEvent->start_date)); ?></span>
                            <span class="author"><?php echo $omEvent->event_title; ?></span>
                        </div>
                        <div class="contento">
                            <p><?php echo $omEvent->additional_info; ?></p>
                            <a href="#">Click for details</a>
                        </div>
                    </div>
                </li>
            <?php
            }
            ?>


        </ul>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.cbox').each(function () {
            var highestBox = 0;
            $('.cbox-column', this).each(function () {

                if ($(this).height() > highestBox)
                    highestBox = $(this).height();
            });
            $('.cbox-column', this).height(highestBox);
        });
    });
    function load_child_categories(id, divId, parentId) {
        var url = '<?php echo Yii::app()->baseUrl ?>/index.php/site/ajaxChildCategories';
        ajaxCall(url, '=a&catId=' + id+'&divId='+divId+'&parentId='+parentId, divId, 'ac_loading', '513px');
    }
</script>