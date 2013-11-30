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
        <div class="submit a-right">
            <?php echo GxHtml::htmlButton('<span><span>Next</span></span>', array('class' => 'button_green', 'type' => 'submit')); ?>
        </div>
    </div>
</div>