<div class="uploads form">
<?php echo $this->Form->create('Reverse', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Enviar arquivo para correção'); ?></legend>
	<?php   
                echo $this->Form->input('id');
		echo $this->Form->input('filename', array('type' => 'file', 'class' => 'span9', 'label' => 'Selecione o Arquivo'));
                echo $this->Form->input('type_id', array('class' => 'span9', 'label' => 'Tipo de Arquivo'));
		echo $this->Form->input('dir', array('type' => 'hidden', 'class' => 'span9'));
		echo $this->Form->input('mimetype', array('type' => 'hidden'));
		echo $this->Form->input('filesize', array('type' => 'hidden'));
		echo $this->Form->input('description', array('class' => 'span7', 'label' => 'Descrição'));
		//echo $this->Form->getLastInsertId();
		//echo $this->Form->input('Reverse.Reverse', array('type' => 'select'));
	?>
	</fieldset>
<?php echo $this->Html->tag('br'); ?>    
<?php echo $this->Form->button('Enviar Arquivo', array('class' => 'btn btn-inverse'));?>   
<?php echo $this->Form->end(); ?>
</div>

