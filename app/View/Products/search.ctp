<table id="" class="table">
  <thead>
    <th data-dynatable-column="id">Ação</th>
    <th data-dynatable-column="material">Código</th>
    <th data-dynatable-column="description">Descrição</th>
    <th data-dynatable-column="manufacturer">Fabricante</th>
    <th data-dynatable-column="category">Categoria</th>
  </thead>
  <tbody>     
<?php foreach ($products as $product): ?>     
      <tr>
          <td><?php echo $product['Product']['id']; ?></td>
          <td><?php echo $product['Product']['material']; ?></td>
          <td><?php echo $product['Product']['description']; ?></td>
          <td><?php echo $product['Product']['manufacturer']; ?></td>
          <td><?php echo $product['Product']['category']?></td>
      </tr>
<?php endforeach; ?>      
  </tbody>
</table>