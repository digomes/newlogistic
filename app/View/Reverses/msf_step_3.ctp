<div class="row">
    <?php echo $this->Form->create('Reverse', array('type' => 'file', 'class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Envio de Arquivos'); ?></legend>
      <div class="span12"><h3>Envio da Nota Fiscal / Declaração</h3></div>          
    <div class="span12">
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
  
        <br><br>
        <div class="span7"> </div>
        <div class="span7">
            <a href="#" id="add" class="btn btn-success">+ Arquivos</a>
            <br /><br />
        </div>
        <div class="span12"></div>
        <div id="boxFields">
        </div>    
    </div>
 <?php 
 echo $this->Html->link('Previous step',
    array('action' => 'msf_step', $params['currentStep'] -1),
    array('class' => 'btn btn-success')
);
echo $this->Form->end('Next step');
 ?>  
</div>   
      <div class="span12"><?php echo $this->element('progress'); ?></div>