<?php

/**
 * Descrição do arquivo export_data
 *
 * @descrição
 * @versão 
 * @autor diego
 * @data 21/03/2013
 */

 $line= $reverses[0]['Reverse'];
 $this->CSV->addRow(array_keys($line));
 foreach ($reverses as $reverse)
 {
      $line = $reverse['Reverse'];
       $this->CSV->addRow($line);
 }
 
 $filename = 'Reverses'.date('Y-m-d');
 
 echo  $this->CSV->render($filename);
?>
