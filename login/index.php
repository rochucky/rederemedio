<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/style/main.min.css">
  <link rel="stylesheet" href="style.min.css">
  <title>Document</title>
</head>
<body> 
  <div class="content">
    <div class="card">
      <form>
        <div class="logo">
          <img src="../../images/logo.png" alt="">
        </div>
        <div class="error">
          <p></p>
        </div>
        <div class="formItem">
          <label for="username">Email</label>
          <input type="text" name="username" id="username" required>
        </div>
        <div class="formItem">
          <label for="password">Senha</label>
          <input type="password" name="password" id="password" required>
        </div>
        <div class="buttons">
          <button class="confirm signin">Entrar</button>
        </div>
      </form>
      <div class="cadastrar">
        <a href="cadastro/">Cadastrar-se</a>
      </div>
    </div>
  </div>  
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="script.js"></script>
</html>