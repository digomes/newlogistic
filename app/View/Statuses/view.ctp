<div class="statuses view">
<h2><?php echo __('Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($status['Status']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($status['Status']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visibility Groups'); ?></dt>
		<dd>
			<?php echo h($status['Status']['visibility_groups']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($status['Status']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($status['Status']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status'), array('action' => 'edit', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status'), array('action' => 'delete', $status['Status']['id']), null, __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reverses'), array('controller' => 'reverses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reverse'), array('controller' => 'reverses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reverses'); ?></h3>
	<?php if (!empty($status['Reverse'])): ?>
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
	<?php foreach ($status['Reverse'] as $reverse): ?>
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
