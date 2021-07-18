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
      <h1>Remédios</h1>
    </div>
    <div class="logo">
      <img src="../images/logo.png"/>
    </div>
  </div>
  
  <div class="content">
    <div class="form">

      <div class="form-section">
        <div class="title">
          <h1>Busca</h1>
        </div>
        <div class="form-group col-5">
          <input type="text" name="nome" class="form-control" placeholder="Digite o nome. Ex: dipirona" required />
        </div>
        <div class="form-group col-5">
          <input type="text" name="apresentacao" class="form-control" placeholder="Digite a apresentação. Ex: 500 MG" required />
        </div>
        <div class="form-group col-2">
          <button class="btn btn-search">Buscar</button>
        </div>
      </div>
      <div class="form-section">
        <div class="title title-results">
          <h1>Resultados (0)</h1>
        </div>
        <div class="table">
          <table id="table-products">
            <thead>
              <tr>
                <th class="count">#</th>
                <th class="produto">Nome</th>
                <th class="apresentacao">Apresentação</th>
                <th class="price">Preço</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="no-results">
          <h1>Nenhum resultado encontrado</h1>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../js/functions.js"></script>
<script src="/remedios/script.js"></script>
</html>