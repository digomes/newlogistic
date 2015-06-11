<div class="row-fluid">
    <div class="span12">
            <?php echo $this->Html->link(__('Novo Produto'), array('action' => 'add'), array('class' => 'btn btn-large btn-success')); ?>
        <div class="span12"><?php echo $this->Html->tag('br'); ?></div>
    </div>
	<h2><?php echo __('Lista de Produtos'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table" id="tableProducts">
        <thead>    
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('material', 'Codigo'); ?></th>
                        <th><?php echo $this->Paginator->sort('description', 'Descrição da Peça'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['material']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['description']); ?>&nbsp;</td>
		<td class="actions">
                <div class="btn-group">
                    <a class="btn btn-primary" href="#"><i class="icon-home icon-white"></i> Ações</a>
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $product['Product']['id'])); ?></a></li>
                        <li><a href="#"><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $product['Product']['id'])); ?></li>
                        <li><a href="#"><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $product['Product']['id']), array(), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?></a></li>
                   </ul>
                </div>
			
			
			
		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
	</table>
</div>

