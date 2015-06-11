<div class="row">
<?php echo $this->Form->create('Product', array('class' => 'form')); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Produtos'); ?></legend>
            <div class="span12">
                <div class="span3"><?php echo $this->Form->input('material', array('class' => 'span3', 'label' => 'Código')); ?></div>
                <div class="span6"><?php echo $this->Form->input('description', array('class' => 'span6', 'label' => 'Descrição')); ?></div>
                <div class="span3"><?php echo $this->Form->input('type', array('class' => 'span3', 'label' => 'Tipo de Material')); ?></div>
                <div class="span3"><?php echo $this->Form->input('manufacturer', array('class' => 'span3', 'label' => 'Fabricante')); ?></div>
                <div class="span3"><?php echo $this->Form->input('category', array('class' => 'span3', 'label' => 'Categoria')); ?></div>
                <div class="span3"><?php echo $this->Form->input('id'); ?></div>
            </div>                  
	</fieldset>
<?php echo $this->Form->button('Atualizar', array('class' => 'btn btn-inverse'));?>  
<?php echo $this->Form->end(); ?>
</div>

