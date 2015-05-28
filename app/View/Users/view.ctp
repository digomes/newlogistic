<div class="tab-content">
<div class="tab-pane row-fluid profile-account tab-main active" id="tab_1_1">
<div class="row-fluid">
<div class="span12">
<div class="span3">
    <ul class="ver-inline-menu tabbable margin-bottom-10" id="profile-menu-tabs">
        <li>
         <img alt="gravatar" title="avatar" src="http://www.gravatar.com/avatar/8d9528f495275e1e2b3d64aa093c62a1?s=208&amp;d=mm&amp;r=g">                    </li>
        <li class="active">
            <span class="after"></span>
        </li>
        <li class="edit-profile"><i class="icon-edit"></i> <?php echo $this->Html->link(__('Editar Perfil'), array('action' => 'edit', $user['User']['id'])); ?></li>
   </ul>
</div>
<div class="span9">
<div class="tab-content">

<div id="tab_1-1" class="tab-pane active">
    <div style="height: auto;" id="accordion1-1-1" class="accordion collapse in">
        <div class="tab-pane profile-classic row-fluid" id="tab_1_6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr> 
                </thead>
                    <tr>
                        <td>ID do Cliente:</td>
                        <td><?php echo $user['User']['id']; ?></td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td><?php echo $user['User']['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Usuário:</td>
                        <td><?php echo $user['User']['username']; ?></td>
                    </tr>
                    <tr>
                        <td>Grupo:</td>
                        <td><?php echo $user['Group']['name']; ?></td>
                    </tr> 
                    <tr>
                        <td>Posto:</td>
                        <td><?php echo $user['Workshop']['code']; ?></td>
                    </tr> 
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $user['User']['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td><?php echo ($user['User']['active'] = 1) ? "Ativo" : "Inativo"; ?></td>
                    </tr> 
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

    
</div>
</div>
<!--end span9-->
</div>
</div>
</div>
<!--end tab-pane-->
<div class="span10">
    <div class="span3">
        <?php echo $this->Html->link(__('Gerar Grafico de Coletas'), array('controller' => 'users', 'action' => 'chartTicket',  $user['User']['id']), array('class' => 'btn btn-success', 'id' => 'showdialog')); ?>
    </div>
</div>
<script>
$(document).ready(function(){
    //define config object
var dialogOpts = {
        title: "Grafico de Coletas",
        modal: true,
        autoOpen: false,
        height: 620,
        width: 700,
            buttons:
            {
                "Fechar": function()
                {
                    $(this).dialog("close");
                }
            },
        open: function() {
        //display correct dialog content
        $("#graph").load();
        }
    };
$("#graph").dialog(dialogOpts);    //end dialog
    
    $('#showdialog').click(
        function (){
          $("#graph").dialog("open");
            return false;
      }
  );


   // $('#showdialog').click(function (){
  //       $("#example").load($(this).attr('href'));
  //       $("#example").dialog('open');
  //       return false
   // });
});
</script>
<div style="display: none;" id="graph" title="<?php echo $user['User']['name']; ?>">
<div id="chart_div"><?php $this->GoogleChart->createJsChart($charts);?></div>
<div class="span5">Total de Tickets: <?php echo Count($total); ?></div>
<div class="span4">
        <?php echo $this->Html->link(__('Exportar dados das coletas'), array('controller' => 'reverses', 'action' => 'exportData',  $user['User']['id']), array('class' => 'btn btn-success', 'target' => '_blank')); ?>
</div>
    </div>

 