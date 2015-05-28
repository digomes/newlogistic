<div class="row-fluid">
<?php echo $this->Form->create('Cost'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Centro de Custos'); ?></legend>
	<?php
                echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'span5'));
                echo $this->Form->input('Group.Group', array('class' => 'span5', 'type' => 'select', 'multiple' => 'checkbox', 'label' => 'Selecio os grupos que poderão visualizar'));
	?>
                
	</fieldset>
<?php echo $this->Form->button('Cadastrar', array('class' => 'btn btn-inverse'));?>     
<?php echo $this->Form->end(); ?>
</div>
