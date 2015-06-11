//$('#addProduct').on('show', function (e) {
  ///  if (!data) return e.preventDefault() // stops modal from being shown
//})

$(document).ready(function() {
var frameSrc = "/logistica/products/prdlist";

$('#opnPrd').click(function(){
    $('#addProduct').on('show', function () {

        $('iframe').attr("src",frameSrc);
      
	});
    $('#addProduct').modal({show:true})
});
        $('#addProduct').on('hidden.bs.modal', function () {
            location.reload();
        });

});
                