<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="style.min.css">
  <title>Document</title>
</head>
<body> 
  <div class="content">
    <div class="card">
      
        <div class="logo">
          <img src="../../../images/logo.png" alt="">
        </div>
        <div class="tabs">
          <ul>
            <li><a href="#" class="tab" data-tab="cliente">Cliente</a></li>
            <li><a href="#" class="tab" data-tab="farmacia">Farmácia</a></li>
          </ul>
        </div>
        <div class="error">
          <p></p>
        </div>
        <div id="cliente" class="tab">
          <form action="../../../services/cadastrar.php">
            <div class="formItem">
              <label for="name">Nome Completo</label>
              <input type="text" name="name" required>
            </div>
            <div class="formItem">
              <label for="username">Email</label>
              <input type="email" name="username" required>
            </div>
            <div class="formItem">
              <label for="password">Senha</label>
              <input type="password" name="password" required>
            </div>
            <div class="formItem">
              <label for="confirm-password">Confirmar Senha</label>
              <input type="password" name="confirm-password" required>
            </div>
            <input type="hidden" name="user_type_id" value="2">
            <div class="buttons">
              <button class="button confirm">Cadastrar</button>
            </div>
          </form>
        </div>
        <div id="farmacia" class="tab">
          <form action="../../../services/cadastrar.php">
            <div class="formItem">
              <label for="name">Razão Social</label>
              <input type="text" name="name" required>
            </div>
            <div class="formItem">
              <label for="cnpj">CNPJ</label>
              <input type="text" name="cnpj" required>
            </div>
            <div class="formItem">
              <label for="username">Email</label>
              <input type="text" name="username" required>
            </div>
            <div class="formItem">
              <label for="password">Senha</label>
              <input type="password" name="password" required>
            </div>
            <div class="formItem">
              <label for="confirm-password">Confirmar Senha</label>
              <input type="password" name="confirm-password" required>
            </div>
            <input type="hidden" name="user_type_id" value="3">
            <div class="buttons">
              <button class="button confirm">Cadastrar</button>
            </div>
          </form>
        </div>
        
      <div class="voltar">
        <a href="../">Voltar</a>
      </div>
    </div>
  </div>  
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../../../js/functions.js"></script>
<script src="script.js"></script>
</html>