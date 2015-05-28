<div class="costs index">
	<h2><?php echo __('Centros de Custos'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table" id="tableProducts">
        <thead>
	<tr>
			<th><?php echo $this->Paginator->sort('Id'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($costs as $cost): ?>
	<tr>
		<td><?php echo h($cost['Cost']['id']); ?>&nbsp;</td>
		<td><?php echo h($cost['Cost']['name']); ?>&nbsp;</td>
		<td><?php echo h($cost['Cost']['created']); ?>&nbsp;</td>
		<td class="actions">
                <div class="btn-group">
                    <a class="btn btn-primary" href="#"><i class="icon-home icon-white"></i> Ações</a>
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $cost['Cost']['id'])); ?></a></li>
                        <li><a href="#"><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $cost['Cost']['id'])); ?></li>
                        <li><a href="#"><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $cost['Cost']['id']), array(), __('Você tem certeza que deseja deletar a coleta de numero # %s?', $cost['Cost']['id'])); ?></a></li>
                   </ul>
                </div>
			
			
			
		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
	</table>

