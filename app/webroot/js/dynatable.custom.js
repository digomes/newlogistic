$(document).ready(function() {
//$('#my-ajax-table').dynatable({
  //dataset: {
  //  ajax: true,
   // ajaxUrl: '/logistica/products/search',
    //ajaxOnLoad: true,
    //records: []
 // }
//});

//$.ajax({
 // url: '/logistica/products/search',

  //success: function(data){
   // $('#my-ajax-table').dynatable({
    //  dataset: {
     //   records: data
   //   }
    //});
  //}
//});
    $('#dados-produtos').dynatable({
      dataset: {
        records: JSON.parse($('#dados').text())
      }
    });
});