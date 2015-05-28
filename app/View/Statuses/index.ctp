<div class="row">
    <div class="span12">
            <?php echo $this->Html->link(__('Novo Status'), array('action' => 'add'), array('class' => 'btn btn-large btn-success')); ?>
        <div class="span12"><?php echo $this->Html->tag('br'); ?></div>
    </div>
	<h2><?php echo __('Status'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table" id="tableProducts">
        <thead>    
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('visibility_groups', 'Grupos que Visualizam'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($statuses as $status): ?>
	<tr>
		<td><?php echo h($status['Status']['id']); ?>&nbsp;</td>
		<td><?php echo h($status['Status']['name']); ?>&nbsp;</td>
		<td><?php echo h($status['Status']['visibility_groups']); ?>&nbsp;</td>
		<td class="actions">
                <div class="btn-group">
                    <a class="btn btn-primary" href="#"><i class="icon-home icon-white"></i> Ações</a>
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $status['Status']['id'])); ?></li>
                        <li><a href="#"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $status['Status']['id']), array(), __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?></a></li>
                   </ul>
                </div>
			
			
			
		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
        </table>
        <div class="span12"><?php echo $this->Html->tag('br'); ?></div>
</div>
        