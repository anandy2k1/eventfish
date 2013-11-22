<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Manage'),
);
$this->menu = array(
    array('label' => Yii::t('app', 'Add') . ' ' . $model->label(), 'url' => array('create')),
);
?>
<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'category_image',
            'type' => 'html',
            'value' => 'Common::getCategoryImage($data->category_image)',
            'filter' => false,
            'header' => Yii::t('app', 'Image'),
            'htmlOptions' => array('style' => 'width:5%'),
            'headerHtmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'category_type',
            'value' => '$data->category_type',
            'filter' => Yii::app()->params['categoryType'],
        ),
        'category_name',        
        array(
            'name' => 'status',
            'value' => '($data->status == 0) ? Yii::t(\'app\', \'InActive\') : Yii::t(\'app\', \'Active\')',
            'filter' => array('0' => Yii::t('app', 'InActive'), '1' => Yii::t('app', 'Active')),
        ),
        array(
            'template' => '{update}{delete}',
            'class' => 'CButtonColumn',
            'header' => Yii::t('app', 'Actions'),
            /*'buttons'=>array(
                'update'=>array(
                    'imageUrl'=>Yii::app()->baseUrl.'/images/edit.png',
                ),
                'delete'=>array(
                    'imageUrl'=>Yii::app()->baseUrl.'/images/delete.png',
                ),
            ),*/
            'deleteConfirmation' => "Are you sure want to delete this category?"            
        )
    ),
));
?>