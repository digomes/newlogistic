   <script type="text/javascript">
  $(function() {
    $( "#ReverseFrom" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      showWeek: true,
      firstDay: 1,
      dateFormat: "yy-mm-dd",
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
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#ReverseFrom" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
 </script>

<div class="row-fluid">
   <div class="span12">
    

    <?php echo $this->Html->tag('h4', 'Selecione o intervalo para extrair o relatório'); ?> 
   <?php echo $this->Form->create('Reverse', array('action' => 'export.csv', 'class' => 'form-horizontal')); ?>
 
   <div class="controls-row">
       <?php
       echo $this->Form->input('from', array('class' => 'span2', 'placeholder' => 'Período de:', 'div' => false, 'label' => false));
       echo $this->Form->input('to', array('class' => 'span2', 'placeholder' => 'Período até: ', 'div' => false, 'label' => false));
       ?>
   </div>    
       
   <?php echo $this->Html->tag('br'); ?>
   <?php echo $this->Form->button('Extrair Relatório', array('class' => 'btn btn-inverse'));?> 
   <?php echo $this->Form->end(); ?> 
  
     
       
       
       
</div>       
</div>
