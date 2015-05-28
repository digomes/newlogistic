<div class="statuses form">
<?php echo $this->Form->create('Status'); ?>
	<fieldset>
		<legend><?php echo __('Editar Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->input('name', array('label' => 'Nome'));
		echo $this->Form->input('Group.Group', array('type' => 'select', 'multiple' => 'checkbox', 'label' => 'Selecione o Grupo que vai visualizar esse status'));
	?>
	</fieldset>
<?php echo $this->Form->button('Atualizar', array('class' => 'btn btn-inverse'));?> 
<?php echo $this->Form->end(); ?>
</div>

