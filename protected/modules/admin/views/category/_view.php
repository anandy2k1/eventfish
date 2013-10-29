<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('parent_id')); ?>:
	<?php echo GxHtml::encode($data->parent_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cateogry_name')); ?>:
	<?php echo GxHtml::encode($data->cateogry_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('category_type')); ?>:
	<?php echo GxHtml::encode($data->category_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('category_description')); ?>:
	<?php echo GxHtml::encode($data->category_description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	*/ ?>

</div>