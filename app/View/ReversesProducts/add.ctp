<div class="reversesProducts form">
<?php echo $this->Form->create('ReversesProduct'); ?>
	<fieldset>
		<legend><?php echo __('Add Reverses Product'); ?></legend>
	<?php
		echo $this->Form->input('reverse_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('embalagem');
                echo $this->Form->input('etiqueta', array('type' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Reverses Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reverses'), array('controller' => 'reverses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reverse'), array('controller' => 'reverses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
