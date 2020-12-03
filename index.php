<?php

require_once('config/config.php');

$root_index = '';
$root_pages = 'pages/';
$root_config = 'config/';
$root_css = "css/";
$root_img = "img/";

if (isset($_GET['d'])) {
  session_destroy();
  header('Location:' . $root_index . 'index.php');
  exit;
}

?>
<!doctype html>
<html lang="fr" class="h-100">

<head>
  <title>Accueil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= $root_css ?>custom.css">
</head>

<body class="h-100 d-flex flex-column justify-content-between">

  <?php require_once($root_config . 'header.php') ?>
  <main class="h-100 d-flex flex-column justify-content-around align-items-center">
    <?php if (empty($_SESSION)) : ?>
      <div class="container p-5 rounded-lg m-5">
        <h2 class="mb-5">Salut, on espère que tu vas passer un bon moment</h2>
        <p class="text-lead">Bienvenue sur notre site de fan de l'émission Un Bon Moment. Ce site n'a pas tellement pour but de présenter l'émission et son concept, mais plutôt de réunir tous les fans de l'émission sur un même site pour déchiffrer les énigmes de chaque épisode.</p>
        <p>Tu peux t'inscrire en cliquant sur l'onglet "Inscription" juste en haut, ou en <a href="<?= $root_pages ?>inscription.php">cliquant ici</a>.</p>
        <p>Si tu as déjà un compte, tu peux aussi te connecter directement via le bouton de connexion en haut à droite ou en <a href="<?= $root_pages ?>connexion.php">cliquant ici</a>.</p>
      </div>
    <?php else : ?>
      <div class="container">
        <h2>Salut <?= $_SESSION['login']; ?>, on espère que tu vas passer un bon moment</h2>
        <p>Re-Bienvenue sur notre site de fan de l'émission Un Bon Moment. Tu peux maintenant te balader sur notre site à commencer par aller sur le <a href="<?= $root_pages ?>discussion.php">chat de discussion</a> pour trouver les solution aux énigmes avec les autres utilisateurs !</p>
        <p>Tu peux aussi te rendre sur <a href="<?= $root_pages ?>profil.php">ton profil</a> si tu veux modifier tes informations, en mettant à jour ton nom d'utilisateur, ou en modifiant ton mot de passe.</p>
      </div>
    <?php endif; ?>
  </main>
  <?php require_once($root_config . 'footer.php') ?>
  <!-- Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>