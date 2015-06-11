<script type="text/javascript">
alteraDiv = function (){
    if($('#UserGroupId').val() == 4){
        $("#UserCarrierId").show();
        $("#UserCarrierId").prop('required',true);
    }

    if($('#UserGroupId').val() != 4){
        $("#UserCarrierId").hide();
        $("#UserCarrierId").prop('required',false);
    }
}
</script>
<div class="row-fluid">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Editar Usuário'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('class' => 'span4', 'label' => 'Nome'));
		echo $this->Form->input('username', array('class' => 'span4 uneditable-input', 'label' => 'Usuário', 'disabled'));
		echo $this->Form->input('password', array('class' => 'span4', 'value' => '', 'placeholder' => 'digite uma senha caso queira mudar', 'label' => 'Senha'));

	?>
	<?php
	if($this->Session->read('Auth.User.group_id') == '1'){	
		echo $this->Form->input('group_id', array('class' => 'span4', 'label' => 'Grupo', 'onchange' => 'alteraDiv()'));
		echo $this->Form->input('carrier_id', array('class' => 'span4', 'label' => 'Transportadora', 'style' => 'display:none;', 'empty' => 'Selecione uma Transportadora'));
	}else{
		echo $this->Form->input('group_id', array('class' => 'span4 uneditable-input', 'label' => 'Grupo', 'disabled'));
	}

	?>
	<?php	
		echo $this->Form->input('workshop_id', array('class' => 'span4 uneditable-input', 'label' => 'Posto', 'disabled'));
		echo $this->Form->input('email', array('class' => 'span4', 'label' => 'Email', 'type' => 'email'));
		echo $this->Form->input('active', array('label' => 'Ativo'));
	?>
	</fieldset>
<?php echo $this->Form->button('Atualizar', array('class' => 'btn btn-inverse'));?>  
<?php echo $this->Form->end(); ?>
</div>

