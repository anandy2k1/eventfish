<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>
<section>
    <div class="container">
        <div class="event-dashboard">
            <div class="confirm-dashboard">
                <ul>
                    <li class="disable active">
                        <p class="icon">1</p>
                        <h3>Account Details </h3>
                    </li>
                    <li class="disable current">
                        <p class="icon">2</p>
                        <h3>Create your Profile</h3>
                    </li>
                    <li class="disable">
                        <p class="icon">3</p>
                        <h3> Service Area</h3>
                    </li>
                    <li class="disable last">
                        <p class="icon">4</p>
                        <h3>Review</h3>
                    </li>
                </ul>
            </div>
            <div class="account-details">
                <div class="create-profile">
                    <div class="idTabs">
                        <?php
                        $this->widget('zii.widgets.jui.CJuiTabs', array(
                            'tabs' => array(
                                'Profile Overview' => array('id' => 'profile-overview-id', 'content' => $this->renderPartial(
                                            '_personal_detail', array('model' => $model), TRUE
                                    )),
                                'Menu & Prices' => array('id' => 'menu-price-id', 'content' => $this->renderPartial(
                                            '_menu_price', array('Values' => ''), TRUE
                                    )),
                            ),
                            'id' => 'MyTab-Menu',
                            'htmlOptions' => array('style' => 'float:left;padding-botton:5px;')
                        ));
                        ?>
                        <?php /*
                          <ul class="tabContainer">
                          <li class="first"><a class="selected" href="#one">Profile Overview</a></li>
                          <li class="last	"><a href="#two">Menu & Prices</a></li>
                          </ul>
                          <div id="one" class="tabContent">
                          <div class="up-img-block">
                          <div class="f-left">
                          <div class="up-photos">
                          <div class="upload-container"> <span>
                          <input type="file" name="data[User][profile_image]" class="image-upload" id="UserProfileImage">
                          </span> </div>
                          <div class="add-photos-button"> <span class="button-add"> <img src="<?php echo Yii::app()->baseUrl; ?>/images/up-photos.png"> </span>
                          </div>
                          </div>
                          <ul class="uploaded-img">
                          <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/default-img.png"></li>
                          <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/default-img.png"></li>
                          <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/default-img.png"></li>
                          </ul>
                          </div>
                          <div class="f-right">
                          <ul class="general-form">
                          <li class="checkbox"><input type="checkbox" /> <span>Use your Facebook Photo</span></li>
                          <li><label>Tell us and your clients about you</label><span><textarea class="textarea"></textarea></span></li>
                          </ul>
                          </div>
                          </div>
                          <div class="up-video-block">
                          <div class="f-left">
                          <div class="up-photos">
                          <div class="upload-container"> <span>
                          <input type="file" name="data[User][profile_image]" class="image-upload" id="UserProfileImage">
                          </span> </div>
                          <div class="add-photos-button"> <span class="button-add"> <img src="<?php echo Yii::app()->baseUrl; ?>/images/video.png"> </span>
                          </div>
                          </div>
                          <ul class="uploaded-img">
                          <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/vedio-1.png"></li>
                          <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/vedio-1.png"></li>
                          <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/vedio-1.png"></li>
                          </ul>
                          </div>
                          <div class="f-right">
                          <ul class="general-form">
                          <li><label>What days are you available?</label></li>
                          <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/proses-bg.png"></li>
                          </ul>
                          </div>
                          <div class="add-qus">
                          <label>Top 5 Question Asked: <em>Vendor Title</em></label>
                          <span><input type="text" class="input" /><button class="add-more">&nbsp;</button></span>
                          </div>
                          <div class="submit a-right"><button class="general-btn-1"><span><span>Next</span></span></button></div>
                          </div>
                          </div>
                          <div id="two" class="tabContent">

                          </div>
                         * 
                         */ ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<script>
    $("#choose-cat").click(function() {
        if ($('input:checkbox:checked').length > 0) {
            return true;
        } else {
            history.go(-1);
            return false;
        }
    });
    $(".categorylink").click(function() {
        if (!$("#imgCat" + this.id).hasClass("selectedImage")) {
            $("#imgCat" + this.id).addClass("selectedImage");
            $("#imgCat" + this.id).attr('src', '<?php echo Yii::app()->params['site_url'] . Yii::app()->baseUrl; ?>/images/my-wish-select.png');
            $("#categoryid" + this.id).attr('checked', 'checked');
        }
        else {
            $("#imgCat" + this.id).removeClass("selectedImage");
            $("#imgCat" + this.id).attr('src', '<?php echo Yii::app()->params['site_url'] . Yii::app()->baseUrl; ?>/images/my-wish.png');
            $("#categoryid" + this.id).attr('checked', false);
        }
    });
</script>