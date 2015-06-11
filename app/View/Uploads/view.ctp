<div class="uploads view">
<h2><?php echo __('Upload'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['filename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mimetype'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['mimetype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filesize'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['filesize']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($upload['Type']['name'], array('controller' => 'types', 'action' => 'view', $upload['Type']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Upload'), array('action' => 'edit', $upload['Upload']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Upload'), array('action' => 'delete', $upload['Upload']['id']), null, __('Are you sure you want to delete # %s?', $upload['Upload']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reverses'), array('controller' => 'reverses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reverse'), array('controller' => 'reverses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reverses'); ?></h3>
	<?php if (!empty($upload['Reverse'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Invoice'); ?></th>
		<th><?php echo __('Serie'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Cost Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($upload['Reverse'] as $reverse): ?>
		<tr>
			<td><?php echo $reverse['id']; ?></td>
			<td><?php echo $reverse['invoice']; ?></td>
			<td><?php echo $reverse['serie']; ?></td>
			<td><?php echo $reverse['quantity']; ?></td>
			<td><?php echo $reverse['amount']; ?></td>
			<td><?php echo $reverse['status_id']; ?></td>
			<td><?php echo $reverse['cost_id']; ?></td>
			<td><?php echo $reverse['created']; ?></td>
			<td><?php echo $reverse['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reverses', 'action' => 'view', $reverse['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reverses', 'action' => 'edit', $reverse['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reverses', 'action' => 'delete', $reverse['id']), null, __('Are you sure you want to delete # %s?', $reverse['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Reverse'), array('controller' => 'reverses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
