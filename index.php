<?php

include 'config.php';
require_once 'classes/database.php';
require_once 'functions.php';

session_start();

$user = $_SESSION['user'];

function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a['price'] < $b['price']) ? -1 : 1;
}
function cmpDistance($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a['distance'] < $b['distance']) ? -1 : 1;
}

$form_class = '';
$searchspec = '';
$order = (isset($_GET['order']) ? $_GET['order'] : '');
$lat = (isset($_GET['lat']) ? $_GET['lat'] : '');
$long = (isset($_GET['long']) ? $_GET['long'] : '');
$remedios = [];
if($_GET['search']){
  $searchspec = str_replace("'","",$_GET['search']);
  $form_class = 'result';
  $db = new Database();
  $remedios = $db->getListaRemedios($searchspec);
}

if(count($remedios) > 0){

  if(!$_GET['order'] || $_GET['order'] == 'price'){
    usort($remedios, "cmp");
    $order_by_price = 'selected';
  }
  if($_GET['order'] == 'distance'){
    $order_by_distance = 'selected';
    getDistance($remedios);
    // foreach($remedios as $key => $remedio){
    //   $remedios[$key]['distance'] = getDistanceBetweenPointsNew($_GET['lat'], $_GET['long'], $remedio['lat'], $remedio['long']);
    // }
    usort($remedios, "cmpDistance");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rede Remédio</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" href="style/main.min.css"/>
  <link rel="stylesheet" href="style/index.min.css"/>
</head>
<body>
  <div class="top <?= $form_class ?>">
    <div class="logo">
      <img src="images/logo.png" alt="">
      <?php if(isset($user)): ?>
        <div class="login"><h1><a href="admin">Olá, <?= explode(' ',$user['name'])[0] ?></a></h1></div>
      <?php else: ?>
        <div class="login"><h1><a href="login">Fazer Login</a></h1></div>
      <?php endif; ?>
    </div>
    <div class="center">
      <?php if($_GET['search']): ?>
        <div class="centered-logo">
          <img src="images/logo.png" alt="">
        </div>
        <form>
          <input type="text" placeholder="Digite o nome do remédio" name="search" class="searchInput" value="<?= $searchspec ?>">
          <input type="hidden" name="order" value="<?= $order ?>">
          <input type="hidden" name="lat" value="<?= $lat ?>">
          <input type="hidden" name="long" value="<?= $long ?>">
          <button class="searchButton">Buscar</button>
        </form>
      <?php endif; ?>
    </div>
    <?php if(isset($user)): ?>
      <div class="login">
        <h1>Olá, <?= explode(' ',$user['name'])[0] ?><i class="arrow-down"></i></h1>
        <div class="usermenu">
          <ul>
            <li class="usermenu-cadastro">Meu Cadastro</li>
            <?php if($user['user_type_id'] === '3'): ?>
              <li class="usermenu-remedios">Meus Remédios</li>
            <?php endif; ?>
            <li class="usermenu-sair">Sair</li>
          </ul>
        </div>
      </div>
    <?php else: ?>
      <div class="login"><h1><a href="login/">Fazer Login</a></h1></div>
    <?php endif; ?>
  </div>
  <?php if($_GET['search']): ?>
    <div class="resultados">
      <div class="lista">
        <div class="overlay hidden"></div>
        <div class="ordenar">
          <label for="order">Ordenar Por:</label>
          <select name="order" id="order">
            <option value="price" <?= $order_by_price ?>>Menor Preço</option>
            <option value="distance" <?= $order_by_distance ?>>Mais próximos de mim</option>
          </select>
        </div>
        <?php if(count($remedios) > 0): ?>
          <?php foreach ($remedios as $remedio): ?>
            <div class="remedio">
              <div class="face">
                <div class="imagem">
                  <!-- <h1><?= 'R$ '.str_replace('.',',',$remedio['price']) ?></h1> -->
                  <h1><?= $remedio['price'] ?></h1>
                  <img src="<?= $remedio['imageurl'] !== '' ? $remedio['imageurl'] : 'images/sem-foto.jpg' ?>" alt="">
                </div>
                <div class="dados">
                  <h2><img src="images/icons/eye.svg" /><?= $remedio['description'] ?></h2>
                  <h2><img src="images/icons/plus_red.svg" /><?= $remedio['farmacia'] ?></h2>
                  <h2><img src="images/icons/pin_yellow.svg" /><?= $remedio['cidade'].' - '.$remedio['bairro'] ?></h2>
                  <?php if($order_by_distance === 'selected'): ?>
                    <h2><img src="images/icons/pin_yellow.svg" /><?= number_format($remedio['distance']/1000, 3, ',', '.').' Km' ?></h2>
                  <?php endif ?>
                  
                </div>
              </div>
              <div class="options">
                <button class="blue site" data-site="<?= $remedio['url'] ?>">Ver Site</button>
                <button class="blue map" data-map="http://maps.google.com/maps?q=<?= str_replace(' ','+',$remedio['endereco'].' '.$remedio['bairro']) ?>">Ver No Mapa</button>
                <button class="red back">Voltar</button>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="not_found">
            <h1>Não encontramos nenhum resultado para sua busca.</h1>
          </div>
        <?php endif; ?>
      </div>
      <footer>
        <div class="logo">
          <img src="images/logo.png" alt="">
        </div>
        <div class="developer">
          <h2>Desenvolvido por <a href="http://github.com/rochucky">Rodrigo Alves</a></h2>
        </div>
      </footer>
    </div>
  <?php else: ?>
    <div class="busca">
      <div class="centered-logo">
        <img src="images/logo.png" alt="">
      </div>
      <form>
        <input type="text" placeholder="Digite o nome do remédio" name="search" class="searchInput" value="<?= $searchspec ?>">
        <input type="hidden" name="order" value="<?= $order ?>">
        <input type="hidden" name="lat" value="<?= $lat ?>">
        <input type="hidden" name="long" value="<?= $long ?>">
        <button class="searchButton">Buscar</button>
      </form>
    </div>
  <?php endif; ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/index.js"></script>
</html>