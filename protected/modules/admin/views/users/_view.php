<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('parent_id')); ?>:
	<?php echo GxHtml::encode($data->parent_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('role_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->role)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('password')); ?>:
	<?php echo GxHtml::encode($data->password); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('facebook_id')); ?>:
	<?php echo GxHtml::encode($data->facebook_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('is_fblogin')); ?>:
	<?php echo GxHtml::encode($data->is_fblogin); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('ssn_number')); ?>:
	<?php echo GxHtml::encode($data->ssn_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('routing_number')); ?>:
	<?php echo GxHtml::encode($data->routing_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('account_number')); ?>:
	<?php echo GxHtml::encode($data->account_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('bank_name')); ?>:
	<?php echo GxHtml::encode($data->bank_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('first_name')); ?>:
	<?php echo GxHtml::encode($data->first_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('last_name')); ?>:
	<?php echo GxHtml::encode($data->last_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('address_1')); ?>:
	<?php echo GxHtml::encode($data->address_1); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('address_2')); ?>:
	<?php echo GxHtml::encode($data->address_2); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('city')); ?>:
	<?php echo GxHtml::encode($data->city); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('state_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->state)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('country_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->country)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('zip')); ?>:
	<?php echo GxHtml::encode($data->zip); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone')); ?>:
	<?php echo GxHtml::encode($data->phone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone_type')); ?>:
	<?php echo GxHtml::encode($data->phone_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_of_birth')); ?>:
	<?php echo GxHtml::encode($data->date_of_birth); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gender')); ?>:
	<?php echo GxHtml::encode($data->gender); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ethnicity')); ?>:
	<?php echo GxHtml::encode($data->ethnicity); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('income')); ?>:
	<?php echo GxHtml::encode($data->income); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('marital_status')); ?>:
	<?php echo GxHtml::encode($data->marital_status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_type')); ?>:
	<?php echo GxHtml::encode($data->user_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_type2')); ?>:
	<?php echo GxHtml::encode($data->user_type2); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('short_description')); ?>:
	<?php echo GxHtml::encode($data->short_description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('start_time')); ?>:
	<?php echo GxHtml::encode($data->start_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('end_time')); ?>:
	<?php echo GxHtml::encode($data->end_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('available_days')); ?>:
	<?php echo GxHtml::encode($data->available_days); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('last_login_at')); ?>:
	<?php echo GxHtml::encode($data->last_login_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	*/ ?>

</div>