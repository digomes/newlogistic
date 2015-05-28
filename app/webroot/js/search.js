$(document).ready(function () {

  $('#select2').select2({
    placeholder: "Digite o Modelo do Produto",
    minimumInputLength: 4,
    ajax: {
      url: CbunnyObj.APP_PATH + 'products/search',
      dataType: 'json',
      data: function (term, page) {
        return {
          q: term
        };
      },
      results: function (data, page) {
        return { results: data };
      }
    }
  });

});