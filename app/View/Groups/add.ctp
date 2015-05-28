<div class="row-fluid">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Grupo'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Digite o nome do Grupo'));
	?>
	</fieldset>
<?php echo $this->Form->button('Cadastrar', array('class' => 'btn btn-inverse'));?>      
<?php echo $this->Form->end(); ?>
</div>

