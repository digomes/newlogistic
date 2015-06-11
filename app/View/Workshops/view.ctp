<div class="row">
<div class="span12"><h2><?php echo __('Dados do Posto'); ?></h2></div>
<div class="span12">
	<div class="span2"><label>Id</label><input type="text" class="span2" value="<?php echo h($workshop['Workshop']['id']); ?>" disabled></div>
	<div class="span3"><label>Código</label><input type="text" class="span3" value="<?php echo h($workshop['Workshop']['code']); ?>" disabled></div>
	<div class="span3"><label>Consultor</label><input type="text" class="span3" value="<?php echo h($workshop['Workshop']['consultant']); ?>" disabled></div>
</div>
<div class="span12">
	<div class="span4"><label>CNPJ</label><input type="text" class="span4" value="<?php echo h($workshop['Workshop']['cnpj']); ?>" disabled></div>
	<div class="span4"><label>IE</label><input type="text" class="span4" value="<?php echo h($workshop['Workshop']['ie']); ?>" disabled></div>
</div>
<div class="span12">
	<div class="span12"><label>Razão Social</label><input type="text" class="span8" value="<?php echo h($workshop['Workshop']['name']); ?>" disabled></div>
</div>
<div class="span12">
	<div class="span5"><label>Endereço</label><input type="text" class="span5" value="<?php echo h($workshop['Workshop']['address']); ?>" disabled></div>
	<div class="span3"><label>Complemento</label><input type="text" class="span3" value="<?php echo h($workshop['Workshop']['complement']); ?>" disabled></div>
</div>
<div class="span12">
	<div class="span3"><label>Bairro</label><input type="text" class="span3" value="<?php echo h($workshop['Workshop']['district']); ?>" disabled></div>
	<div class="span2"><label>Cidade</label><input type="text" class="span2" value="<?php echo h($workshop['Workshop']['city']); ?>" disabled></div>
	<div class="span1"><label>UF</label><input type="text" class="span1" value="<?php echo h($workshop['Workshop']['uf']); ?>" disabled></div>
	<div class="span2"><label>CEP</label><input type="text" class="span2" value="<?php echo h($workshop['Workshop']['cep']); ?>" disabled></div>
</div>
<div class="span">
	<div class="span1"><label>DDD</label><input type="text" class="span1" value="<?php echo h($workshop['Workshop']['ddd']); ?>" disabled></div>
	<div class="span2"><label>Telefone</label><input type="text" class="span2" value="<?php echo h($workshop['Workshop']['phone']); ?>" disabled></div>
	<div class="span4"><label>E-mail</label><input type="text" class="span4" value="<?php echo h($workshop['Workshop']['email']); ?>" readonly></div>
	<div class="span1"><label>Skype</label><input type="text" class="span1" value="<?php echo h($workshop['Workshop']['skype']); ?>" disabled></div>
</div>
<div class="span">
	<div class="span3"><label>Gerente</label><input type="text" class="span3" value="<?php echo h($workshop['Workshop']['manager']); ?>" disabled></div>
	<div class="span2"><label>Status</label><input type="text" class="span2" value="<?php echo ($workshop['Workshop']['active'] = 1) ? "Ativo" : "Inativo"; ?>" disabled></div>
	<div class="span3"><label>Transportadora</label><input type="text" class="span3" value="<?php echo h($workshop['Carrier']['name']); ?>" disabled></div>
</div>

<hr>
</div>
<div class="row">
	<h3><?php echo __('Usuários do Posto'); ?></h3>
	<?php if (!empty($workshop['User'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table" id="tableProducts">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($workshop['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td class="actions">
			                <div class="btn-group">
                                <a class="btn btn-primary" href="#"><i class="icon-home icon-white"></i> Ações</a>
                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><?php echo $this->Html->link(__('Visualizar'), array('controller' => 'users' ,'action' => 'view', $user['id'])); ?></a></li>
                                    <li><a href="#"><?php echo $this->Html->link(__('Editar'), array('controller' => 'users' ,'action' => 'edit', $user['id'])); ?></li>
                                    <li><a href="#"><?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'users' ,'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?></a></li>
                               </ul>
                            </div>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>


</div>
