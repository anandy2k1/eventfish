<?php
$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
    Yii::t('app', 'Manage'),
);
$this->menu = array(
    array('label' => Yii::t('app', 'Import from Amazon'), 'url' => array('importProduct')),

);
?>
    <h1><?php echo Yii::t('app', 'Manage Products'); ?></h1>
    <div class="search-form">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'amazon-products-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => Yii::t("messages", 'Sr. No.'),
            'value' => '++$row',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'product_image',
            'type' => 'html',
            'value' => 'CHtml::image($data->product_image,"",array("width" => "70px", "height" => "70px"))',
            'filter' => false,
            'header' => Yii::t('app', 'Image')
        ),
        array(
            'name' => 'amazon_asin_number',
            'type' => 'html',
            'value' => '$data->amazon_asin_number',
            'header' => Yii::t('app', 'ASIN Number')
        ),
        array(
            'name' => 'amazon_product_id',
            'type' => 'html',
            'value' => '$data->amazon_product_id',
            'header' => Yii::t('app', 'UPC')
        ),
        array(
            'name' => 'product_name',
            'value' => '$data->product_name',
            'header' => Yii::t('app', 'Title')
        ),
        array(
            'class' => 'CButtonColumn',
            /*'template' => '{update}{delete}',*/
            'template' => '{delete}',
            'header' => Yii::t('app', 'Actions'),
            'deleteConfirmation' => "Are you sure want to delete this product?",
            'htmlOptions' => array('style' => 'width:5%;text-align:center;')
        ),
    ),
));
?>