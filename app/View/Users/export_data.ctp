<?php

/**
 * Descrição do arquivo export_data
 *
 * @descrição
 * @versão 
 * @autor diego
 * @data 21/03/2013
 */

 $line= $tickets[0]['Ticket'];
 $this->CSV->addRow(array_keys($line));
 foreach ($tickets as $ticket)
 {
      $line = $ticket['Ticket'];
       $this->CSV->addRow($line);
 }
 $filename = 'tickets';
 
 echo  $this->CSV->render($filename);
?>
