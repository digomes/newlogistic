<div class="carriers form">
<?php echo $this->Form->create('Carrier'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Transportadora'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>

