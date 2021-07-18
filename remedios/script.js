$(document).ready(function() {

  $('.back').click(function() {
    window.history.back();
  });

  $('.btn-search').click(() => {
    let nome = $('input[name=nome]').val();
    let apresentacao = $('input[name=apresentacao]').val();
    let postData = {
      params: {
        nome: nome,
        apresentacao: apresentacao
      },
      method: 'getProducts'
    }


    if (nome.length > 0 || apresentacao.length > 0) {
      $.post('/services/webservice.php', JSON.stringify(postData), (data) => {
        let data_array = JSON.parse(data);
        let tbody = $('#table-products > tbody');
        let count = 0;
        
        $('.title-results > h1').text(`Resultados (${data_array.length})`);
        tbody.html('');
        
        data_array.forEach(function(item) {
          let tr = $('<tr>');
          tr.append($('<td class="count">').text(++count));
          tr.append($('<td class="produto">').text(item.produto));
          tr.append($('<td class="apresentacao">').text(item.apresentacao));
          tr.append($('<td class="price">').append(`<input id="${item.id}">`));
          tbody.append(tr);
        });

      })

    }
  });

  $('input[name=nome], input[name=apresentacao]').on('keyup', (e) => {
    if (e.keyCode === 13) {
      $('.btn-search').click();
    }
  });

});