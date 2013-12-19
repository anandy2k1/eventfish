<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Manage Products') => array('admin'),
    Yii::t('app', 'Import'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'Manage Products'), 'url' => array('admin')),
);
?>
<div style="margin-top: 40px;">

</div>
<div class="clear">
    <table width="100%" class="import-product-form-table">
        <tr>
            <th>
                Import Using CSV
            </th>
            <th>
                Import Single Product Using ASIN
            </th>
        </tr>
        <tr>
            <td width="50%">
                <div class="form">
                    <?php
                    $form = $this->beginWidget('GxActiveForm', array(
                        'id' => 'amazon-products-form',
                        'enableAjaxValidation' => false,
                        'action' => Yii::app()->createUrl('/admin/amazonProducts/importProduct'),
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    ));
                    ?>

                    <p class="note">
                        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
                    </p>

                    <?php echo $form->errorSummary($model); ?>
                    <div class="row">
                        <?php echo $form->labelEx($model, 'csvfile'); ?>
                        <?php echo $form->fileField($model, 'csvfile'); ?>
                        <?php echo $form->error($model, 'csvfile'); ?>
                    </div>
                    <!-- row -->

                    <div class="row">
                        <?php echo $form->labelEx($model, 'category_ids'); ?>
                        <?php echo $form->ListBox($model, 'category_ids', $amCategories, array('size' => '5', 'multiple' => 'multiple')); ?>
                        <?php echo $form->error($model, 'category_ids'); ?>
                    </div>
                    <!-- row -->


                    <?php
                    echo GxHtml::submitButton(Yii::t('app', 'Submit'));
                    $this->endWidget();
                    ?>
                </div>
                <!-- form -->
            </td>
            <td width="50%">
                <div class="form">
                    <?php
                    $form = $this->beginWidget('GxActiveForm', array(
                        'id' => 'amazon-single-products-form',
                        'enableAjaxValidation' => false,
                        'action' => Yii::app()->createUrl('/admin/amazonProducts/importProductSingle'),
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    ));
                    ?>

                    <p class="note">
                        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
                    </p>

                    <?php echo $form->errorSummary($model); ?>
                    <label>Enter ASIN NUMBER :</label> <input type="text" name="asin" id="asin">

                    <div class="row">
                        <?php echo $form->labelEx($model, 'category_ids'); ?>
                        <?php echo $form->ListBox($model, 'category_ids', $amCategories, array('size' => '5', 'multiple' => 'multiple')); ?>
                        <?php echo $form->error($model, 'category_ids'); ?>
                    </div>
                    <!-- row -->


                    <?php
                    echo GxHtml::submitButton(Yii::t('app', 'Submit'));
                    $this->endWidget();
                    ?>
                </div>
                <!-- form -->
            </td>
        </tr>
    </table>
</div>
