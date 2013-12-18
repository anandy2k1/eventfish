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
                <?php
                $ssUrl = (isset($_REQUEST['id'])) ? array('eventPlanner/planEventGeneralEdit', 'id' => $_REQUEST['id']) : array('eventPlanner/planEventGeneral');
                echo CHtml::link('General', $ssUrl, array('style' => 'color:#fff;'));
                ?>
            </h1>

            <div class="details"></div>
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
//echo $form->errorSummary($model);
?>

<div class="event-block-bg">
<div class="event-block-title-bg">
    <div class="ribbn"><img src="<?php echo Yii::app()->baseUrl; ?>/images/ribbon-1.png" alt=""/></div>
    Accessories & Rentals
</div>
<div class="tab-menu">
    <ul>
        <li class="activ"><a href="#">Party Accessories</a></li>
        <li><a href="#">Equipment Rentals</a></li>
        <li><a href="#">Contumes</a></li>
        <li style="border:none;"><a href="#">Clothes</a></li>
    </ul>
</div>
<div style="clear:both">&nbsp;</div>
<div class="tab-content-bg">
<div class="cat-menu-bg">
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

            <input type="text"  placeholder="Search" class="search-bg" id="search" onkeyup="searchTable(this.value);"/>
            <input type="submit" value=""
                   style="background:url(<?php echo Yii::app()->baseUrl; ?>/images/search-button.png) no-repeat; width:77px; height:29px; margin:0 0 0 5px; float:left; cursor:pointer;">
            <select class="acce_add_sel" onchange="callpage();" name="pagesize" id="pagesize">
                <?php
                $optionAry = array(1=>3,2=>5,3=>10,4=>15,5=>20);
                foreach($optionAry as $key=>$val)
                {
                    $sel ="";
                    if ($pagesize == $val)
                    {
                        $sel = "selected='selected'";
                    }
                    ?>
                    <option <?php echo $sel?> value="<?php echo $val?>"><?php echo $val?> per page</option>
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
                <span class="lef-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/lef-arrow.png" alt=""/></a></span>


                <p>Page</p>

                    <!--<input type="text" onclick="this.value=''" id="SearchText" value="<?php /*echo $pageNumber*/?>" class="pagin-bg"  />-->

                <select style="margin-left: 0;margin-top: 2px;width:58px;" class="acce_add_sel" onchange="callpage();" name="SearchText" id="SearchText">
                    <?php
                    //$optionAry = array(1=>3,2=>5,3=>10,4=>15,5=>20);
                    for($i=1;$i<=$totalPages;$i++)
                    {
                        $sel ="";
                        if ($pageNumber == $i)
                        {
                            $sel = "selected='selected'";
                        }
                        ?>
                        <option <?php echo $sel?> value="<?php echo $i?>"><?php echo $i?></option>
                    <?php
                    }
                    ?>
                </select>

                <p>of <?php echo $totalPages?></p>
                <span class="rit-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/rit-arrow.png" alt=""/></a></span>
            </div>


    </div>
</div>
<div style="clear:both">&nbsp;</div>

<div class="table-title-bg">
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

    <?php
    foreach ($model as $oProduct) {
        ?>
        <table class="target" cellspacing="0" cellpadding="0" border="0">
            <tr cellspacing="0" cellpadding="0" border="0">
                <td cellspacing="0" cellpadding="0" border="0">
                    <div class="table-contnt-bg">
                        <div class="row-1">
                            <img height="50" width="50" src="<?php echo $oProduct->product_image; ?>" alt="" style="margin-right: 20px;"/>

                            <p title="<?php echo $oProduct->product_name ?>">
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
                            <span><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/minus-icon.png" alt="" style="float:left;"/></a></span>
                            <input type="text" name="num" size="1" value="2"
                                   style="background:#64c531; color:#fff; width:30px; height:27px; text-align:center; margin:4px 5px 0px 5px; border:1px  solid #7c8079; float:left;"/>
                            <span><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/plus-icon.png" alt="" style="float:left;"/></a></span>
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


<!--<div class="table-contnt-bg1">
                <div class="row-7">
                    <img src="<?php /*echo Yii::app()->baseUrl; */?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-8">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-9">
                    <p>D J Lighting</p>
                </div>
                <div class="row-10">
                    <img src="<?php /*echo Yii::app()->baseUrl; */?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-11">
                    <p>$ 28.99</p>
                </div>
                <div class="row-12">
                    <a href="#"><img src="<?php /*echo Yii::app()->baseUrl; */?>/images/add-button-icon.png" alt="" /></a>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="table-contnt-bg">
                <div class="row-1">
                    <img src="<?php /*echo Yii::app()->baseUrl; */?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-2">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-3">
                    <p>D J Lighting</p>
                </div>
                <div class="row-4">
                    <img src="<?php /*echo Yii::app()->baseUrl; */?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-5">
                    <p>$ 28.99</p>
                </div>
                <div class="row-6">
                    <span><a href="#"><img src="<?php /*echo Yii::app()->baseUrl; */?>/images/minus-icon.png" alt="" style="float:left;" /></a></span>
                    <input type="text" name="num" size="1" value="2" style="background:#64c531; color:#fff; width:30px; height:27px; text-align:center; margin:4px 5px 0px 5px; border:1px  solid #7c8079; float:left;" />
                    <span><a href="#"><img src="<?php /*echo Yii::app()->baseUrl; */?>/images/plus-icon.png" alt="" style="float:left;" /></a></span>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="table-contnt-bg1">
                <div class="row-7">
                    <img src="<?php /*echo Yii::app()->baseUrl; */?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-8">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-9">
                    <p>D J Lighting</p>
                </div>
                <div class="row-10">
                    <img src="<?php /*echo Yii::app()->baseUrl; */?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-11">
                    <p>$ 28.99</p>
                </div>
                <div class="row-12">
                    <a href="#"><img src="<?php /*echo Yii::app()->baseUrl; */?>/images/add-button-icon.png" alt="" /></a>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="table-contnt-bg">
                <div class="row-1">
                    <img src="<?php /*echo Yii::app()->baseUrl; */?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-2">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-3">
                    <p>D J Lighting</p>
                </div>
                <div class="row-4">
                    <img src="<?php /*echo Yii::app()->baseUrl; */?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-5">
                    <p>$ 28.99</p>
                </div>
                <div class="row-6">
                    <span><a href="#"><img src="<?php /*echo Yii::app()->baseUrl; */?>/images/minus-icon.png" alt="" style="float:left;" /></a></span>
                    <input type="text" name="num" size="1" value="2" style="background:#64c531; color:#fff; width:30px; height:27px; text-align:center; margin:4px 5px 0px 5px; border:1px  solid #7c8079; float:left;" />
                    <span><a href="#"><img src="<?php /*echo Yii::app()->baseUrl; */?>/images/plus-icon.png" alt="" style="float:left;" /></a></span>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="table-contnt-bg1">
                <div class="row-7">
                    <img src="<?php /*echo Yii::app()->baseUrl; */?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-8">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-9">
                    <p>D J Lighting</p>
                </div>
                <div class="row-10">
                    <img src="<?php /*echo Yii::app()->baseUrl; */?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-11">
                    <p>$ 28.99</p>
                </div>
                <div class="row-12">
                    <a href="#"><img src="<?php /*echo Yii::app()->baseUrl; */?>/images/add-button-icon.png" alt="" /></a>
                </div>
            </div>
            <div style="clear:both;"></div>-->
</div>
<div class="table-bottom-bg">
    <p><strong>Intructions:</strong> Lorem ipsum simply dummy taxt</p>

    <form class="button">
        <input type="submit" class="styled-button-1" value="Back"/>
        <input type="submit" class="styled-button-2" value="Save and Continue"/>
    </form>
</div>
<div style="clear:both;">&nbsp;</div>
</div>
<?php $this->endWidget(); ?>
</div>




<script type="text/javascript">
    /*$(document).ready(function () {
        $('#search').keyup(function () {
            searchTable($(this).val());
        });
    });*/


    function searchTable(inputVal) {
//        var table = $('#tblData');
        var table = $('.target');
        table.find('tr').each(function (index, row) {
            var allCells = $(row).find('td');
            if (allCells.length > 0) {
                var found = false;
                allCells.each(function (index, td) {
                    var regExp = new RegExp(inputVal, 'i');
                    if (regExp.test($(td).text())) {
                        found = true;
                        $(td).show();
                        //return false;
                    }
                    else {
                        $(td).hide();
                    }
                });
                /*if(found == true)
                 {
                 $(row).show();
                 }
                 else
                 {
                 $(row).hide();
                 }*/
            }
        });
    }

    function callpage()
    {
        var f;
        try {
            f = window.location.href.split('?')[0];
        }
        catch(e)
        {
            f = window.location.href;
        }

        ajaxCall(f,'a&' + 'page=' + document.getElementById('SearchText').value + '&pagesize=' + document.getElementById('pagesize').value + '&ajaxcall=yes','equalize','ac_loading_paging','300px');
//        window.location=url;

    }
   /* $('#SearchText').keypress(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code == 13) {
            if (  document.getElementById('SearchText').value > <?php echo $totalPages?>)
            {
                alert ('Page no. '+document.getElementById('SearchText').value+' not found');
                return false;
            }
            callpage();
            return false;
        }
    });*/
</script>