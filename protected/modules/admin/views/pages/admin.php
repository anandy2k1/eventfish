<?php
$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
    Yii::t('app', 'List'),
);
$this->menu = array(
    /*array('label' => Yii::t('app', 'Add Page'), 'url' => array('create')),*/
);
?>
<h1><?php echo Yii::t('app', 'List') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pages-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'title',
        array(
            'name' => 'content',
            'value' => '(strlen($data->content) > 50) ? substr($data->content, 0, 50) . "..." : $data->content;',
            'type' => 'html',
        ),
        array(
            'name' => 'status',
            'type' => 'html',
            'filter' => UtilityHtml::getStatusArray(),
            'value' => 'CHtml::tag("div",  array("style"=>"text-align: center" ) , CHtml::tag("img", array( "src" => UtilityHtml::getStatusImage(GxHtml::valueEx($data, \'status\')))))',
        ),
        array(
            'template' => '{update}{delete}',
            'class' => 'CButtonColumn',
        ),
    ),
));
?>