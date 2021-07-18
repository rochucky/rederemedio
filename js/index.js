function getLocation() {
  if (navigator.geolocation) {
    return navigator.geolocation.getCurrentPosition(sendPosition);
  } else { 
    alert("Geolocation is not supported by this browser.");
  }
}

function sendPosition(position) {
  // x.innerHTML = "Latitude: " + position.coords.latitude + 
  // "<br>Longitude: " + position.coords.longitude;
  window.location.href = `?search=${$('.searchInput').val()}&order=${$('#order').val()}&lat=${position.coords.latitude}&long=${position.coords.longitude}`;
}

$(document).ready(() => {
  $('.remedio').on('click', evt => {
    if($(evt.target).is('button')) return false;
    $('.overlay').removeClass('hidden');
    $(evt.currentTarget).addClass('selected');
  })

  $('.site').on('click', evt => {
    window.open(evt.target.dataset.site);
  })
  $('.map').on('click', evt => {
    window.open(evt.target.dataset.map);
  })
  $('.back').on('click', evt => {
    $('.overlay').addClass('hidden');
    $('.remedio.selected').removeClass('selected');
  })

  $('#order').on('change', evt => {
    let order = evt.currentTarget.value;
    let search = $('.searchInput').val();
    if(order === 'distance'){
      getLocation();
    }
    else{
      window.location.href = `?search=${search}&order=${order}`;
    }
  })

  $('.usermenu-sair').on('click', evt => {
    $.ajax({
      url: 'services/logout.php',
      type: 'POST',
      success: () => {
        window.location.reload();
      }
    });
  });
  $('.usermenu-cadastro').on('click', evt => {
    window.location.href = 'cadastro/';
  });
  $('.usermenu-remedios').on('click', evt => {
    window.location.href = 'remedios/';
  });
})