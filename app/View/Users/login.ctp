<?php
echo $this->Form->create('User', array('url' => array('controller' => 'users','action' => 'login'), 'class' => 'form-signin'));
?>
<legend><h2 class="form-signin-heading">Efetuar Login</h2></legend>
<?php
echo $this->Form->input('User.username', array('class' => 'input-block-level', 'placeholder' => 'Usuário', 'label' => ''));
echo $this->Form->input('User.password', array('class' => 'input-block-level', 'placeholder' => 'Senha' , 'label' => ''));
echo $this->Form->button('Efetuar Login', array('class' => 'btn btn-large btn-primary'));
echo $this->Form->end();
?>
