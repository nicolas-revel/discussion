<?php

$root_index = '../';
$root_pages = '';
$root_config = '../config/';

require_once($root_config . 'config.php');

$users = list_users($DB_connect, $DB_user, $DB_pwd);

if (!empty($_POST['login'])) {
  $verif_user = check_user($users);
} else {
  $verif_user = null;
}

if (!empty($_POST['password'])) {
  $verif_pwd = check_password($_POST['password'], $_POST['c_password']);
} else {
  $verif_pwd = null;
}

if (!empty($_POST['old_password'])) {
  $verif_old = check_old_pwd($DB_connect, $DB_user, $DB_pwd);
  if ($verif_old === true) {
    upd_account($DB_connect, $DB_user, $DB_pwd, $verif_user, $verif_pwd);
  }
}

if (isset($_GET['d'])) {
  session_destroy();
}

?>
<!doctype html>
<html lang="fr">

<head>
  <title>Mon profil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <?php require_once($root_config . 'header.php') ?>

  <div class="container">
    <form action="profil.php" method="post">
      <div class="form-group">
        <label for="login">
          Nom d'utilisateur :
          <?php if (!empty($_SESSION['login'])) : echo $_SESSION['login'];
          endif ?>
        </label>
        <input type="text" name="login" id="login" class="form-control" placeholder="Mettre à jour votre nom d'utilisateur" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Votre ancien mot de passe">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Mettre à jour votre mot de passe">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="c_password" id="c_password" placeholder="Confirmer votre nouveau mot de passe">
      </div>
      <button type="submit" class="btn btn-dark">Connexion</button>
    </form>
  </div>

  <!-- Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>