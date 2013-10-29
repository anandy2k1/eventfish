<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Manage'),
);
$this->menu = array(
    array('label' => Yii::t('app', 'Add Image'), 'url' => array('create')),
);
?>
<h1><?php echo Yii::t('app', 'Manage Slider Images'); ?></h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'slider-image-management-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        array(
            'name' => 'image_url',
            'type' => 'html',
            'value' => 'Common::getSliderImage($data->image_url)',
            'filter' => false,
            'header' => Yii::t('app', 'Image'),
            'htmlOptions' => array('style' => 'width:5%'),
            'headerHtmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'caption',
            'type' => 'html',
            'value' => '$data->caption',
            'filter' => false,
            'header' => Yii::t('app', 'Caption'),
            'headerHtmlOptions' => array('style' => 'text-align:left;'),
            'htmlOptions' => array('style' => 'width:60%;text-align:left;')
        ),
        array(
            'name' => 'status',
            'value' => 'Yii::app()->params["defaultStatus"][$data->status]',
            'filter' => false,
            //'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'htmlOptions' => array('style' => 'width:5%;text-align:center;')
        ),
        array(
            'template' => '{update}{delete}',
            'class' => 'CButtonColumn',
            'header' => Yii::t('app', 'Actions'),
            'deleteConfirmation' => "Are you sure want to delete this image?",
            'htmlOptions' => array('style' => 'width:5%;text-align:center;')
        )
    ),
));
?>