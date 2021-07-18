<?php

session_start();

if(!$_SESSION['user']){
  header("Location: ../index.php");
}

$user = $_SESSION['user'];

?>


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
  <div class="top">
    <div class="back">
      <h1><i class="arrow-left"></i>Voltar</h1>
    </div>
    <div class="title">
      <h1>Cadastro</h1>
    </div>
    <div class="logo">
      <img src="../images/logo.png"/>
    </div>
  </div>
  
  <div class="content">
    <div class="form">
      <?php if($user['user_type_id'] == 2): ?>
        <form action="../controller/cadastro.php" method="post" id="client-form">
          <input type="hidden" id="id" name="id" value="<?= $user['id'] ?>" />
          <input type="hidden" id="user_type" name="user_type" value="<?= $user['user_type_id'] ?>" />
          <div class="form-section">
            <div class="title">
              <h1>Dados pessoais</h1>
            </div>
            <div class="form-group col-6">
              <label for="name">Nome</label>
              <input type="text" name="name" class="form-control" placeholder="Nome" required>
            </div>
            <div class="form-group col-6">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
          </div>
          <div class="form-section">
            <div class="title">
              <h1>Endereço</h1>
            </div>
            <div class="form-group col-12">
              <label for="cep">CEP</label>
              <input type="text" name="cep" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group col-7">
              <label for="address">Endereço</label>
              <input type="text" name="address" class="form-control" placeholder="Rua, Av, Tr, etc.">
            </div>
            <div class="form-group col-0">
              <label for="number">Número</label>
              <input type="text" name="number" class="form-control" placeholder="Número">
            </div>
            <div class="form-group col-2">
              <label for="neighborhood">Bairro</label>
              <input type="text" name="neighborhood" class="form-control" placeholder="Bairro">
            </div>
            <div class="form-group col-2">
              <label for="state">Estado</label>
              <input type="text" name="state" class="form-control" placeholder="Estado">
            </div>
            <div class="form-group col-2">
              <label for="city">Cidade</label>
              <input type="text" name="city" class="form-control" placeholder="Cidade">
            </div>
          </div>
          <div class="buttons">
            <button type="submit" class="confirm">Salvar</button>
            <button type="reset" class="cancel">Limpar</button>
          </div>
        </form>
      <?php else: ?>
        <form action="../controller/cadastro.php" method="post" id="client-form">
          <input type="hidden" id="id" name="id" value="<?= $user['id'] ?>" />
          <input type="hidden" id="user_type" name="user_type" value="<?= $user['user_type_id'] ?>" />
          <div class="form-section">
            <div class="title">
              <h1>Dados</h1>
            </div>
            <div class="form-group col-4">
              <label for="name">Razão Social</label>
              <input type="text" name="name" class="form-control" placeholder="Razão Social" required disabled />
            </div>
            <div class="form-group col-4">
              <label for="trade_name">Nome Fantasia</label>
              <input type="text" name="trade_name" class="form-control" placeholder="Nome Fantasia" required />
            </div>
            <div class="form-group col-4">
              <label for="cnpj">CNPJ</label>
              <input type="text" name="cnpj" class="form-control" required disabled />
            </div>
            <div class="form-group col-4">
              <label for="type">Tipo</label>
              <select name="type" class="form-control" required >
                <option value="">Selecione</option>
                <option value="Matriz">Matriz</option>
                <option value="Filial">Filial</option>
              </select>
            </div>
            <div class="form-group col-4">
              <label for="open_date">Data de abertura</label>
              <input type="date" name="open_date" class="form-control" required />
            </div>
          </div>
          <div class="form-section">
            <div class="title">
              <h1>Contato</h1>
            </div>
            <div class="form-group col-6">
              <label for="phone">Telefone</label>
              <input type="text" name="phone" class="form-control" required />
            </div>
            <div class="form-group col-6">
              <label for="email">Email (Este é o seu login, cuidado ao alterá-lo)</label>
              <input type="email" name="email" class="form-control" />
            </div>
          </div>
          <div class="form-section">
            <div class="title">
              <h1>Endereço</h1>
            </div>
            <div class="form-group col-12">
              <label for="cep">CEP</label>
              <input type="text" name="cep" class="form-control" placeholder="Nome" />
            </div>
            <div class="form-group col-7">
              <label for="address">Endereço</label>
              <input type="text" name="address" class="form-control" placeholder="Rua, Av, Tr, etc." />
            </div>
            <div class="form-group col-0">
              <label for="number">Número</label>
              <input type="text" name="number" class="form-control" placeholder="Número" />
            </div>
            <div class="form-group col-2">
              <label for="neighborhood">Bairro</label>
              <input type="text" name="neighborhood" class="form-control" placeholder="Bairro" />
            </div>
            <div class="form-group col-2">
              <label for="state">Estado</label>
              <input type="text" name="state" class="form-control" placeholder="Estado" />
            </div>
            <div class="form-group col-2">
              <label for="city">Cidade</label>
              <input type="text" name="city" class="form-control" placeholder="Cidade" />
            </div>
          </div>
          <div class="form-section">
            <div class="title">
              <h1>Formas de pagamento</h1>
            </div>
            <div class="form-group col-0">
              <label for="credit">Crédito</label>
              <input type="checkbox" name="credit" class="form-control" />
            </div>
            <div class="form-group col-0">
              <label for="debit">Débito</label>
              <input type="checkbox" name="debit" class="form-control" />
            </div>
            <div class="form-group col-0">
              <label for="pix">Pix</label>
              <input type="checkbox" name="pix" class="form-control" />
            </div>
            <div class="form-group col-4">
              <label for="frete">Frete</label>
              <input type="money" name="frete" class="form-control" />
            </div>
            <div class="form-group col-4">
              <label for="freteg">Frete Grátis a partir de (em caso negativo deixe em branco)</label>
              <input type="money" name="freteg" class="form-control" />
            </div>
          </div>
          <div class="form-section">
            <div class="title">
              <h1>Social</h1>
            </div>
            <div class="form-group col-4">
              <label for="facebook">Facebook</label>
              <input type="text" name="facebook" class="form-control" required />
            </div>
            <div class="form-group col-4">
              <label for="whatsapp">WhatsApp</label>
              <input type="phone" name="whatsapp" class="form-control" required />
            </div>
            <div class="form-group col-4">
              <label for="instagram">Instagram</label>
              <input type="text" name="instagram" class="form-control" required />
            </div>
            <div class="form-group col-4">
              <label for="telegram">Telegram</label>
              <input type="text" name="telegram" class="form-control" required />
            </div>
            <div class="form-group col-4">
              <label for="pinterest">Pinterest</label>
              <input type="text" name="pinterest" class="form-control" required />
            </div>
          </div>
          <div class="buttons">
            <button type="submit" class="confirm">Salvar</button>
          </div>
        </form>
      <?php endif; ?>
      
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/js/functions.js"></script>
<script src="script.js"></script>
</html>