<?php echo $this->Html->tag('hr'); ?>
<?php echo $this->Form->create('Reverse', array('class' => 'form')); ?>
<?php echo $this->Form->input('observation', array('class' => 'ckeditor', 'id' => 'observation', 'required', 'label' => 'Observação em caso de sinistro')); ?>
<?php echo $this->Html->tag('hr'); ?>
    <?php echo $this->Form->button('Enviar', array('class' => 'btn btn-inverse'));?>  
<?php echo $this->Form->end(); ?>