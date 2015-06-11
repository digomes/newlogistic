$(document).ready(function(){
    $('#tableProducts').dataTable();
});
$(document).ready(function(){
    $('#tableFilter').dataTable({
        "order": [[ 0, 'desc' ]]
       //table.column( '0:visible' ).order( 'asc' );
    });
});

