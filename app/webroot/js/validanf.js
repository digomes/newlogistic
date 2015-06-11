config = [
	notaBuscar		= 1,
	notaRota		= '/validarNF',
	notaSucesso		= 'O nome de usuário parece ótimo!',
	ususarioErro1	= 'Esse nome de usuário já existe.',
	ususarioErro2	= 'Apenas letras e números são aceitos.',
	ususarioErro3	= 'O nome precisa ter mais que 3 letras.',
	emailBuscar 	= 0,
	emailRota	 	= '/validarNF',
	emailSucesso	= 'Nota fiscal está incorreta.',
	emailErro1 		= 'Nota fiscal correta.',
	emailErro2 		= 'Nota fiscal está correta'
]

$(function(e){
	//var tipos  = $(this).attr('id');

	$('input[type="number"]').change(function(){
		
		var tipo  = $(this).attr('id');
		var valor = $(this).val();

						$.ajax({
							type:'POST',
							url: "/logistica/reverses/validarNF",
							//data:'nota='+ valor,
							data: {id: valor},
							//dataType: 'json',
							success:function(html){
								if(html!=1){
									retorno(tipo,'erro',config[8])
								}
								else{
									retorno(tipo,'sucesso',config[10])
								}
							}
						/*	success:function(data){	
								alert( "retornou."+data );							
								$('#'+tipo).addClass('borda-sucesso').removeClass('borda-erro');
								//$('#'+tipo).delay(5000).fadeOut('slow');
							},
							error: function() {
								$('#'+tipo).removeClass('borda-sucesso').addClass('borda-erro');
								//$('#'+tipo).delay(5000).fadeOut('slow');
							} */
						})
						return false;
						
		
	})
});


function retorno(tipo,into,msg){
	
	if(into == 'sucesso'){
		$('#'+tipo).find('.erro').remove();
		$('#'+tipo).find('.texto').remove();
		$('#'+tipo).append('<span class="resposta sucesso"></span>');
		$('#'+tipo).addClass('borda-sucesso').removeClass('borda-erro');
		$('#'+tipo).attr("data-toggle", "tooltip");
		$('#'+tipo).attr("data-placement", "left");
		$('#'+tipo).attr("title", "Nota Fiscal Correta");
		$('#'+tipo).removeAttr("required", "false");
		
		if(msg != null){
			$('#msg').html('<p class="texto cor-sucesso">'+msg+'</div>');
			//$('#'+tipo).append('<p class="texto cor-sucesso">'+msg+'</p>')
			$('#msg').delay(5000).fadeOut('slow');
		}
	} else {
		$('#'+tipo).find('.sucesso').remove();
		$('#'+tipo).find('.texto').remove();
		$('#'+tipo).append('<span class="resposta erro"></span>');
		$('#'+tipo).removeClass('borda-sucesso').addClass('borda-erro');
		$('#'+tipo).attr("required", "true");
		$('#'+tipo).attr("data-toggle", "tooltip");
		$('#'+tipo).attr("data-placement", "left");
		$('#'+tipo).attr("title", "Nota Fiscal Incorreta");
		
		if(msg != null){
			//$('#'+tipo).append('<p class="texto cor-erro">'+msg+'</p>')
			$('#msg').html('<p class="texto cor-erro">'+msg+'</p>');
			//$('#'+tipo).append('<p class="texto cor-sucesso">'+msg+'</p>')
			$('#msg').delay(5000).fadeOut('slow');
		}
	}
};

function validanota(nota){
	var ck_name = /^[0-9]{1,9}$/;
	
	if(ck_name.test(nota)){
		return ck_name.test(nota)
	}	
}

  function limitarInput(obj) {
    obj.value = obj.value.substring(0,9); //Aqui eu pego o valor e só deixo o os 10 primeiros caracteres de valor no input
  }