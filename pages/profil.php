<?php

$root_index = '../';
$root_pages = '';
$root_config = '../config/';
$root_img = "../img/";
$root_css = "../css/";

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
  header('Location:' . $root_index . 'index.php');
  exit;
}

?>
<!doctype html>
<html lang="fr" class="h-100">

<head>
  <title>Mon profil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?= $root_css ?>custom.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column justify-content-between">
  <?php require_once($root_config . 'header.php') ?>
  <main class="h-100 d-flex flex-column justify-content-around align-items-center">
    <?php if (!empty($_SESSION)) : ?>
      <div class="container w-50 p-4 rounded d-flex flex-column">
        <h2 class="mb-4">Ton bon profil</h2>
        <form action="profil.php" method="post" class="w-75 align-self-center">
          <div class="form-group">
            <label for="login" class="mb-3">
              Votre bon nom d'utilisateur :
              <?php if (!empty($_SESSION['login'])) : echo $_SESSION['login'];
              endif ?>
            </label>
            <input type="text" name="login" id="login" class="form-control" placeholder="Changer pour un meilleur nom d'utilisateur ?" aria-describedby="helpId" autofocus>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Entrez votre bon mot de passe" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Mettre à jour votre bon mot de passe">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="c_password" id="c_password" placeholder="Confirmer votre nouveau bon mot de passe">
          </div>
          <button type="submit" class="btn btn-dark">Mettre à jour</button>
          <?php if (isset($verif_user) && $verif_user === false) : ?>
            <div class="alert alert-danger mt-3">Mince ! Il semblerait que ce nom d'utilisateur soit déjà pris ... Tu en as un autre en tête ?</div>
          <?php endif; ?>
          <?php if (isset($verif_pwd) && $verif_pwd === false) : ?>
            <div class="alert alert-danger mt-3">Ah tu n'as pas bien confirmé ton bon mot de passe, réessaye !</div>
          <?php endif; ?>
          <?php if (isset($verif_old) && $verif_old === false) : ?>
            <div class="alert alert-warning mt-3">Attention du dois indiquer ton bon mot de passa actuel pour valider les modification !</div>
          <?php endif; ?>
        </form>
      </div>
    <?php else : ?>
      <div class="container d-flex flex-column">
        <div class="alert alert-warning align-self-center">Oh vous avez dû vous égarer ! On se charge de vous renvoyer vers le bon chemin ne vous en faites pas.</div>
      </div>
      <?php header('refresh:3,' . $root_index . 'index.php'); ?>
    <?php endif; ?>
  </main>
  <?php require_once($root_config . 'footer.php') ?>
  <!-- Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>