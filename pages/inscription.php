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
<html lang="fr" class="h-100">

<head>
  <title>Inscription</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?= $root_css ?>custom.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column justify-content-between">

  <?php require_once($root_config . 'header.php') ?>
  <main class="h-100 d-flex flex-column justify-content-around align-items-center">
    <?php if (empty($_SESSION)) : ?>
      <div class="container w-50 p-4 rounded d-flex flex-column">
        <h2 class="mb-4">Inscrivez-vous !</h2>
        <form action="inscription.php" method="post" class="w-75 align-self-center">
          <div class="form-group">
            <label for="login">Trouvrez un bon nom d'utilisateur : </label>
            <input type="text" name="login" id="login" class="form-control" placeholder="Votre bon nom d'utilisateur ici" aria-describedby="helpId" autofocus required>
          </div>
          <div class="form-group">
            <label for="password">Créez un bon mot de passe : </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Votre bon mot de passe ici" required>
          </div>
          <div class="form-group">
            <label for="c_password">Confirmez votre bon mot de passe :</label>
            <input type="password" class="form-control" name="c_password" id="c_password" placeholder="Confirmez votre bon mot de passe" required>
          </div>
          <button type="submit" class="btn btn-dark mb-4">M'inscrire</button>
          <?php if (isset($verif_user) && $verif_user === false) : ?>
            <div class="alert alert-danger">Mince ! Il semblerait que ce nom d'utilisateur soit déjà pris ... Tu en as un autre en tête ?</div>
          <?php endif; ?>
          <?php if (isset($verif_pwd) && $verif_pwd === false) : ?>
            <div class="alert alert-danger">Ah tu n'as pas bien confirmé ton bon mot de passe, réessaye !</div>
          <?php endif; ?>
        </form>
      </div>
    <?php else : ?>
      <div class="container d-flex flex-column align-self-center">
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