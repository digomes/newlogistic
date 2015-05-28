<div class="row">
    <?php echo $this->Form->create('Reverse', array('type' => 'file', 'class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Preencha os dados da Nota Fiscal'); ?></legend>
    <div class="span12">
        <div class="span2">
            <?php echo $this->Form->input('invoice', array('label' => 'Numero Nota Fiscal', 'class' => 'input-medium')); ?>
        </div>
        <div class="span2">
            <?php echo $this->Form->input('serie', array('label' => 'Série', 'class' => 'input-medium')); ?>
        </div>
        <div class="span2">
            <?php echo $this->Form->input('quantity', array('label' => 'Volume', 'class' => 'input-medium')); ?>
        </div>
        <div class="span2">
            <?php echo $this->Form->input('amount', array('label' => 'Valor Nota Fiscal', 'class' => 'input-medium  '));?>
        </div>    
    </div>
 <?php 
 echo $this->Html->link('Previous step',
    array('action' => 'msf_step', $params['currentStep'] -1),
    array('class' => 'btn')
);
echo $this->Form->end('Next step');
 ?>               
</div>
<div class="span12"><?php echo $this->element('progress'); ?></div>