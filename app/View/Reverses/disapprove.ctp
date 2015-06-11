<?php echo $this->Html->tag('hr'); ?>
<?php echo $this->Form->create('Reverse', array('class' => 'form')); ?>
<?php echo $this->Form->input('observation', array('class' => 'ckeditor', 'id' => 'observation', 'required', 'label' => 'Observação em Caso de Reprova ou Correção')); ?>
<?php echo $this->Html->tag('hr'); ?>
    <?php echo $this->Form->button('Reprovar', array('class' => 'btn btn-inverse'));?>  
<?php echo $this->Form->end(); ?>