<div class="collections form">
<?php echo $this->Form->create('Collection'); ?>
	<fieldset>
		<legend><?php echo __('Add Collection'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('order');
		echo $this->Form->input('invoice');
		echo $this->Form->input('material');
		echo $this->Form->input('description');
		echo $this->Form->input('type');
		echo $this->Form->input('netprice');
		echo $this->Form->input('icms');
		echo $this->Form->input('ipi');
		echo $this->Form->input('total');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Collections'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
