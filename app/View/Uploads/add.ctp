<div class="uploads form">
<?php echo $this->Form->create('Upload', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Enviar arquivo para correção'); ?></legend>
	<?php   
                //echo $this->Form->input('reverse_id', array('type' => 'select', 'label' => 'Selecione a Coleta que está enviando a Correção'));
                //echo $this->Form->input('Reverse.status_id', array('value' => '11', 'type' => 'text'));
		echo $this->Form->input('filename', array('type' => 'file', 'class' => 'span9', 'label' => 'Selecione o Arquivo', 'required'));
                echo $this->Form->input('type_id', array('class' => 'span9', 'label' => 'Tipo de Arquivo'));
		echo $this->Form->input('dir', array('type' => 'hidden', 'class' => 'span9'));
		echo $this->Form->input('mimetype', array('type' => 'hidden'));
		echo $this->Form->input('filesize', array('type' => 'hidden'));
		echo $this->Form->input('description', array('class' => 'span7', 'label' => 'Descrição', 'required'));
		//echo $this->Form->getLastInsertId();
		
	?>
	</fieldset>
<?php echo $this->Html->tag('br'); ?>    
<?php echo $this->Form->button('Enviar Arquivo', array('class' => 'btn btn-inverse'));?>   
<?php echo $this->Form->end(); ?>
</div>

