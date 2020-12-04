<?php

$root_index = '../';
$root_pages = '';
$root_config = '../config/';
$root_css = "../css/";
$root_img = "../img/";

require_once($root_config . 'config.php');

$users = list_users($DB_connect, $DB_user, $DB_pwd);

$connexion_state = connex_account($users);

if ($connexion_state) {
  header('Location:' . $root_index . 'index.php');
  exit;
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
  <title>Connexion</title>
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
        <h2 class="mb-4">Connectez-vous !</h2>
        <form action="connexion.php" method="post" class="w-75 align-self-center">
          <div class="form-group">
            <label for="login">Votre bon nom d'utilisateur : </label>
            <input type="text" name="login" id="login" class="form-control" placeholder="Votre bon nom d'utilisateur ici" aria-describedby="helpId" autofocus required>
          </div>
          <div class="form-group">
            <label for="password">Votre bon mot de passe : </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Votre bon mot de passe ici" required>
          </div>
          <button type="submit" class="btn btn-dark mb-4">Connexion</button>
          <?php if (isset($connexion_state) && $connexion_state === false) : ?>
            <div class="alert alert-danger">Ah il semblerait que tu n'ais pas rentré le bon nom d'utilisateur ou le bon mot de passe, réessayes pour voir ..?</div>
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