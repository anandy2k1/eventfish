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
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/fish-icon.png" alt="" class="margin_right" />
                    <?php
                        $ssUrl = (isset($_REQUEST['id'])) ? array('eventPlanner/planEventGeneralEdit', 'id' => $_REQUEST['id']) :  array('eventPlanner/planEventGeneral') ;
                        echo CHtml::link('General', $ssUrl, array('style' => 'color:#fff;'));
                    ?>
                </h1>
                <div class="details"></div>
            </li>
            <li class="complete">
                <h1><img src="<?php echo Yii::app()->baseUrl; ?>/images/food-icon.png" alt="" class="margin_right" />Food</h1>
                <div class="details"></div>
            </li>
            <li class="active">                
                <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/acce-icon.png" alt="" />Accessories & Rentals</h1>
                <div class="details"></div>
            </li>
            <li>                
                <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/entertai-icon.png" alt="" />Entertainers & Personnel</h1>
                <div class="details"></div>
            </li>
            <li>                
                <h1><img src="<?php echo Yii::app()->baseUrl; ?>/images/trans-icon.png" alt="" class="margin_right" />Transport</h1>
                <div class="details"></div>
            </li>
            <li class="last">                
                <h1 class="two-line"><img src="<?php echo Yii::app()->baseUrl; ?>/images/gift-icon.png" alt="" />Invitations & Gifts</h1>
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
            <div class="ribbn"><img src="<?php echo Yii::app()->baseUrl; ?>/images/ribbon-1.png" alt="" /></div>
            Accessories & Rentals </div>
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
                        <li class="delet"><a href="#">Category<img src="<?php echo Yii::app()->baseUrl; ?>/images/cross-icon.png" alt="" /></a></li>
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
                        <li class="delet1" style="margin:0 0 0 30px; padding:10px 60px 0 0px;"><a href="#">Category<img src="<?php echo Yii::app()->baseUrl; ?>/images/add-1.png" alt="" /></a></li>
                        <li style="padding:10px 80px 0 0px;"><a href="#">Category</a></li>
                        <li style="padding:10px 80px 0 0px;"><a href="#">Category</a></li>
                        <li style="padding:10px 0 0 0;"><a href="#">Category</a></li>
                    </ul>
                </div>
            </div>
            <div style="clear:both">&nbsp;</div>
            <div class="serch-contnt">
                <div class="serch-box">
                    <form>
                        <input type="text" placeholder="Search" class="search-bg"/>
                        <input type="submit" value="" style="background:url(<?php echo Yii::app()->baseUrl; ?>/images/search-button.png) no-repeat; width:77px; height:29px; margin:0 0 0 5px; float:left; cursor:pointer;">
                        <select style="background:#fff; padding:4px 10px; margin:0 0 0 80px; width:133px; height:27px; float:left; border:1px solid #000; border-radius:5px">
                            <option>25 per page</option>
                            <option>26 per page</option>
                            <option>27 per page</option>
                        </select>
                        <div class="pagination">
                            <span class="lef-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/lef-arrow.png" alt="" /></a></span> 
                            <p>Page</p>
                            <input type="text" value="2" class="pagin-bg"/>
                            <p>of 26</p>
                            <span class="rit-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/rit-arrow.png" alt="" /></a></span> 
                        </div>
                    </form>

                </div>
            </div>
            <div style="clear:both">&nbsp;</div>
            <div class="table-title-bg">
                <div class="col-1">
                    <p>Lighting</p>
                    <span class="up-dwon-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/up-down-arrow.png" alt="" /></a></span>
                </div>
                <div class="col-1">
                    <p>Description</p>
                    <span class="up-dwon-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/up-down-arrow.png" alt="" /></a></span>
                </div>
                <div class="col-2">
                    <p>Seller</p>
                    <span class="up-dwon-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/up-down-arrow.png" alt="" /></a></span>
                </div>
                <div class="col-3">
                    <p>Reviews</p>
                    <span class="up-dwon-arro"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/up-down-arrow.png" alt="" /></a></span>
                </div>
                <div class="col-4">
                    <p>Pricing</p>
                </div>
                <div class="col-5">
                    <p>Add to Net</p>
                </div>

            </div>

            <div class="table-contnt-bg">
                <div class="row-1">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-2">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-3">
                    <p>D J Lighting</p>
                </div>
                <div class="row-4">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-5">
                    <p>$ 28.99</p>
                </div>
                <div class="row-6">
                    <span><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/minus-icon.png" alt="" style="float:left;" /></a></span>
                    <input type="text" name="num" size="1" value="2" style="background:#64c531; color:#fff; width:30px; height:27px; text-align:center; margin:4px 5px 0px 5px; border:1px  solid #7c8079; float:left;" />
                    <span><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/plus-icon.png" alt="" style="float:left;" /></a></span>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="table-contnt-bg1">
                <div class="row-7">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-8">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-9">
                    <p>D J Lighting</p>
                </div>
                <div class="row-10">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-11">
                    <p>$ 28.99</p>
                </div>
                <div class="row-12">
                    <a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/add-button-icon.png" alt="" /></a>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="table-contnt-bg">
                <div class="row-1">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-2">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-3">
                    <p>D J Lighting</p>
                </div>
                <div class="row-4">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-5">
                    <p>$ 28.99</p>
                </div>
                <div class="row-6">
                    <span><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/minus-icon.png" alt="" style="float:left;" /></a></span>
                    <input type="text" name="num" size="1" value="2" style="background:#64c531; color:#fff; width:30px; height:27px; text-align:center; margin:4px 5px 0px 5px; border:1px  solid #7c8079; float:left;" />
                    <span><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/plus-icon.png" alt="" style="float:left;" /></a></span>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="table-contnt-bg1">
                <div class="row-7">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-8">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-9">
                    <p>D J Lighting</p>
                </div>
                <div class="row-10">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-11">
                    <p>$ 28.99</p>
                </div>
                <div class="row-12">
                    <a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/add-button-icon.png" alt="" /></a>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="table-contnt-bg">
                <div class="row-1">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-2">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-3">
                    <p>D J Lighting</p>
                </div>
                <div class="row-4">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-5">
                    <p>$ 28.99</p>
                </div>
                <div class="row-6">
                    <span><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/minus-icon.png" alt="" style="float:left;" /></a></span>
                    <input type="text" name="num" size="1" value="2" style="background:#64c531; color:#fff; width:30px; height:27px; text-align:center; margin:4px 5px 0px 5px; border:1px  solid #7c8079; float:left;" />
                    <span><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/plus-icon.png" alt="" style="float:left;" /></a></span>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="table-contnt-bg1">
                <div class="row-7">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/icon-1.png" alt="" />
                    <p>Candles</p>
                </div>
                <div class="row-8">
                    <p>These 4" tall, 1/2" diameter candles are great for any....</p>
                </div>
                <div class="row-9">
                    <p>D J Lighting</p>
                </div>
                <div class="row-10">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/rating-star.png" alt="" />
                </div>
                <div class="row-11">
                    <p>$ 28.99</p>
                </div>
                <div class="row-12">
                    <a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/add-button-icon.png" alt="" /></a>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="table-bottom-bg">
            <p><strong>Intructions:</strong> Lorem ipsum simply dummy taxt</p>
            <form class="button">
                <input type="submit" class="styled-button-1" value="Back" />
                <input type="submit" class="styled-button-2" value="Save and Continue" />
            </form>
        </div>
        <div style="clear:both;">&nbsp;</div>
    </div>
    <?php $this->endWidget(); ?>
</div>