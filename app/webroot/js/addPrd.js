$(document).ready(function(){

	$('.newprod').on('click', function(event) {

		$.ajax({
			type: "POST",
			url: "/productsaddProd",
			data: {
				//id: $(this).attr("id"),
				id: $("#newprod").attr("value"),
				//quantity: 1
			},
			dataType: "json",
			success: function(data) {

				$('#msg').html('<div class="alert alert-success flash-msg">Produto adicionado com sucesso!!</div>');
				//$('#cartbutton').show();
				$('.flash-msg').delay(3000).fadeOut('slow');

			},
			error: function() {
				alert('Houston nós temos um problema !!!');
			}
		});

		return false;

	});

});