<div class="collections index">
	<h2><?php echo __('Coletas'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('workshop', 'Posto'); ?></th>
			<th><?php echo $this->Paginator->sort('invoice', 'Nota Fiscal'); ?></th>
			<th><?php echo $this->Paginator->sort('material', 'Código'); ?></th>
			<th><?php echo $this->Paginator->sort('description', 'Descrição'); ?></th>
			<th><?php echo $this->Paginator->sort('type', 'Tipo'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($collections as $collection): ?>
	<tr>
		<td><?php echo h($collection['Collection']['id']); ?>&nbsp;</td>
		<td><?php echo h($collection['Collection']['workshop']); ?></td>
		<td><?php echo h($collection['Collection']['invoice']); ?>&nbsp;</td>
		<td><?php echo h($collection['Collection']['material']); ?>&nbsp;</td>
		<td><?php echo h($collection['Collection']['description']); ?>&nbsp;</td>
		<td><?php echo h($collection['Collection']['type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $collection['Collection']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $collection['Collection']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $collection['Collection']['id']), array(), __('Are you sure you want to delete # %s?', $collection['Collection']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>


<?php echo $this->element('pag'); ?>

</div>
