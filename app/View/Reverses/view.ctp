
<div class="portlet grey box">
                <div class="portlet-title">
                    <?php 
                    //$grupo = $this->Session->read('Auth.User.group_id'); 
                   // if($reverse['Status']['id'] == '10' || $reverse['Status']['id'] == '12'){}else
                        
                     if($this->Session->read('Auth.User.group_id') == '2'){
                    ?>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Opções <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link(__('Aprovar'), array('action' => 'approve', $reverse['Reverse']['id'])); ?></li>
                                <li><?php echo $this->Html->link(__('Solicitar Correçao'), array('action' => 'correct', $reverse['Reverse']['id'])); ?></li>
                                <li class="divider"></li>
                                <li><?php echo $this->Html->link(__('Reprovar'), array('action' => 'disapprove', $reverse['Reverse']['id'])); ?></li>
                                <li><?php echo $this->Html->link(__('Cancelar Reprovação'), array('action' => 'cancel', $reverse['Reverse']['id'])); ?></li>
                            </ul>
                    </div>
                    <?php }else if($this->Session->read('Auth.User.group_id') == '4' AND $reverse['Status']['id'] == '10'){ ?>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Opções <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link(__('Agendar Coleta'), array('action' => 'inProgress', $reverse['Reverse']['id'])); ?></li>
                            </ul>
                    </div>
                    <?php }else if($this->Session->read('Auth.User.group_id') == '4' AND $reverse['Status']['id'] == '3'){ ?>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Opções <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link(__('Inserir data da Coleta'), array('action' => 'heldCollection', $reverse['Reverse']['id'])); ?></li>
                            </ul>
                    </div>
                    <?php }else if($this->Session->read('Auth.User.group_id') == '4' AND $reverse['Status']['id'] == '4'){ ?>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Opções <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link(__('Entrega na transportadora'), array('action' => 'inCarrier', $reverse['Reverse']['id'])); ?></li>
                            </ul>
                    </div>
                    <?php }else if($this->Session->read('Auth.User.group_id') == '4' AND $reverse['Status']['id'] == '15'){ ?>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Opções <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link(__('Entrega na Envision'), array('action' => 'inEnvision', $reverse['Reverse']['id'])); ?></li>
                            </ul>
                    </div>
                    <?php } ?>
                    <div class="caption"><i class="icon-comments"></i><h4>Informações da Coleta</h4> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-hover table-condensed">
                        <tbody>
                        <tr>
                            <td>Numero da Coleta: #<?php echo h($reverse['Reverse']['id']); ?></td>
                            <td>Usuário: <?php echo h($reverse['User']['name']); ?></td>
                            <td><?php echo ($reverse['Reverse']['so'] == '')? '' : "Numero da SO: ". $reverse['Reverse']['so']; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Numero NF: <?php echo h($reverse['Reverse']['invoice']); ?></td>
                            <td>Série: <?php echo h($reverse['Reverse']['serie']); ?></td>
                            <td>Volume: <?php echo h($reverse['Reverse']['quantity']); ?></td>
                            <td>Valor NF: <?php echo h($reverse['Reverse']['amount']); ?></td>
                            
                        </tr>
                        <tr>
                            <td>Estado: <span class="label label-info"> <?php echo $reverse['Status']['name']; ?></span></td>
                            <td>Centro de Custo: <?php echo $reverse['Cost']['name']; ?></td>
                            <td>Transportadora: <?php echo $reverse['Carrier']['name']; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Data Criação: <?php echo $this->Time->format('d/m/Y H:i:s', $reverse['Reverse']['created']
); ?></td>
                            <td>Última resposta: <?php echo $this->Time->format('d/m/Y H:i:s', $reverse['Reverse']['modified']
); ?></td>
                            <td><?php if($reverse['Reverse']['inprogress'] == '0000-00-00 00:00:00'){ echo ""; ?><?php }else{ 
                                echo "Coleta agendada: ".$this->Time->format('d/m/Y', $reverse['Reverse']['inprogress']
); } ?>
                                </td>
                            <td><?php if($reverse['Reverse']['heldcollection'] == '0000-00-00 00:00:00'){ echo ""; ?><?php }else{ 
                                echo "Coleta realizada: ".$this->Time->format('d/m/Y', $reverse['Reverse']['heldcollection']
); } ?></td>
                        </tr>
                        <tr>
                            <td><?php if($reverse['Reverse']['incarrier'] == '0000-00-00 00:00:00'){ echo ""; ?><?php }else{ 
                                echo "Previsão entrega na Envision: ".$this->Time->format('d/m/Y', $reverse['Reverse']['incarrier']
); } ?></td>

                            <td><?php if($reverse['Reverse']['inenvision'] == '0000-00-00 00:00:00'){ echo ""; ?><?php }else{ 
                                echo "Enregue na Envision: ".$this->Time->format('d/m/Y', $reverse['Reverse']['inenvision']
); } ?></td>

                            <td><?php if($reverse['Reverse']['cte'] == ''){ echo ""; ?><?php }else{ 
                                echo "Numero CTE: ".$reverse['Reverse']['cte']
; } ?></td>
                            <td></td>
                        </tr>
                            <?php foreach ($reverse['Upload'] as $upload): ?> 
                        <tr>
                            <td><i class="icon-download-alt"></i> <?php if($upload['type_id'] == '1'){ echo "Declaração"; }else if($upload['type_id'] == '2'){ echo "Nota Fiscal"; }else if($upload['type_id'] == '3'){echo "Carta de Correção"; } ?></td>
                            <td><?php echo $upload['filename']; ?></td>
                            <td><?php echo $this->Html->link(__('Baixar'), array('controller' => 'uploads' ,'action' => 'baixar', $upload['id']), array('class' => 'btn btn-small', 'data-loading-text' => 'Baixando ...')); ?></td>
                           <td></td>
                        </tr>
                         <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
<?php echo $this->Html->tag('hr'); ?>
<div class="related">
	<h3><?php echo __('Produtos relacionados para coleta'); ?></h3>
	<?php if (!empty($reverse['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table">
        <thead>    
	<tr>
		<th><?php echo __('Modelo'); ?></th>
		<th><?php echo __('Descrição'); ?></th>
		<th><?php echo __('Precisa de Embalagem'); ?></th>
        <th><?php echo __('Etiqueta'); ?></th>
        <th><?php echo __('Nota Fiscal de Origem'); ?></th>
	</tr>
            </thead>
            <tbody>
	<?php foreach ($reverse['Product'] as $product): ?>
		<tr>
                        <td><?php echo $product['material']; ?></td>
			            <td><?php echo $product['description']; ?></td>
                        <td><?php echo ($product['ReversesProduct']['embalagem'] == '1') ? 'Sim' : 'Não'; ?></td>
                        <td><?php echo ($product['ReversesProduct']['etiqueta'] == '1') ? 'Sim' : 'Não'; ?></td>
                        <td><?php echo $product['ReversesProduct']['invoice']; ?></td>
		</tr>
	<?php endforeach; ?>
            </tbody>    
	</table>
<?php endif; ?>
</div>
<?php echo $this->Html->tag('hr'); ?>
<div class="media">
<h3><?php echo __('Observações'); ?></h3>
<?php if (!empty($reverse['Reverse']['observation'])): ?>
<?php echo $this->Html->tag('hr'); ?>
              <a class="pull-left" href="#">
                <img alt="gravatar" title="avatar" class="avatar" src="http://www.gravatar.com/avatar/8d9528f495275e1e2b3d64aa093c62a1?s=45&amp;d=mm&amp;r=g">
              </a>
              <div class="media-body">
                  <span class="datetime pull-right"> <i class="icon-calendar"></i> <?php echo h($reverse['Reverse']['dateobs']); ?></span>
                <h4 class="media-heading"></h4>
                <?php echo $reverse['Reverse']['observation']; ?>
              </div>

<?php endif; ?>
</div>
<?php echo $this->Html->tag('br'); ?>