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
        <li class="active">
            <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/acce-icon.png" alt=""/>Accessories & Rentals</h1>

            <div class="details"></div>
        </li>
        <li>
            <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/entertai-icon.png" alt=""/>Entertainers & Personnel</h1>

            <div class="details"></div>
        </li>
        <li>
            <h1><img src="<?php echo Yii::app()->baseUrl; ?>/images/trans-icon.png" alt="" class="margin_right"/>Transport</h1>

            <div class="details"></div>
        </li>
        <li class="last">
            <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/gift-icon.png" alt=""/>Invitations & Gifts</h1>

            <div class="details"></div>
        </li>
    </ul>
</div>

<?php
$form = $this->beginWidget('GxActiveForm', array(
    'id' => 'plan-event-accesories-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
echo CHtml::hiddenField('id', $oEventModel->id);
//echo $form->errorSummary($model);
?>

<div class="event-block-bg">
    <div class="event-block-title-bg">
        <div class="ribbn"><img src="<?php echo Yii::app()->baseUrl; ?>/images/ribbon-1.png" alt=""/></div>
        Accessories & Rentals
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
    <div class="tab-content-bg">
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

            <div class="table-title-bg">
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
                <div class="col-5">
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
                                <div class="row-6">
                                    <div id="<?php ?>">
                                        <div style="" class="round-button" onclick="minus('num_<?php echo $oProduct->amazon_asin_number ?>');">
                                            -
                                        </div>
                                        <?php
                                        $snQty = (in_array($oProduct->id,$anProducts)) ? $anProductsQty[$oProduct->id] : "";
                                        ?>
                                        <input type="text" name="qty[<?php echo $oProduct->id ?>]" id="num_<?php echo $oProduct->amazon_asin_number ?>" size="1" value="<?php echo $snQty;?>" style=""/>

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


        </div>


    </div>
    <div class="table-bottom-bg">
        <p><strong>Intructions:</strong> Lorem ipsum simply dummy taxt</p>

        <!--<form class="button" style="float: right;margin-right: 5px;">-->
        <div style="float: right;margin-right: 5px;">
            <input type="submit" class="styled-button-1" value="Back"/>
            <?php echo CHtml::submitButton('Save and Continue', array('class' => 'styled-button-2')); ?>
        </div>
        <!--</form>-->
    </div>
    <div style="clear:both;">&nbsp;</div>
</div>
<?php $this->endWidget(); ?>
</div>
<script type="text/javascript">
    function callpage() {
        var f;
        f = '<?php echo Yii::app()->createUrl('eventPlanner/planEventAccessoriesAdd',array('id' => $oEventModel->id))?>';
        ajaxCall(f, 'a&' + 'page=' + document.getElementById('SearchText').value + '&pagesize=' + document.getElementById('pagesize').value + '&ajaxcall=yes', 'equalize', 'ac_loading_paging', '300px');
    }
    function callpagecategory(catId) {
        var f;
        f = '<?php echo Yii::app()->createUrl('eventPlanner/planEventAccessoriesAdd',array('id' => $oEventModel->id))?>';
        ajaxCall(f, 'a&' + 'page=' + document.getElementById('SearchText').value + '&pagesize=' + document.getElementById('pagesize').value + '&ajaxcall=yes&catId=' + catId, 'equalize', 'ac_loading_paging', '300px');

    }
    function callnextpage(pageNumber, totalPage) {
        if (pageNumber == totalPage)
            return false;
        var f;
        f = '<?php echo Yii::app()->createUrl('eventPlanner/planEventAccessoriesAdd',array('id' => $oEventModel->id))?>';
        ajaxCall(f, 'a&' + 'page=' + (parseInt(document.getElementById('SearchText').value) + 1) + '&pagesize=' + document.getElementById('pagesize').value + '&ajaxcall=yes', 'equalize', 'ac_loading_paging', '300px');
    }
    function callpreviouspage(pageNumber, totalPage) {
        if (pageNumber == 1)
            return false;
        var f;
        f = '<?php echo Yii::app()->createUrl('eventPlanner/planEventAccessoriesAdd',array('id' => $oEventModel->id))?>';
        ajaxCall(f, 'a&' + 'page=' + (parseInt(document.getElementById('SearchText').value) - 1) + '&pagesize=' + ((document.getElementById('pagesize').value)) + '&ajaxcall=yes', 'equalize', 'ac_loading_paging', '300px');
    }
</script>