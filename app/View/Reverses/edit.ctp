<div class="row">
    <?php echo $this->Form->create('Reverse', array('type' => 'file', 'class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><strong><h3><?php echo __('Nova Coleta Reversa'); ?></h3></strong></legend>
    <div class="span12">            
    <div class="span5">
        <?php echo $this->Form->input('user_id', array('type' => 'hidden'));?>
        <?php 
                $group = $this->Session->read('Auth.User.group_id');
                if($group == '1'){
                    echo $this->Form->input('status_id', array('class' => 'span5'));
                    echo $this->Form->input('cost_id', array('label' => 'Centro de Custo', 'empty' => 'Selecione um Centro de Custos', 'required', 'class' => 'span6'));
                }else{
                    echo $this->Form->input('status_id', array('value' => '1', 'type' => 'hidden', 'class' => 'span5'));
                    echo $this->Form->input('cost_id', array('label' => 'Centro de Custo', 'empty' => 'Selecione um Centro de Custos', 'required', 'class' => 'span6'));
                }
                
                
        ?>
        
    </div>   
    </div> 
    <div class="span12"><?php echo $this->Html->tag('hr'); ?></div>  
         <!--End Step 1-->       
    <div class="span12">
        <div class="span2">
            <?php echo $this->Form->input('invoice', array('label' => 'Numero Nota Fiscal', 'class' => 'input-medium')); ?>
        </div>
        <div class="span2">
            <?php echo $this->Form->input('serie', array('label' => 'Série', 'class' => 'input-medium')); ?>
        </div>
        <div class="span2">
            <?php echo $this->Form->input('quantity', array('label' => 'Volume', 'class' => 'input-medium')); ?>
        </div>
        <div class="span2">
            <?php echo $this->Form->input('amount', array('label' => 'Valor Nota Fiscal', 'class' => 'input-medium  '));?>
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
                echo $this->Form->input('Upload.0.type_id', array('empty' => 'Selecione o Tipo de Arquivo', 'label' => 'Tipo de Arquivo', 'class' => 'span6'));
                echo $this->Form->input('Upload.0.filename', array('type' => 'file', 'label' => 'Anexo', 'class' => 'span11'));
                echo $this->Form->input('Upload.0.description', array('type' => 'textarea', 'label' => 'Descrição do Anexo', 'rows' => '2', 'class' => 'span9'));
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
            <a href="#" id="add" class="btn btn-success">+ Arquivos</a>
        </div>
        <div class="span10"><?php echo $this->Html->tag('hr'); ?></div>   
        <div id="boxFields">
        </div>    
    </div>
    <div class="span12"><?php echo $this->Html->tag('hr'); ?></div>    
    <!--End Step 3--> 
    <div class="span12"><?php echo $this->element('cart'); ?></div>
    <div class="span12"><?php echo $this->Html->tag('hr'); ?></div>

        <?php echo $this->Form->button('Cadastrar Coleta', array('class' => 'btn btn-inverse'));?>    
<!--End Step 4--> 
	</fieldset>   
    <?php echo $this->Form->end(); ?>
</div>

