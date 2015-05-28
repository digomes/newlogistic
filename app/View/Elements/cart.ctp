<h3>Produtos</h3>
<table class="table table-striped">
    <thead> 
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Embalagem</th>
        <th>Etiqueta</th>
        <th>Nota Fiscal Origem</th>
        <th>Ação</th>
    </tr>
    </thead>
    <tbody>
   <?php 
    $cart = $this->requestAction('products/cart');
    
   ?>
    <?php foreach ($cart as $key => $product): ?>
    <tr>
        <td>
            <?php 
              //link to product page
              echo $product['Product']['material']; 
            ?>
        </td>
        <td>
            <?php 
              //link to product page
              echo $product['Product']['description']; 
            ?>
        </td>
        <td>
            
            <!--<input name="data[ReversesProduct][embalagem][]" type="checkbox" value="1" id="ReversesProductEmbalagem">
            <label for="ProductEmbalagem">Sim</label>-->
            <?php 
                $optionsEmb = array('0' => 'Não', '1' => 'Sim');
                $attributesEmb = array('legend' => false, 'required');
            ?>    
             <?php echo $this->Form->radio('ReversesProduct.'.$key.'.embalagem', $optionsEmb, $attributesEmb);?>
             
        </td>
        <td>
            <?php 
                $optionsEti = array('0' => 'Não', '1' => 'Sim');
                $attributesEti = array('legend' => false, 'required');
            ?>
            <?php echo $this->Form->radio('ReversesProduct.'.$key.'.etiqueta', $optionsEti, $attributesEti);?>
            <?php echo $this->Form->input('ReversesProduct.'.$key.'.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));?>
        </td>
        <td>
            
            <!--<input name="data[ReversesProduct][embalagem][]" type="checkbox" value="1" id="ReversesProductEmbalagem">
            <label for="ProductEmbalagem">Sim</label>-->
             <?php echo $this->Form->input('ReversesProduct.'.$key.'.invoice', array('type' => 'number', 'label' => 'Numero NF', 'class' => 'span2', 'required' => 'required'));?>
        </td>        
        <td>
            <?php 
              //remove product from a cart
              echo $this->Html->link('deletar', array('controller' => 'products', 'action' => 'delProd',$key), array('class' => 'btn btn-danger')); 
            ?>
        </td>
    </tr>
    
<!--<input name="data[ReversesProduct][product_id][]" type="text" value="<?php //echo $product['Product']['id']; ?>" id="ReversesProductProductId">-->
 <?php echo $this->Form->input('ReversesProduct.'.$key.'.product_id', array('type' => 'hidden', 'value' => $product['Product']['id']));?>

     <?php endforeach; ?>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>
          <?php
            //delete all elements from a cart
            echo $this->Html->link('Limpar Produtos', array('controller' => 'products', 'action'=>'empty_cart'), array('class' => 'btn btn-warning'));
          ?>
        </th>
    </tr>
   </tbody> 
</table>

<div>
    <?php 
      //link to products page
      //echo $this->Html->link('+ Adicionar Produto', array('#addProduct'), array('class' => 'btn btn-primary')); 
    ?>
    <a href="#" class="btn btn-primary" id="opnPrd">+ Adicionar Produtos</a>
    <a href="#" class="btn btn-primary" onclick='location.reload(true); return false;' >Atualizar</a>
</div>

<br >

 
<!-- Modal -->
<div id="addProduct" class="modal hide fade modal-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-static="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Adicionar Produtos</h3>
  </div>
  <div class="modal-body">
      <iframe src="" style="zoom:1" width="99.5%" height="650px"  frameborder="0"></iframe>
  </div>
</div>
