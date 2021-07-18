<?php

include 'config.php';
require_once '../classes/database.php';

session_start();

date_default_timezone_set('America/Fortaleza');

$data = json_decode(file_get_contents('php://input'));
$options = [
  'cost' => 11,
  'salt' => '72026745460b415ba9be446.22938725',
];
$pass = password_hash($data->password, PASSWORD_BCRYPT, $options);

$db = new Database();
$user = $db->logInUser($data->username, $pass);

if($user['user_type_id'] == 3) {
  $userData = $db->getDrugstore($user['id']);
}
else{
  $userData = $db->getClient($user['id']);
}
if($user){
  $_SESSION['user'] = array_merge($user, $userData);

  $response = [
    'status' => 'success',
    'data' => ['username' => $user['username'], 'user_type' => $user['user_type_id']]
  ];
}
else{
  $response = [
    'status' => 'error',
    'message' => 'Usuário ou senha incorretos.'
  ];
}


die(json_encode($response));


?>