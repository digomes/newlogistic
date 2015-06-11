/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(function($){
   //$.mask.definitions['9']
   //$("#NFReverse").mask("9");
   //$("#phone").mask("(999) 999-9999");
   //$("#tin").mask("99-9999999");
   //$("#ssn").mask("999-99-9999");
});

$(document).ready(function(){
    $("input#ReverseAmount").maskMoney({showSymbol:false, decimal:",", thousands:"."});
    //$("input#ReverseAmount").maskMoney({showSymbol:false, symbol:"R$", decimal:",", thousands:"."});
});

                        	$(document).ready(function(){
                                    $("li.dropdown ul").addClass("dropdown-menu");
				});
                                
                                $(document).ready(function(){
                                    $('.dropdown-toggle').dropdown();   
				});


 $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip()
});
