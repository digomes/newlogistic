$(function(){
    
    //Cria uma função para Criar os campos Nome e Telefone
    function createDivFields(num){
        /*
         Criamos a variavel, e atribuimos os campos que serão criados;
         Utilizamos o colchetes nos nomes do campos para informar que os dados 
         em forma de array;
         Adiciona uma div, para que nela seja criado novos campos extras;
         E um link para para chamar o evento de adicionar;
        */
        var html  = '<div class="items" id="item_'+num+'">';
            html += '<div class="span12">';
            html += '<div class="span11">';
            html += '<label>Selecione o tipo de Arquivo: <br ><select name="data[Upload]['+num+'][type_id]" id="Upload'+num+'TypeId" class="span6"><option value="">Selecione o Tipo de Arquivo</option><option value="1">Declaração</option><option value="2">Nota Fiscal</option><option value="3">Carta de Correção</option></select></label>';
            html += '</div>';
            html += '<br><br>';
            html += '<div class="span11">';
            html += '<label>Selecione um Arquivo : <input type="file" name="data[Upload]['+num+'][filename]" id="Upload'+num+'Filename" class="span11"></label>';
            html += '</div>';
            html += '<br><br>';
            html += '<div class="span9">';
            html += '<label>Descrição do Anexo : <textarea name="data[Upload]['+num+'][description]" class="span9" id="Upload'+num+'Description" rows="2"></textarea>';
            html += '</div>';
            html += '<input type="hidden" name="data[Upload]['+num+'][dir]" id="Upload'+num+'Dir">';
            html += '<input type="hidden" name="data[Upload]['+num+'][mimetype]" id="Upload'+num+'Mimetype">';
            html += '<input type="hidden" name="data[Upload]['+num+'][filesize]" id="Upload'+num+'Filesize">';
            html += '</div>';            
            html += '</div>';
            html += '<br><br>';
            return html;
    }
    
    
    //cria uma função para conta os campos criados
    function getTotalItems(){
        //Contamos o total de campos, e diminuimos 1
        //Porque o array é iniciado seu indice com 0
        return $(".items").length;
    }
    
    //Adiciona os nome e telefone
    $("#add").click(function(){
        //Adicionado no final do elemento ( #boxFields) os campos
        var totalField = getTotalItems();
        $("#boxFields").append(createDivFields(totalField));
        return false;
    });
    
    //Adiciona os campos extras
 //   $(".addCampo").live('click', function(){
        /*
            Utilizamos Live para atribui o evento click ao link addTel
            Isso porque como criamos dinamicamente esse elemento
            ele ainda não está no DOM, quando o jQuery vai executar
        */
        
        //recupera a posição
      //  var position = $(this).attr('data-id');
        
        //Voltamos um elemento (parent);
        //e depois buscamos .item, informando que precisa ser o primeiro encontrado
        //Adiciona no final do elemento (.item) os novos campos
        
      //  $(this).parent().children('.item:first').append(createFieldTel(position));
        
      //  return false;
    //});

});