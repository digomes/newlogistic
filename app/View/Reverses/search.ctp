   <script type="text/javascript">
   $(function() {
       $( "#ReverseFrom" ).datepicker({
           defaultDate: "+1w",
           changeMonth: true,
           numberOfMonths: 2,
           showWeek: true,
           firstDay: 1,
           dateFormat: "yy-mm-dd 00:00",
           onClose: function( selectedDate ) {
               $( "#ReversesTo" ).datepicker( "option", "minDate", selectedDate );
           }
       });
       $( "#ReverseTo" ).datepicker({
           defaultDate: "+1w",
           changeMonth: true,
           numberOfMonths: 2,
           showWeek: true,
           firstDay: 1,
           dateFormat: "yy-mm-dd 00:00",
           onClose: function( selectedDate ) {
               $( "#ReverseFrom" ).datepicker( "option", "maxDate", selectedDate );
           }
       });
   });
</script>
<div class="row-fluid">
   <div class="span12">
    <div class="span12">
            <?php echo $this->Html->link(__('Nova Coleta Reversa'), array('action' => 'add'), array('class' => 'btn btn-large btn-success')); ?>
        <div class="span12"><?php echo $this->Html->tag('br'); ?></div>
    </div>
    <?php echo $this->Html->tag('h4', 'Ir para coleta'); ?> 
   <?php echo $this->Form->create('Reverse', array('action' => 'search', 'class' => 'form-horizontal')); ?>    
    <div class="input-prepend">
        <?php
       echo $this->Html->tag('span', '#', array('class' => 'add-on'));
       echo $this->Form->input('coleta', array('div' => false, 'label' => false, 'placeholder' => 'Digite o numero da coleta'));
        ?>
    </div>   
    <?php echo $this->Html->tag('br'); ?><?php echo $this->Html->tag('br'); ?>
   <?php echo $this->Form->button('Ir para a Coleta', array('class' => 'btn btn-inverse'));?> 
   <?php echo $this->Form->end(); ?>
    
       <?php echo $this->Html->tag('hr'); ?>
<?php
$roleId = $this->Session->read('Auth.User.group_id');

if($roleId == 1 OR $roleId == 2 OR $roleId == 4){
?>
    <?php echo $this->Html->tag('h4', 'Selecione os filtros para realizar a busca'); ?> 
   <?php echo $this->Form->create('Reverse', array('action' => 'index', 'class' => 'form-horizontal', 'type' => 'get')); ?>
 
        <?php echo $this->Form->input('status_id', array('class' => 'span4', 'label' => 'Selecione o Status', 'empty' => '-- Selecione um status ou deixe em branco --')); ?>
        <?php echo $this->Html->tag('br'); ?>
   <div class="controls-row">
       <?php
       echo $this->Form->input('user', array('class' => 'span2', 'placeholder' => 'Digite o usuário aqui', 'div' => false, 'label' => false));
       echo $this->Form->input('from', array('class' => 'span2', 'placeholder' => 'Período de:', 'div' => false, 'label' => false));
       echo $this->Form->input('to', array('class' => 'span2', 'placeholder' => 'Período até: ', 'div' => false, 'label' => false));
       
       ?>
   </div>    
   <?php echo $this->Html->tag('br'); ?>
   <?php echo $this->Form->button('Filtrar Coletas', array('class' => 'btn btn-inverse'));?> 
   <?php echo $this->Form->end(); ?> 
       
   <?php echo $this->Html->tag('hr'); ?>
   <?php //echo $this->Html->tag('h4', 'Busca por NF / ainda não está funcionando'); ?>
       
   <?php //echo $this->Form->create('Reverse', array('action' => 'index', 'class' => 'form-horizontal')); ?>
    <div class="input-prepend">
        <?php
       //echo $this->Html->tag('span', '#', array('class' => 'add-on'));
       //echo $this->Form->input('nota', array('div' => false, 'label' => false, 'placeholder' => 'Digite o numero da Nota Fiscal'));
        ?>
    </div>   
    <?php //echo $this->Html->tag('br'); ?><?php echo $this->Html->tag('br'); ?>
   <?php //echo $this->Form->button('Filtrar por Nota', array('class' => 'btn btn-inverse'));?>
   <?php //echo $this->Form->end(); ?>
    
      
       
<?php }else{ ?>
       
            <?php echo $this->Html->link(__('Listar Coletas'), array('action' => 'index'), array('class' => 'btn btn-large btn-primary')); ?>
       
       
<?php } ?>       
  
     
       
       
       
</div>       
</div>
