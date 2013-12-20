<?php

$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
    $model->subject
);
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'title',
            'filter' => array('0' => 'Visitor Login', '1' => 'Individual', '2' => 'Group'),
            'type' => 'html',
            'value' => EmailFormat::model()->getEmailTitleLabel(GxHtml::valueEx($model, 'title')),
        ),
        'subject',
        array(
            'name' => 'body',
            'type' => 'html',
            'value' => GxHtml::valueEx($model, 'body'),
        ),
        'last_updated',
        array(
            'name' => 'status',
            'value' => $model->status ? 'Active' : 'Inactive',
        ),
    ),
));
?>

