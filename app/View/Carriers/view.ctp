<div class="carriers view">
<h2><?php echo __('Carrier'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($carrier['Carrier']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($carrier['Carrier']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($carrier['Carrier']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($carrier['Carrier']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Carrier'), array('action' => 'edit', $carrier['Carrier']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Carrier'), array('action' => 'delete', $carrier['Carrier']['id']), array(), __('Are you sure you want to delete # %s?', $carrier['Carrier']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Carriers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrier'), array('action' => 'add')); ?> </li>
	</ul>
</div>
