<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'Manage Products'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Update Product'); ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>