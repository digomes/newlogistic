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
        $( "#ReverseTo" ).datepicker( "option", "minDate", selectedDate );
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
    

    <?php echo $this->Html->tag('h4', 'Selecione o intervalo para gerar o gráfico'); ?>
    <?php //$dateTime = date("Y-m-d H:i:s"); ?>
   <?php echo $this->Form->create('Reverse', array('action' => 'chart', 'class' => 'form-horizontal')); ?>
 
   <div class="controls-row">
       <?php
       echo $this->Form->input('from', array('class' => 'span2', 'placeholder' => 'Período de:', 'div' => false, 'label' => false));
       echo $this->Form->input('to', array('class' => 'span2', 'placeholder' => 'Período até: ', 'div' => false, 'label' => false));
       ?>
   </div>    
       
   <?php echo $this->Html->tag('br'); ?>
   <?php echo $this->Form->button('Gerar Gráfico', array('class' => 'btn btn-inverse'));?> 
   <?php echo $this->Form->end(); ?> 
  
     

       
</div>       
</div>
