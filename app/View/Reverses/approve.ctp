<?php echo $this->Html->tag('hr'); ?>
<?php echo $this->Form->create('Reverse', array('class' => 'form')); ?>
<?php echo $this->Form->input('so', array('class' => 'span7', 'required', 'label' => 'Digite o numero da SO')); ?>
<?php echo $this->Html->tag('hr'); ?>
    <?php echo $this->Form->button('Aprovar', array('class' => 'btn btn-inverse'));?>  
<?php echo $this->Form->end(); ?>