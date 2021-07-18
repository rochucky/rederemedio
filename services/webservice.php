<?php

require_once('webservice_functions.php');

session_start();

// *** Validate session:
if (!$_SESSION["user"]) {
  die('Bad Request');
}
$post = json_decode(file_get_contents('php://input'));

call_user_func($post->method, $post->params);


?>