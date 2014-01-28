<div class="event-dashboard eventplanner-steps">
    <div class="confirm-dashboard">
        <ul>
            <li class="disable active">
                <p class="icon">1</p>
                <h3>Personal Details </h3>
            </li>
            <li class="disable current">
                <p class="icon">2</p>
                <h3>My Wish list</h3>
            </li>
            <li class="disable">
                <p class="icon">3</p>
                <h3>Review</h3>
            </li>
        </ul>
    </div>
    <div class="account-details">
        <div class="create-profile">
            <div class="categoreis">

                <?php
                $form = $this->beginWidget('GxActiveForm', array(
                    'id' => 'event-step1-form',
                    'enableAjaxValidation' => false
                ));
                if ($omEventCategories):
                    $snI = 1;
                    foreach ($omEventCategories as $omDataSet):
                        $ssClass = ($snI % 5 == 0) ? 'block last' : 'block';
                        $ssClass = ($snI % 5 == 1) ? 'block first' : $ssClass;
                        ?>
                        <div id="divSelectCat<?php echo $omDataSet->id ?>" class="<?php echo $ssClass; ?>">
                            <a id="<?php echo $omDataSet->id ?>" class="categorylink" href="javascript:void(0);">
                                <div class="img">
                                    <?php
                                    $ssImage = in_array($omDataSet->id, $amEventCategories) ? Yii::app()->baseUrl . '/images/my-wish-select.png' : Yii::app()->baseUrl . '/images/my-wish.png';
                                    $ssImageClass = in_array($omDataSet->id, $amEventCategories) ? 'selectedImage' : 'normalImage';
                                    echo CHtml::image($ssImage, '', array('id' => 'imgCat'.$omDataSet->id, 'width' => '108', 'height' => '81','class' => $ssImageClass));
                                    ?>
                                    <input style="display: none;" type="checkbox" id="categoryid<?php echo $omDataSet->id; ?>" name="categoryids[]" value="<?php echo $omDataSet->id; ?>" <?php echo in_array($omDataSet->id, $amEventCategories) ? 'checked="checked"' : ''; ?>/>
                                </div>
                                <div class="text">
                                    <?php echo $omDataSet->category_name; ?>
                                </div>
                            </a>
                        </div>
                        <?php
                        $snI++;
                    //echo ($snI % 5 == 0) ? '<div class="clear"></div>' : '';
                    endforeach;
                endif;

                echo '<div class="clear"></div>';
                echo GxHtml::htmlButton('<span><span>Next</span></span>', array('class' => 'general-btn-1','type'=>'submit',"style" => "float:right;margin-right:0px;"));
                //echo GxHtml::submitButton('Next', array('id' => 'choose-cat', 'class' => 'general-btn'));
                $this->endWidget();
                ?>
            </div>
        </div>
    </div>
</div>
<div id="sendmail" style="display: none;">

</div>
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
            $("#imgCat" + this.id).attr('src', '<?php echo Yii::app()->params['site_url'].Yii::app()->baseUrl; ?>/images/my-wish-select.png');
            $("#categoryid" + this.id).attr('checked', 'checked');
        }
        else {
            $("#imgCat" + this.id).removeClass("selectedImage");
            $("#imgCat" + this.id).attr('src', '<?php echo  Yii::app()->params['site_url'].Yii::app()->baseUrl; ?>/images/my-wish.png');
            $("#categoryid" + this.id).attr('checked', false);
        }
    });





        /*window.onunload = window.onbeforeunload = function (evt) {
        var message = 'Are you sure?';
        if (typeof evt == 'undefined') {
            evt = window.event;
        }
        if (evt) {
            if (evt.type == "unload" && evt.returnValue) {
                // ACTION WHICH SHOULD BE DONE ON CLOSE
                ajaxCall('<?php echo Yii::app()->baseUrl;?>/index.php/eventPlanner/sendCloseMail','a&sendmail=1','sendmail','ac_lading','0px');
            }
            //evt.returnValue = message;
        }
        return message;
    };*/
    window.onbeforeunload = function() {
        $.ajax({
            url: '<?php echo Yii::app()->baseUrl;?>/index.php/eventPlanner/sendCloseMail?sendmail=2&userid=<?php echo Yii::app()->user->id?>',
            type: 'GET',
            async: false,
            timeout: 4000
        });
    };
</script>