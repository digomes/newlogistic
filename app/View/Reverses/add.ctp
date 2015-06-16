<div class="row">
    <?php echo $this->Form->create('Reverse', array('type' => 'file', 'class' => 'form-horizontal', 'onsubmit' => 'return validaForm(this)')); ?>
	<fieldset>
		<legend><strong><h3><?php echo __('Nova Coleta Reversa'); ?></h3></strong></legend>
    <div class="span12">            
    <div class="span5">
        <?php echo $this->Form->input('user_id', array('type' => 'hidden'));?>
        <?php 
                $group = $this->Session->read('Auth.User.group_id');
                if($group == '1'){
                    echo $this->Form->input('status_id', array('class' => 'span5'));
                    echo $this->Form->input('cost_id', array('label' => 'Centro de Custo', 'required', 'class' => 'span6'));
                }else{
                    echo $this->Form->input('status_id', array('value' => '1', 'type' => 'hidden', 'class' => 'span5'));
                    echo $this->Form->input('cost_id', array('label' => 'Centro de Custo', 'required', 'class' => 'span6'));
                }
                
                
        ?>
        
    </div>   
    </div>
    <div class="span12"><?php echo $this->Html->tag('hr'); ?></div>            
    <div class="span12"><?php echo $this->element('cart'); ?></div>
    <div class="span12"><?php echo $this->Html->tag('hr'); ?></div>
         <!--End Step 1-->       
    <div class="span12">
        <div class="span2">
            <?php echo $this->Form->input('invoice', array('label' => 'Numero Nota Fiscal', 'class' => 'input-medium', 'required')); ?>
        </div>
        <div class="span2">
            <?php echo $this->Form->input('serie', array('label' => 'Série', 'class' => 'input-medium', 'required')); ?>
        </div>
        <div class="span2">
            <?php echo $this->Form->input('quantity', array('type' => 'text', 'label' => 'Volume', 'class' => 'input-medium', 'required')); ?>
        </div>
        <div class="input-prepend">
            <label for="ReverseQuantity">Valor da NF</label>
            <?php echo $this->Html->tag('span', 'R$', array('class' => 'add-on')); ?>
            <?php echo $this->Form->input('amount', array('div' => false, 'label' => false, 'class' => 'input-medium', 'required'));?>
        </div>    
    </div>
         <div class="span12"><?php echo $this->Html->tag('hr'); ?></div>
     <!--End Step 2-->     
      <div class="span12"><h3>Upload de Arquivos</h3></div>          
    
        <div class="span11">
            <div class="items" id="item_0">
                <div class="span12">
                    <div class="span11">
        <?php 
                echo $this->Form->input('Upload.0.type_id', array('empty' => 'Selecione o Tipo de Arquivo', 'label' => 'Tipo de Arquivo', 'class' => 'span6', 'required'));
                echo $this->Form->input('Upload.0.filename', array('type' => 'file', 'label' => 'Anexo', 'class' => 'span11', 'required'));
                //echo $this->Form->input('reverse', array('type' => 'number', 'label' => 'NOTA DE ORIGEM', 'class' => 'span9', 'required'));
                echo $this->Form->input('Upload.0.model', array('type' => 'hidden'));
                echo $this->Form->input('Upload.0.dir', array('type' => 'hidden'));
                echo $this->Form->input('Upload.0.mimetype', array('type' => 'hidden'));
                echo $this->Form->input('Upload.0.filesize', array('type' => 'hidden'));
                
        ?>
                    </div>
                </div>
            </div>
          <div class="span10"><?php echo $this->Html->tag('hr'); ?></div> 
        <div class="span12">
            <!--<a href="#" id="add" class="btn btn-success">+ Arquivos</a>-->
        </div>
        <div class="span10"><?php echo $this->Html->tag('hr'); ?></div>   
        <div id="boxFields">
        </div>    
    </div>
    <div class="span12"><?php echo $this->Html->tag('hr'); ?></div>    
    <!--End Step 3--> 


        <?php echo $this->Form->button('Cadastrar Coleta', array('class' => 'btn btn-inverse'));?>    
<!--End Step 4--> 
	</fieldset>   
    <?php echo $this->Form->end(); ?>
</div>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Erro no Formulário</h4>
      </div>
      <div class="modal-body">
        <p>Você não preencheu corretamente o campo "<b>Numero NF Envision</b>", por favor preencha corretamente e tente novamente. </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
