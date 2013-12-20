<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Manage'),
);?>
<div class="clear">&nbsp;</div><div class="clear">&nbsp;</div><div class="clear">&nbsp;</div>
<h1><?php echo Yii::t('app', 'Manage') . ' Email Content' ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'email-format-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        array(
            'header' => Yii::t("messages", 'Sr. No.'),
            'value' => '++$row',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'title',
            'type' => 'html',
            'value' => '$data->file_name',
            'headerHtmlOptions' => array('style' => 'text-align:left;')
        ),
        array(
            'name' => 'subject',
            'type' => 'html',
            'value' => '$data->subject',
            'headerHtmlOptions' => array('style' => 'text-align:left;')
        ),
        array(
            'name' => 'status',
            'filter' => array('1' => 'Active', '0' => 'Inactive'),
            'type' => 'html',
            'value' => 'CHtml::tag("div",  array("style"=>"text-align: center" ) , CHtml::tag("img", array( "src" => UtilityHtml::getStatusImage(GxHtml::valueEx($data, \'status\')))))',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>