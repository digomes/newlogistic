<div class="types view">
<h2><?php echo __('Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($type['Type']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($type['Type']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($type['Type']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($type['Type']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Type'), array('action' => 'edit', $type['Type']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Type'), array('action' => 'delete', $type['Type']['id']), null, __('Are you sure you want to delete # %s?', $type['Type']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Uploads'); ?></h3>
	<?php if (!empty($type['Upload'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Filename'); ?></th>
		<th><?php echo __('Dir'); ?></th>
		<th><?php echo __('Mimetype'); ?></th>
		<th><?php echo __('Filesize'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Type Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($type['Upload'] as $upload): ?>
		<tr>
			<td><?php echo $upload['id']; ?></td>
			<td><?php echo $upload['filename']; ?></td>
			<td><?php echo $upload['dir']; ?></td>
			<td><?php echo $upload['mimetype']; ?></td>
			<td><?php echo $upload['filesize']; ?></td>
			<td><?php echo $upload['description']; ?></td>
			<td><?php echo $upload['type_id']; ?></td>
			<td><?php echo $upload['created']; ?></td>
			<td><?php echo $upload['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'uploads', 'action' => 'view', $upload['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'uploads', 'action' => 'edit', $upload['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'uploads', 'action' => 'delete', $upload['id']), null, __('Are you sure you want to delete # %s?', $upload['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
