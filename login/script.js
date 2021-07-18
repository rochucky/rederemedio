$(document).ready(() => {
  $('form').on('submit', evt => {
    evt.preventDefault();
    
    data = {
      username: $('#username').val(),
      password: $('#password').val()
    }

    let postData = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    }
    fetch('../../services/login.php', postData)
      .then(response => response.json())
      .then(json => {
        if (json.status === 'error') {
          $('.error > p').text(json.message);
        }
        else {
          window.location.href = '../../';
        }
      })
  })
})