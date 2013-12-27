<?php

$this->breadcrumbs = array(
    Yii::t('app', 'Manage'),
);

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'users-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'role_id',
            'value' => 'GxHtml::valueEx($data->role)',
            'filter' => GxHtml::listDataEx(UserRole::model()->findAllAttributes(null, true)),
        ),
        'email',
        'ssn_number',
        'routing_number',
        'account_number',
        'bank_name',
        'first_name',
        'last_name',
        array(
            'name' => 'state_id',
            'value' => 'GxHtml::valueEx($data->state)',
            'filter' => GxHtml::listDataEx(StateMaster::model()->findAllAttributes(null, true)),
        ),
        array(
            'name' => 'country_id',
            'value' => 'GxHtml::valueEx($data->country)',
            'filter' => GxHtml::listDataEx(CountryMaster::model()->findAllAttributes(null, true)),
        ),
        array(
            'name' => 'status',
            'value' => '($data->status === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
        ),
        array(
            'template' => '{update}{delete}',
            'class' => 'CButtonColumn',
            'header' => Yii::t('app', 'Actions'),
            'deleteConfirmation' => "Are you sure want to delete this document?"
        )
    ),
));
?>