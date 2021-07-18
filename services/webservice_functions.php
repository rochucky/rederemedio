<?php

include('config.php');
include('../classes/database.php');

function saveClient($params) {
    $db = new database();

    $params = (Array) json_decode($params);

    $id = $params['id'];
    $user_type = $params['user_type'];
    $userParams = ['username' => $params['email']];

    unset($params['id']);
    unset($params['email']);
    unset($params['user_type']);

    if($user_type == 2){
      $response = $db->update('clients', $params, $id);
    }
    if($user_type == 3){
      $response = $db->update('drugstores', $params, $id);
    }
    if(!$response['success']){
      die(json_encode($response));
    }
    $response = $db->update('users', $userParams, $id);
    die(json_encode($response));
}

function getUser($params) {
  $db = new Database();

  if($params->user_type == 2){
    $response = $db->getClientData($params->id);
  }
  if($params->user_type == 3){
    $response = $db->getDrugstoreData($params->id);
  }

  die(json_encode($response));
}

function getProducts($params) {
  $db = new Database();

  $response = $db->query("select * from products where produto like '%$params->nome%' and apresentacao like '%$params->apresentacao%' order by produto", false);

  die(json_encode($response));
}

?>