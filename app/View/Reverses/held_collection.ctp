   <script type="text/javascript">
   $(function() {
       $( "#ReverseHeldcollection" ).datepicker({
           defaultDate: "+1w",
           changeMonth: true,
           numberOfMonths: 2,
           showWeek: true,
           firstDay: 1,
           dateFormat: "yy-mm-dd 00:00:00",
       });
   });
</script>
<?php echo $this->Html->tag('hr'); ?>
<?php echo $this->Form->create('Reverse', array('class' => 'form')); ?>
<?php echo $this->Form->input('dateProgress', array('class' => 'span5', 'required', 'label' => 'Selecione a data da coleta', 'id' => 'ReverseHeldcollection')); ?>
<?php echo $this->Html->tag('hr'); ?>
    <?php echo $this->Form->button('Enviar', array('class' => 'btn btn-inverse'));?>  
<?php echo $this->Form->end(); ?>