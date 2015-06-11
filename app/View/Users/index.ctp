<div class="users index">
    <div class="span12">
            <?php echo $this->Html->link(__('Novo Usuário'), array('action' => 'add'), array('class' => 'btn btn-large btn-success')); ?>
        <div class="span12"><?php echo $this->Html->tag('br'); ?></div>
    </div>
    
	<h2><?php echo __('Usuários'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table" id="tableProducts">
        <thead>    
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('username', 'Usuário'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id', 'Grupo'); ?></th>
			<th><?php echo $this->Paginator->sort('workshop_id', 'Cód. Posto'); ?></th>
			<th><?php echo $this->Paginator->sort('email', 'E-mail'); ?></th>
			<th><?php echo $this->Paginator->sort('active', 'Ativo'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($user['User']['username'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Workshop']['code'], array('controller' => 'workshops', 'action' => 'view', $user['Workshop']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo ($user['User']['active'] = 1) ? "Ativo" : "Inativo"; ?></td>
		<td class="actions">
                <div class="btn-group">
                    <a class="btn btn-primary" href="#"><i class="icon-home icon-white"></i> Ações</a>
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $user['User']['id'])); ?></a></li>
                        <li><a href="#"><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?></li>
                        <li><a href="#"><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?></a></li>
                   </ul>
                </div>
			
			
			
		</td>
	</tr>
<?php endforeach; ?>
        <tbody>
	</table>
</div>

