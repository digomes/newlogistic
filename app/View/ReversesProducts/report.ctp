   <script type="text/javascript">
  $(function() {
    $( "#ReversesProductFrom" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      showWeek: true,
      firstDay: 1,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#ReversesProductTo" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#ReversesProductTo" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      showWeek: true,
      firstDay: 1,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#ReversesProductFrom" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
 </script>
<div class="row-fluid">
   <div class="span12">
    

    <?php echo $this->Html->tag('h4', 'Selecione o intervalo para extrair o relatório'); ?>
    <?php //$dateTime = date("Y-m-d H:i:s"); ?>
   <?php echo $this->Form->create('ReversesProduct', array('action' => 'exportPlan.csv', 'class' => 'form-horizontal')); ?>
 
   <div class="controls-row">
       <?php
       echo $this->Form->input('status_id', array('class' => 'span4', 'div' => false, 'label' => false, 'empty' => '-- Selecione um status ou deixe em branco --'));
       echo $this->Form->input('from', array('class' => 'span2', 'placeholder' => 'Período de:', 'div' => false, 'label' => false));
       echo $this->Form->input('to', array('class' => 'span2', 'placeholder' => 'Período até: ', 'div' => false, 'label' => false));
       ?>
   </div>    
       
   <?php echo $this->Html->tag('br'); ?>
   <?php echo $this->Form->button('Extrair Relatório', array('class' => 'btn btn-inverse'));?> 
   <?php echo $this->Form->end(); ?> 
  
     
       
       
       
</div>       
</div>
