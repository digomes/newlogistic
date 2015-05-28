<div class="row">
    <div class="span12">
            <?php echo $this->Html->link(__('Novo Posto'), array('action' => 'add'), array('class' => 'btn btn-large btn-success')); ?>
        <div class="span12"><?php echo $this->Html->tag('br'); ?></div>
    </div>
	<h2><?php echo __('Postos'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table" id="tableProducts">
        <thead>    
	<tr>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('sapcode'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
        </thead>
        </tbody>
	<?php
	foreach ($workshops as $workshop): ?>
	<tr>
		<td><?php echo h($workshop['Workshop']['code']); ?>&nbsp;</td>
		<td><?php echo h($workshop['Workshop']['sapcode']); ?>&nbsp;</td>
		<td><?php echo h($workshop['Workshop']['name']); ?>&nbsp;</td>

		<td class="actions">
                <div class="btn-group">
                    <a class="btn btn-primary" href="#"><i class="icon-home icon-white"></i> Ações</a>
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $workshop['Workshop']['id'])); ?></a></li>
                        <li><a href="#"><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $workshop['Workshop']['id'])); ?></li>
                        <li><a href="#"><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $workshop['Workshop']['id']), null, __('Are you sure you want to delete # %s?', $workshop['Workshop']['id'])); ?></a></li>
                   </ul>	
		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
	</table>

</div>

