<div class="inner-block cbox">
    <ul>
        <?php
        if ($omEventVendorCategories):
            foreach ($omEventVendorCategories as $omDataSet):
                //if ($omDataSet->category_type == "EVENT"):
                if (1):
                    if (Common::getSubCategoryCount($omDataSet->id) > 0) {
                        ?>
                        <li class="cbox-column cursor-pointer" onclick="load_child_categories('<?php echo $omDataSet->id ?>','<?php echo $_GET['divId']?>','<?php echo $_GET['catId']?>')">
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
        <li onclick="load_child_categories('<?php echo $_GET['parentId']?>','<?php echo $_GET['divId']?>','<?php echo $_GET['parentId']?>')" class="cursor-pointer">
            Back
        </li>
    </ul>
</div>