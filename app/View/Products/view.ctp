<div class="products view">
<h2><?php echo __('Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($product['Product']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($product['Product']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($product['Product']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reverses'), array('controller' => 'reverses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reverse'), array('controller' => 'reverses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reverses'); ?></h3>
	<?php if (!empty($product['Reverse'])): ?>
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
	<?php foreach ($product['Reverse'] as $reverse): ?>
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
