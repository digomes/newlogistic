<div class="row">
<?php echo $this->Form->create('Workshop'); ?>
<div class="span12"><h2><?php echo __('Edição de Posto'); ?></h2></div>
<div class="span12">
	<div class="span3"><?php echo $this->Form->input('code', array('label' => 'Código', 'class' => 'span3')); ?></div>
	<div class="span3"><?php echo $this->Form->input('consultant', array('label' => 'Consultor', 'class' => 'span3')); ?></div>
	<div class="span3"><?php echo $this->Form->input('id'); ?></div>
</div>
<div class="span12">
	<div class="span4"><?php echo $this->Form->input('cnpj', array('label' => 'CNPJ', 'class' => 'span4')); ?></div>
	<div class="span4"><?php echo $this->Form->input('ie', array('label' => 'IE', 'class' => 'span4')); ?></div>
</div>
<div class="span12">
	<div class="span12"><?php echo $this->Form->input('name', array('label' => 'Razão Social', 'class' => 'span8')); ?></div>
</div>
<div class="span12">
	<div class="span5"><?php echo $this->Form->input('address', array('label' => 'Endereço', 'class' => 'span5')); ?></div>
	<div class="span3"><?php echo $this->Form->input('complement', array('label' => 'Complemento', 'class' => 'span3')); ?></div>
</div>
<div class="span12">
	<div class="span3"><?php echo $this->Form->input('district', array('label' => 'Bairro', 'class' => 'span3'));?></div>
	<div class="span2"><?php echo $this->Form->input('city', array('label' => 'Cidade', 'class' => 'span2'));?></div>
	<div class="span1"><?php echo $this->Form->input('uf', array('label' => 'UF', 'class' => 'span1'));?></div>
	<div class="span2"><?php echo $this->Form->input('cep', array('label' => 'CEP', 'class' => 'span2'));?></div>
</div>
<div class="span12">
	<div class="span1"><?php echo $this->Form->input('ddd', array('label' => 'DDD', 'class' => 'span1'));?></div>
	<div class="span2"><?php echo $this->Form->input('phone', array('label' => 'Telefone', 'class' => 'span2'));?></div>
	<div class="span4"><?php echo $this->Form->input('email', array('label' => 'E-mail', 'class' => 'span4'));?></div>
	<div class="span1"><?php echo $this->Form->input('manager', array('label' => 'Gerente', 'class' => 'span1'));?></div>
</div>
<div class="span12">
	<div class="span3"><?php echo $this->Form->input('skype', array('label' => 'Skype', 'class' => 'span3'));?></div>
	<div class="span2"><?php echo $this->Form->input('carrier_id', array('label' => 'Transportadora', 'class' => 'span2'));?></div>
	<div class="span3"><?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Ativo', 'class' => 'span3'));?></div>
</div>
<div class="span12">
<div class="span5"><?php echo $this->Form->button('Atualizar', array('class' => 'btn btn-inverse'));?></div>
<?php echo $this->Form->end(__('')); ?>
</div>
<div class="span12"></div>
</div>
