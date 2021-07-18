$(document).ready(() => {
  
  $('#cnpj').mask('00.000.000/0000-00');
  $('#postal_code').mask('00000-000');

  $('input[type=tel]').mask('(00) 00000-0000');

  $('form').on('submit', evt => {
    evt.preventDefault();
  })
})