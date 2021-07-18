$(document).ready(function() {

  $.ajax({ // inicial data
    type: "POST",  
    url: "../services/webservice.php",
    data: JSON.stringify({
      'method': 'getUser',
      'params' : {
        'id' : $('#id').val(),
        'user_type': $('#user_type').val()
      }
    }),
    dataType: "json",
    success: function(data) {
      Object.keys(data).forEach(key => {
        $(`input[name=${key}]`).val(data[key]);
        $(`select[name=${key}]`).val(data[key]);
      });
      $('input[name=email]').val(data.username);
      $('input[name=open_date]').val(data.open_date && data.open_date.split(' ')[0]);
      $('input[type=checkbox]').each((index, element) => {
        if (element.value == 1) {
          element.checked = true;
        }
      })
    }
  });


  $('.back').click(function() {
    window.history.back();
  });

  $('input[name=cep]').mask('99999-999');
  $('input[name=cnpj]').mask('99.999.999/9999-99', {reverse: true, placeholder: '00.000.000/0000-00'});
  $('input[type=phone]').mask('(99) 99999-9999');
  $('input[type=money]').mask('#9.99', {reverse: true});

  $('input[name=cep]').on('keyup', function() {
    if ($(this).val().length == 9) {
      $.ajax({
        url: `https://viacep.com.br/ws/${$(this).val()}/json/`,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log(data);
          $('input[name=neighborhood]').val(data.bairro);
          $('input[name=city]').val(data.localidade);
          $('input[name=state]').val(data.uf);
          $('input[name=address]').val(data.logradouro);
        }
      });
    }
  });

  $('#client-form').submit(function(e) {
    e.preventDefault();
    var formData = serializedToPost($(this).serializeArray());

    $('input[type=checkbox]').each((index, checkbox) => {
      console.log(checkbox.name);
      if ($(checkbox).is(':checked')){
        formData[checkbox.name] = 1;
      }
      else {
        formData[checkbox.name] = 0;
      }
    });

    $.ajax({
      type: 'POST',
      url: '../services/webservice.php',
      data: JSON.stringify({
        'method': 'saveClient',
        'params': JSON.stringify(formData)
      }),
      dataType: "json",
      processData: false,
      contentType: false,
      success: function(data) {
        if (data.success) {
          alert('Cadastro atualizado!');
        } else {
          alert('Erro ao cadastrar cliente');
        }
      }
    });
  });
});