<?php

function list_users($db, $user, $pwd)
{
  $pdo = new PDO($db, $user, $pwd);
  $query = $pdo->query("SELECT * FROM `utilisateurs`");
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function check_password(string $str1, string $str2)
{
  if (isset($str1, $str2)) {
    if ($str1 !== $str2) {
      return false;
    } else {
      return true;
    }
  }
}

function check_user(array $table)
{
  foreach ($table as $user) {
    if ($user['login'] === $_POST['login']) {
      return false;
    }
  }
  return true;
}

function set_user($user)
{
  if (!empty($user)) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['login'];
    $_SESSION['password'] = $user['password'];
    return ($_SESSION);
  }
}

function crea_account($db, $user, $pwd)
{
  if (
    !empty($_POST['login']) &&
    !empty($_POST['password']) &&
    !empty($_POST['c_password'])
  ) {
    $login = htmlspecialchars($_POST['login']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $pdo = new PDO($db, $user, $pwd);
    $pdo->query("INSERT INTO `utilisateurs` (`login`, `password`) VALUES ('$login', '$password')");
    return true;
  }
}

function connex_account(array $table1)
{
  if (!empty($_POST)) {
    $str1 = $_POST['password'];
    foreach ($table1 as $user) {
      $verifstr1 = password_verify($str1, $user['password']);
      if (($_POST['login']) == ($user['login']) && ($verifstr1) == true) {
        set_user($user);
        return true;
        break;
      } else {
      }
    }
    return false;
  }
}

function check_old_pwd($db, $user, $pwd)
{
  $id = $_SESSION['id'];
  $pdo = new PDO($db, $user, $pwd);
  $query = $pdo->query("SELECT `password` FROM `utilisateurs` WHERE id = '$id'");
  $result = $query->fetch(PDO::FETCH_ASSOC);
  if (!empty($_POST['old_password'])) {
    $check_old_pass = password_verify($_POST['old_password'], $result['password']);
    if (isset($check_old_pass)) {
      return true;
    } else {
      return false;
    }
  }
}

function upd_account($db, $user, $pwd, $check_user, $check_pass)
{
  if (!empty($_POST)) {
    if (!empty($_POST['login']) && $check_user === true) {
      $_SESSION['login'] = htmlspecialchars($_POST['login']);
    }
    if (!empty($_POST['password']) && $check_pass === true) {
      $_SESSION['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }
    $id = $_SESSION['id'];
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $pdo = new PDO($db, $user, $pwd);
    $pdo->query("UPDATE `utilisateurs` SET `login`= '$login',`password`= '$password' WHERE `id`='$id'");
  }
}

function add_message($db, $user, $pwd)
{
  $message = htmlspecialchars($_POST['message']);
  $id_utilisateur = htmlspecialchars($_SESSION['id']);
  $pdo = new PDO($db, $user, $pwd);
  $pdo->query("INSERT INTO `messages`(`message`, `id_utilisateur`, `date`) VALUES ('$message','$id_utilisateur', NOW())");
}

function list_message($db, $user, $pwd)
{
  $pdo = new PDO($db, $user, $pwd);
  $query = $pdo->query("SELECT messages.id, message, id_utilisateur, utilisateurs.login, date FROM messages INNER JOIN utilisateurs ON messages.id_utilisateur = utilisateurs.id ORDER BY messages.id ASC");
  if ($query) {
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
