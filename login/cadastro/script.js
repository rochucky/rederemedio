$(document).ready(function() {
  $('a.tab').on('click', function(e) {
    e.preventDefault();
    console.log(e.target.dataset.tab);
    $('a.tab').removeClass('active');
    $('div.tab').removeClass('active');
    $('div.tab input').attr('disabled', true);
    $(this).addClass('active');
    $(`#${e.target.dataset.tab}`).addClass('active');
    $(`#${e.target.dataset.tab} input`).attr('disabled', false);
  });

  $('form').submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var data = form.serialize();
    var url = form.attr('action');
    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      success: function(response) {
        const data = JSON.parse(response);
        if (data.success) {
          alert('Usuário criado com sucesso!');
          window.location.href = '../';
        } else {
          alert('Este email já foi cadastrado');
        }
      }
    });
  });

  $('#cliente input[name=confirm-password]').keyup(function () {
    'use strict';

    if ($('#cliente input[name=password]').val() === $(this).val()) {
        this.setCustomValidity('');
    } else {
        this.setCustomValidity('Senha e confirmação não são iguais');
    }
  });
  
  $('#farmacia input[name=confirm-password]').keyup(function () {
    'use strict';

    if ($('#farmacia input[name=password]').val() === $(this).val()) {
        this.setCustomValidity('');
    } else {
        this.setCustomValidity('Senha e confirmação não são iguais');
    }
  });
  
  $('input[name=cnpj]').keyup(function (e) {
    if(cnpjValidation($(this).val())){
      console.log('valid cnpj')
      this.setCustomValidity('');
    } else {
      console.log('invalid cnpj')
      this.setCustomValidity('CNPJ Inválido');
    }
  });
  
});