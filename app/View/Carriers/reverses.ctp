<div class="row-fluid">
   <div class="span12">
    <div class="span12">
            <?php echo $this->Html->link(__('Nova Coleta Reversa'), array('action' => 'add'), array('class' => 'btn btn-large btn-success')); ?>
        <div class="span12"><?php echo $this->Html->tag('br'); ?></div>
    </div>
    
	<h2><?php echo __('Coletas Reversas'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table" id="tableFilter">
        <thead>    
	<tr>
			<th><?php echo $this->Paginator->sort('id', 'Numero'); ?></th>
			<th><?php echo $this->Paginator->sort('invoice', 'NF'); ?></th>
			<th><?php echo $this->Paginator->sort('serie', 'Série'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity', 'Volume'); ?></th>
			<th><?php echo $this->Paginator->sort('amount', 'Valor'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Usuário'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cost_id', 'Centro de Custo'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Data'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($reverses as $reverse): ?>
	<tr>
		<td><?php echo $this->Html->link($reverse['Reverse']['id'], array('action' => 'view', $reverse['Reverse']['id'])); ?>&nbsp;</td>
		<td><?php echo h($reverse['Reverse']['invoice']); ?>&nbsp;</td>
		<td><?php echo h($reverse['Reverse']['serie']); ?>&nbsp;</td>
		<td><?php echo h($reverse['Reverse']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($reverse['Reverse']['amount']); ?>&nbsp;</td>
		<td><?php echo h($reverse['User']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reverse['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $reverse['Status']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reverse['Cost']['name'], array('controller' => 'costs', 'action' => 'view', $reverse['Cost']['id'])); ?>
		</td>
		<td><?php echo h($reverse['Reverse']['created']); ?>&nbsp;</td>
		<td class="actions">
                <div class="btn-group">
                    <a class="btn btn-primary" href="#"><i class="icon-home icon-white"></i> Ações</a>
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $reverse['Reverse']['id'])); ?></a></li>
                        <?php if($reverse['Status']['id'] == '10' || $reverse['Status']['id'] == '11'){
                            
                        }else if($reverse['Status']['id'] == '12'){
                        ?>
                        <li><a href="#"><?php
                        
                                            $grupo = $this->Session->read('Auth.User.group_id');    
                                            $linkEdit = $this->Html->link(__('Enviar Correção'), array('controller' => 'uploads' ,'action' => 'add', $reverse['Reverse']['id']));
                                            echo ($grupo == '3' || $grupo == '1') ? $linkEdit : '';
                                            
                                        ?></a></li>
                        <li><a href="#"><?php 
                                            
                                            $linkDel = $this->Form->postLink('Deletar', array('action' => 'delete', $reverse['Reverse']['id']), array(), __('Are you sure you want to delete # %s?', $reverse['Reverse']['id'])); 
                                            echo ($grupo == '1') ? $linkDel : '';
                                            
                                            ?></a></li>
                        <?php } ?>
                   </ul>
                </div>
                    
		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
	</table>

</div>
</div>
