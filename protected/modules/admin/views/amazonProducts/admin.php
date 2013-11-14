<?php
$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
    Yii::t('app', 'Manage'),
);
$this->menu = array(
    array('label' => Yii::t('app', 'Import Products'), 'url' => array('importProduct')),
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
            'name' => 'product_image',
            'type' => 'html',
            'value' => 'CHtml::image($data->product_image,"",array("width" => "70px", "height" => "70px"))',
            'filter' => false,
            'header' => Yii::t('app', 'Image')
        ),
        array(
            'name' => 'amazon_product_id',
            'type' => 'html',
            'value' => '$data->amazon_product_id',
            'header' => Yii::t('app', 'Product ID')
        ),
        'product_name',
        'product_description',
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
            'header' => Yii::t('app', 'Actions'),
            'deleteConfirmation' => "Are you sure want to delete this product?",
            'htmlOptions' => array('style' => 'width:5%;text-align:center;')
        ),
    ),
));
?>