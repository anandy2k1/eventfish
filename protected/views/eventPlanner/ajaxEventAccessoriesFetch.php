<div style="clear:both">&nbsp;</div>
<div class="serch-contnt">
    <div class="serch-box">

        <input type="text" placeholder="Search" class="search-bg" id="search" onkeyup="searchTable(this.value);"/>
        <input type="submit" value=""
               style="background:url(<?php echo Yii::app()->baseUrl; ?>/images/search-button.png) no-repeat; width:77px; height:29px; margin:0 0 0 5px; float:left; cursor:pointer;">
        <select onchange="callpage();" name="pagesize" id="pagesize"
                style="background:#fff; padding:4px 10px; margin:0 0 0 80px; width:133px; height:27px; float:left; border:1px solid #000; border-radius:5px">
            <?php
            $optionAry = array(1 => 3, 2 => 5, 3 => 10, 4 => 15, 5 => 20);
            foreach ($optionAry as $key => $val) {
                $sel = "";
                if ($pagesize == $val) {
                    $sel = "selected='selected'";
                }
                ?>
                <option <?php echo $sel ?> value="<?php echo $val ?>"><?php echo $val ?> per page</option>
            <?php
            }
            ?>
        </select>

        <div class="pagination" style="margin-right: 10px;">
            <div style="display: none;">


                <?php $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'header' => '',

                )) ?>
            </div>
            <span class="lef-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/lef-arrow.png" alt=""/></a></span>


            <p>Page</p>

            <!--<input onclick="this.value=''" type="text" id="SearchText" value="<?php /*echo $pageNumber */?>" class="pagin-bg"/>-->
            <select style="margin-left: 0;margin-top: 2px;width:58px;" class="acce_add_sel" onchange="callpage();" name="SearchText" id="SearchText">
                <?php
                //$optionAry = array(1=>3,2=>5,3=>10,4=>15,5=>20);
                for ($i = 1; $i <= $totalPages; $i++) {
                    $sel = "";
                    if ($pageNumber == $i) {
                        $sel = "selected='selected'";
                    }
                    ?>
                    <option <?php echo $sel ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php
                }
                ?>
            </select>


            <p>of <?php echo $totalPages ?></p>
            <span class="rit-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/rit-arrow.png" alt=""/></a></span>
        </div>


    </div>
</div>
<div style="clear:both">&nbsp;</div>
<div class="table-title-bg" style="width: 100%">
    <div class="col-1">
        <p>Lighting</p>
        <span class="up-dwon-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/up-down-arrow.png" alt=""/></a></span>
    </div>
    <!--<div class="col-1">
                    <p>Description</p>
                    <span class="up-dwon-arro"><a href="#"><img src="<?php /*echo Yii::app()->baseUrl; */?>/images/up-down-arrow.png" alt="" /></a></span>
                </div>-->
    <div class="col-2">
        <p>Seller</p>
        <span class="up-dwon-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/up-down-arrow.png" alt=""/></a></span>
    </div>
    <div class="col-3">
        <p>Reviews</p>
        <span class="up-dwon-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/up-down-arrow.png" alt=""/></a></span>
    </div>
    <div class="col-4">
        <p>Pricing</p>
    </div>
    <div class="col-5">
        <p>Add to Net</p>
    </div>

</div>
<div id="tab1">
    <?php
    foreach ($model as $oProduct) {
        ?>
        <table class="target" cellspacing="0" cellpadding="0" border="0">
            <tr cellspacing="0" cellpadding="0" border="0">
                <td cellspacing="0" cellpadding="0" border="0">
                    <div class="table-contnt-bg">
                        <div class="row-1">
                            <img height="50" width="50" src="<?php echo $oProduct->product_image; ?>" alt="" style="margin-right: 20px;"/>

                            <p title="<?php echo $oProduct->product_name ?>" class="tooltipster">
                                <a href="<?php echo $oProduct->amazon_product_detail_page_url ?>" target="_blank">
                                    <?php
                                    echo stripslashes(Common::trim(addslashes($oProduct->product_name), 50, '...'))?>
                                </a>
                            </p>
                        </div>
                        <!--<div class="row-2">
                        <p><?php /*echo $oProduct->product_description*/?></p>
                    </div>-->
                        <div class="row-3">
                            <p><?php echo $oProduct->publisher ?></p>
                        </div>
                        <div class="row-4">
                            <span class="rating-static rating-<?php echo $oProduct->reviews * 10 ?>"></span>
                        </div>
                        <div class="row-5">
                            <p><?php echo $oProduct->product_price ?></p>
                        </div>
                        <div class="row-6">
                            <div id="<?php ?>">
                                <div style="" class="round-button" onclick="minus('num_<?php echo $oProduct->amazon_asin_number?>');">
                                    -
                                </div>
                                <input type="text" name="num" id="num_<?php echo $oProduct->amazon_asin_number?>" size="1" value="" style=""/>
                                <div style="" class="round-button" onclick="plus('num_<?php echo $oProduct->amazon_asin_number?>');">
                                    +
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </td>
            </tr>
        </table>
    <?php
    }
    ?>
</div>
<div id="tab2">
    <?php
    foreach ($model as $oProduct) {
        ?>
        <table class="target" cellspacing="0" cellpadding="0" border="0">
            <tr cellspacing="0" cellpadding="0" border="0">
                <td cellspacing="0" cellpadding="0" border="0">
                    <div class="table-contnt-bg">
                        <div class="row-1">
                            <img height="50" width="50" src="<?php echo $oProduct->product_image; ?>" alt="" style="margin-right: 20px;"/>

                            <p title="<?php echo $oProduct->product_name ?>" class="tooltipster">
                                <a href="<?php echo $oProduct->amazon_product_detail_page_url ?>" target="_blank">
                                    <?php
                                    echo stripslashes(Common::trim(addslashes($oProduct->product_name), 50, '...'))?>
                                </a>
                            </p>
                        </div>
                        <!--<div class="row-2">
                        <p><?php /*echo $oProduct->product_description*/?></p>
                    </div>-->
                        <div class="row-3">
                            <p><?php echo $oProduct->publisher ?></p>
                        </div>
                        <div class="row-4">
                            <span class="rating-static rating-<?php echo $oProduct->reviews * 10 ?>"></span>
                        </div>
                        <div class="row-5">
                            <p><?php echo $oProduct->product_price ?></p>
                        </div>
                        <div class="row-6">
                            <div id="<?php ?>">
                                <div style="" class="round-button" onclick="minus('num_<?php echo $oProduct->amazon_asin_number?>');">
                                    -
                                </div>
                                <input type="text" name="num" id="num_<?php echo $oProduct->amazon_asin_number?>" size="1" value="" style=""/>
                                <div style="" class="round-button" onclick="plus('num_<?php echo $oProduct->amazon_asin_number?>');">
                                    +
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </td>
            </tr>
        </table>
    <?php
    }
    ?>
</div>
<div id="tab3">
    <?php
    foreach ($model as $oProduct) {
        ?>
        <table class="target" cellspacing="0" cellpadding="0" border="0">
            <tr cellspacing="0" cellpadding="0" border="0">
                <td cellspacing="0" cellpadding="0" border="0">
                    <div class="table-contnt-bg">
                        <div class="row-1">
                            <img height="50" width="50" src="<?php echo $oProduct->product_image; ?>" alt="" style="margin-right: 20px;"/>

                            <p title="<?php echo $oProduct->product_name ?>" class="tooltipster">
                                <a href="<?php echo $oProduct->amazon_product_detail_page_url ?>" target="_blank">
                                    <?php
                                    echo stripslashes(Common::trim(addslashes($oProduct->product_name), 50, '...'))?>
                                </a>
                            </p>
                        </div>
                        <!--<div class="row-2">
                        <p><?php /*echo $oProduct->product_description*/?></p>
                    </div>-->
                        <div class="row-3">
                            <p><?php echo $oProduct->publisher ?></p>
                        </div>
                        <div class="row-4">
                            <span class="rating-static rating-<?php echo $oProduct->reviews * 10 ?>"></span>
                        </div>
                        <div class="row-5">
                            <p><?php echo $oProduct->product_price ?></p>
                        </div>
                        <div class="row-6">
                            <div id="<?php ?>">
                                <div style="" class="round-button" onclick="minus('num_<?php echo $oProduct->amazon_asin_number?>');">
                                    -
                                </div>
                                <input type="text" name="num" id="num_<?php echo $oProduct->amazon_asin_number?>" size="1" value="" style=""/>
                                <div style="" class="round-button" onclick="plus('num_<?php echo $oProduct->amazon_asin_number?>');">
                                    +
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </td>
            </tr>
        </table>
    <?php
    }
    ?>
</div>
<div id="tab4">
    <?php
    foreach ($model as $oProduct) {
        ?>
        <table class="target" cellspacing="0" cellpadding="0" border="0">
            <tr cellspacing="0" cellpadding="0" border="0">
                <td cellspacing="0" cellpadding="0" border="0">
                    <div class="table-contnt-bg">
                        <div class="row-1">
                            <img height="50" width="50" src="<?php echo $oProduct->product_image; ?>" alt="" style="margin-right: 20px;"/>

                            <p title="<?php echo $oProduct->product_name ?>" class="tooltipster">
                                <a href="<?php echo $oProduct->amazon_product_detail_page_url ?>" target="_blank">
                                    <?php
                                    echo stripslashes(Common::trim(addslashes($oProduct->product_name), 50, '...'))?>
                                </a>
                            </p>
                        </div>
                        <!--<div class="row-2">
                        <p><?php /*echo $oProduct->product_description*/?></p>
                    </div>-->
                        <div class="row-3">
                            <p><?php echo $oProduct->publisher ?></p>
                        </div>
                        <div class="row-4">
                            <span class="rating-static rating-<?php echo $oProduct->reviews * 10 ?>"></span>
                        </div>
                        <div class="row-5">
                            <p><?php echo $oProduct->product_price ?></p>
                        </div>
                        <div class="row-6">
                            <div id="<?php ?>">
                                <div style="" class="round-button" onclick="minus('num_<?php echo $oProduct->amazon_asin_number?>');">
                                    -
                                </div>
                                <input type="text" name="num" id="num_<?php echo $oProduct->amazon_asin_number?>" size="1" value="" style=""/>
                                <div style="" class="round-button" onclick="plus('num_<?php echo $oProduct->amazon_asin_number?>');">
                                    +
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </td>
            </tr>
        </table>
    <?php
    }
    ?>
</div>
