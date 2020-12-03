<?php

$root_index = '../';
$root_pages = '';
$root_config = '../config/';

require_once($root_config . 'config.php');

$users = list_users($DB_connect, $DB_user, $DB_pwd);

if (!empty($_POST['login'])) {
  $verif_user = check_user($users);
}
if (!empty($_POST['password'])) {
  $verif_pwd = check_password($_POST['password'], $_POST['c_password']);
}
if (isset($verif_pwd, $verif_user)) {
  if ($verif_pwd === true && $verif_user === true) {
    $crea_user = crea_account($DB_connect, $DB_user, $DB_pwd);
  }
}

if (isset($crea_user) && $crea_user === true) {
  header('Location:connexion.php');
}

?>
<!doctype html>
<html lang="fr">

<head>
  <title>Inscription</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <?php require_once($root_config . 'header.php') ?>

  <div class="container">
    <form action="inscription.php" method="post">
      <div class="form-group">
        <label for="login">Créez votre nom d'utilisateur : </label>
        <input type="text" name="login" id="login" class="form-control" placeholder="Nom d'utilisateur" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="password">Créez votre mot de passe : </label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
      </div>
      <div class="form-group">
        <label for="c_password">Confirmez votre mot de passe :</label>
        <input type="password" class="form-control" name="c_password" id="c_password" placeholder="Confirmation mot de passe">
      </div>
      <button type="submit" class="btn btn-dark">M'inscrire</button>
    </form>
  </div>

  <!-- Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>