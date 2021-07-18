<?php

include 'config.php';
require_once '../classes/database.php';

date_default_timezone_set('America/Fortaleza');

$data = (object) $_POST;
$options = [
  'cost' => 11,
  'salt' => '72026745460b415ba9be446.22938725',
];
$pass = password_hash($data->password, PASSWORD_BCRYPT, $options);

$db = new Database();

$duplicated = $db->getUserByUsername($data->username);

if($duplicated){
  $response = [
    'success' => false,
    'message' => 'Email já foi cadastrado!'
  ];
}
else {
  $user_id = $db->createUser($data->username, $pass, $data->user_type_id);
  if($data->user_type_id === '2'){
    $response = $db->createClient($user_id, $data->name);
  }
  if($data->user_type_id === '3') {
    $response = $db->createDrugstore($user_id, $data->name, $data->cnpj);
  }
}

die(json_encode($response));

?>