<?php

include 'config.php';
require_once 'classes/database.php';

$db = new Database();

$product = $db->getRemedio($_GET['id']);

$location = file_get_contents("http://maps.google.com/maps?q=".str_replace(' ','+',$product['endereco'].' '.$product['bairro']));



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rede Remédio - <?= $product['description'] ?></title>
  <link rel="stylesheet" href="style/produto.min.css">
</head>
<body>
  <div class="top">
    <h2><a href="javascript:history.back()">Voltar</a></h2>
  </div>
  <div class="product">
    <div class="image">
      <img src="<?= $product['imageurl'] ?>" alt="" />
    </div>
    <div class="description">
      <p class="title"><?= $product['description'] ?></p>
      <p class="price">R$ <?= str_replace('.',',', $product['price']) ?></p>
      <p class="sub"><?= $product['farmacia'] ?></p>
      <p class="sub"><?= $product['endereco'].' - '.$product['bairro'].' - '.$product['cidade'] ?></p>
      <div class="buttons">
        <a href="<?= $product['url'] ?>" class="blue" target="_blank">Ir para website</a>
        <a href="http://maps.google.com/maps?q=<?= str_replace(' ','+',$product['endereco'].' '.$product['bairro']) ?>" class="blue" target="_blank">Ver no mapa</a>
      </div>
    </div>
  </div>
</body>
</html>