<div class="row">
    <?php echo $this->Form->create('Reverse', array('type' => 'file', 'class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Selecione o Centro de Custos'); ?></legend>
    <div class="span12">            
    <div class="span5">
        <?php 
                $group = $this->Session->read('Auth.User.group_id');
                if($group == '1'){
                    echo $this->Form->input('status_id', array('class' => 'span5'));
                }else{
                    echo $this->Form->input('status_id', array('value' => '1', 'type' => 'hidden', 'class' => 'span5'));
                }
                
                
        ?>
        <?php echo $this->Form->input('user_id', array('type' => 'hidden'));?>
    </div>
    <div class="span5"><?php echo $this->Form->input('cost_id', array('label' => 'Centro de Custo', 'empty' => 'Selecione um Centro de Custos', 'required', 'class' => 'span6')); ?></div>    
    </div>
    <?php echo $this->Form->end('Next step'); ?>           
</div>    
<div class="span12"><?php echo $this->element('progress'); ?></div>