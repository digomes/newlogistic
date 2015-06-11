<?php echo $this->Html->tag('hr'); ?>
<?php echo $this->Form->create('Reverse', array('class' => 'form')); ?>
<?php echo $this->Form->input('observation', array('class' => 'ckeditor', 'id' => 'observation', 'required', 'label' => 'Por favor digite o motivo pelo qual quer cancelar a reprovação da coleta')); ?>
<?php echo $this->Html->tag('hr'); ?>
    <?php echo $this->Form->button('Enviar', array('class' => 'btn btn-inverse'));?>  
<?php echo $this->Form->end(); ?>