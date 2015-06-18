<div class="row-fluid">
<?php echo $this->Form->create('Collection', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Coletas'); ?></legend>
                

                <?php echo $this->Form->input('CsvFile', array('type' => 'file', 'label' => 'Selecione a lista de Coletas', 'class' => 'span6')); ?>

	</fieldset>
<?php echo $this->Form->button('Cadastrar', array('class' => 'btn btn-inverse'));?>  
<?php echo $this->Form->end(); ?>


</div>