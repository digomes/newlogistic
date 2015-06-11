<div class="row-fluid">
    	<fieldset>
		<legend><?php echo __('Seleção de Produtos'); ?></legend>
<?php echo $this->Form->create('Product', array('role' => 'form', 'type' => 'Post', 'action' => 'prdlist')); ?>
<div class="span12">
<div class="span7">
    <?php echo $this->Form->input('Product.material', array('class' => 'form-control', 'label' => 'Código da Peça / Produto', 'placeholder' => 'Digite o código Parcial ou Completo', 'class' => 'span7')); ?>
</div>
</div>
    
<div class="span12">    
<div class="span3">    
<?php foreach ($types as $type): ?>
    <?php $optionstype[$type] = strtoupper($type); ?>
<?php endforeach; ?>
<?php echo $this->Form->input('Product.type', array('class' => 'form-control', 'label' => 'Tipo', 'empty' => 'Selecione um tipo', 'options' => $optionstype)); ?>
</div>

    
    
<div class="span3">
<?php foreach ($manufacturers as $manufact): ?>
    <?php $optionsmanufact[$manufact] = strtoupper($manufact); ?>
<?php endforeach; ?>
<?php echo $this->Form->input('Product.manufacturer', array('class' => 'form-control', 'label' => 'Fabricante', 'empty' => 'Selecione um fabricante', 'options' => $optionsmanufact)); ?>
</div>
    
<div class="span3">    
<?php foreach ($categories as $category): ?>
    <?php $optionscategory[$category] = strtoupper($category); ?>
<?php endforeach; ?>
<?php echo $this->Form->input('Product.category', array('class' => 'form-control', 'label' => 'Categoria', 'empty' => 'Selecione uma categoria', 'options' => $optionscategory)); ?>
</div>
</div>   
        </fieldset>
    <?php echo $this->Form->button('Buscar', array('class' => 'btn btn-inverse'));?> 
<?php echo $this->Form->end(); ?>
</div>
<br ><hr ><br >
           <div id="msg"></div> 

<table id="tableProducts" class="table">
  <thead>
    <th data-dynatable-column="id">Ação</th>
    <th data-dynatable-column="material">Código</th>
    <th data-dynatable-column="description">Descrição</th>
    <th data-dynatable-column="manufacturer">Fabricante</th>
    <th data-dynatable-column="category">Categoria</th>
  </thead>
  <tbody>
 <?php
    if(!isset($products)){ echo '<div class="msg alert">Selecione os campos acima e realize a busca</div>';}else{
 ?>     
<?php foreach ($products as $product): ?>     
      <tr>
          <td>
              <?php 
                    //echo $this->Form->postLink('Adicionar', array('controller' => 'products', 'action' => 'addProd', $product['Product']['id'])); 
              ?>
		<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'products', 'action' => 'addProd'))); ?>
		<?php echo $this->Form->input('id', array('type' => 'hidden',  'name' => 'newprod', 'id' => 'newprod', 'value' => $product['Product']['id'])); ?>
		<?php echo $this->Form->button('+', array('class' => 'btn btn-success newprod', 'id' => 'newprod', 'value' => $product['Product']['id']));?>
		<?php echo $this->Form->end(); ?>
          </td>
          <td><?php echo $product['Product']['material']; ?></td>
          <td><?php echo $product['Product']['description']; ?></td>
          <td><?php echo $product['Product']['manufacturer']; ?></td>
          <td><?php echo $product['Product']['category']?></td>
      </tr>
<?php endforeach; ?>
    <?php } ?>     
  </tbody>
</table>


<?php
       $this->Js->get('#newprod')->event('submit', 
                $this->Js->request(array(
                        'controller'=>'products',
                        'action'=>'addProd'
                        ), array(
                        'update'=>'#ProductProduct',
                        'async' => true,
                        'method' => 'Post',
                        'dataExpression'=>true,
                        'data'=> $this->Js->serializeForm(array(
                                'isForm' => true,
                                'inline' => true
                                ))
                        ))
                ); 
?>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
	// Writes cached scripts
?>

