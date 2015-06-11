$(document).ready(function(){

	$('.newprod').on('click', function(value) {
               //var a = $("input[name=newprod]").val();
                 var a = $(this).val();
		$.ajax({
			type: "POST",
			url: "/logistica/products/addProd",
			//data: {id: $("#newprod").attr("value")},
            data: {id: a}, 
			success: function(data) {
				$('#msg').html('<div class="alert alert-success flash-msg">Produto Adicionado com Sucesso !!</div>');
				$('.flash-msg').delay(1000).fadeOut('slow');
			},
			error: function() {
				$('#msg').html('<div class="alert alert-error flash-msg">Erro ao Adicionar o produto</div>');
				$('.flash-msg').delay(1000).fadeOut('slow');
			}
		});

		return false;

	});

});