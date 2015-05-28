<div class="row">
    <?php echo $this->Form->create('Reverse', array('type' => 'file', 'class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Preencha os dados da Nota Fiscal'); ?></legend>
    <div class="span12">
        <div class="span12"><?php echo $this->element('cart'); ?></div>   
    </div>
  <?php 
 echo $this->Html->link('Previous step',
    array('action' => 'msf_step', $params['currentStep'] -1),
    array('class' => 'btn btn-success')
);
echo $this->Form->end('Next step');
 ?>                 
</div>   
<div class="span12"><?php echo $this->element('progress'); ?></div>