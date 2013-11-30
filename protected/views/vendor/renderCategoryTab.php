<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => array(
        'Food & Catering' => array('ajax' => $this->createUrl('vendor/getRenderCategories', array('parent_id' => Yii::app()->params['categoryParentId']['food'], 'search_by' => $ssSearchBy))),
        'Accesories & Rentals' => array('ajax' => $this->createUrl('vendor/getRenderCategories', array('parent_id' => Yii::app()->params['categoryParentId']['entertainment'], 'search_by' => $ssSearchBy))),
        'Entertainment & Staff' => array('ajax' => $this->createUrl('vendor/getRenderCategories', array('parent_id' => Yii::app()->params['categoryParentId']['rental'], 'search_by' => $ssSearchBy))),
        'Transportation' => array('ajax' => $this->createUrl('vendor/getRenderCategories', array('parent_id' => Yii::app()->params['categoryParentId']['transportation'], 'search_by' => $ssSearchBy)))
    ),
    'id' => 'MyTab-Menu',
    'htmlOptions' => array('style' => 'float:left;padding-botton:5px;')
));?>