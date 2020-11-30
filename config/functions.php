<?php

require_once('db-config.php');

$DB_connect = 'mysql:host=localhost;dbname=discussion';

function list_users($db, $user, $password)
{
  $pdo = new PDO($db, $user, $password);
  $query = $pdo->query('SELECT * FROM utilisateurs');
  if ($query === false) {
    var_dump($pdo->errorInfo());
    die('Erreur SQL');
  }
}
