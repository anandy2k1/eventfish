<div style="clear:both">&nbsp;</div>
<div class="serch-contnt">
    <div class="serch-box">
        <input type="hidden" id="catId" value="42"/>
        <input type="text" placeholder="Search" class="search-bg" id="search" onkeyup="searchTable(this.value);"/>

        <select class="acce_add_sel" onchange="callpage();" name="pagesize" id="pagesize">
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

        <div class="pagination">
            <div style="display: none;">


                <?php $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'header' => '',

                )) ?>
            </div>
                        <span title="Prev" class="lef-arro"><img onclick="callpreviouspage('<?php echo $pageNumber ?>','<?php echo $totalPages ?>');"
                                                                 src="<?php echo Yii::app()->baseUrl; ?>/images/lef-arrow.png" alt=""/></span>


            <p>Page</p>

            <!--<input type="text" onclick="this.value=''" id="SearchText" value="<?php /*echo $pageNumber*/?>" class="pagin-bg"  />-->

            <select class="acce_add_sel acce_add_sel_2" onchange="callpage();" name="SearchText" id="SearchText">
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

                        <span title="Next" class="rit-arro"><img onclick="callnextpage('<?php echo $pageNumber ?>','<?php echo $totalPages ?>');"
                                                                 src="<?php echo Yii::app()->baseUrl; ?>/images/rit-arrow.png" alt=""/></span>

        </div>


    </div>
</div>
<div style="clear:both">&nbsp;</div>

<div class="table-title-bg" style="width:100%;">
    <div class="col-1">
        <p>Lighting</p>
        <span class="up-dwon-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/up-down-arrow.png" alt=""/></a></span>
    </div>
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
    <div class="col-5" >
        <p>Add to Net</p>
    </div>

</div>

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
                    <div class="row-6" style="width:98px; border-right:none;">
                        <div id="<?php ?>">
                            <div style="" class="round-button" onclick="minus('num_<?php echo $oProduct->amazon_asin_number ?>');">
                                -
                            </div>
                            <?php
                            if ($isEdit == "1")
                            {
                            $snQty = (in_array($oProduct->id, $anProducts)) ? $anProductsQty[$oProduct->id] : "";
                            }
                            else
                            {
                                $snQty = 0;
                            }
                            ?>
                            <input type="text" name="qty[<?php echo $oProduct->id ?>]" id="num_<?php echo $oProduct->amazon_asin_number ?>" size="1" value="<?php echo $snQty; ?>"
                                   style=""/>

                            <div style="" class="round-button" onclick="plus('num_<?php echo $oProduct->amazon_asin_number ?>');">
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