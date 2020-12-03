<?php

$root_index = '../';
$root_pages = '';
$root_config = '../config/';

require_once($root_config . 'config.php');

$messages = list_message($DB_connect, $DB_user, $DB_pwd);

if (!empty($_POST['message'])) {
  add_message($DB_connect, $DB_user, $DB_pwd);
  header('Refresh:0');
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
  <title>Discussion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column justify-content-between">
  <?php require_once($root_config . 'header.php') ?>
  <main class="vh-50">
    <?php if (!empty($_SESSION)) : ?>
      <div class="container">
        <div style="overflow: scroll; height : 30em;">
          <?php if (!empty($messages)) : ?>
            <?php foreach ($messages as $message) : ?>
              <p>
                <?php $date = new DateTime($message['date']);
                echo $date->format('H:i'); ?>
                <?= $message['login'] . ' : ' . $message['message'] ?></p>
            <?php endforeach ?>
          <?php endif; ?>
        </div>
        <form action="discussion.php" method="post">
          <div class="form-group">
            <label for="message">Votre message :</label>
            <input type="text" name="message" id="message" class="form-control" placeholder="Votre message ici ..." aria-describedby="helpId">
          </div>
          <button type="submit" class="btn btn-dark">Envoyer</button>
        </form>
      </div>
    <?php else : ?>
      <div class="container d-flex flex-column">
        <div class="alert alert-dark align-self-center w-50">Ah désolé mais pour participer à la discussion de l'énigme, il faut vous créer un compte, ou vous connecter. Ne vous inquiétez pas, on se charge de vous rediriger.</div>
      </div>
      <?php header('refresh:4,' . $root_pages . 'connexion.php'); ?>
    <?php endif; ?>
  </main>
  <?php require_once($root_config . 'footer.php') ?>
  <!-- Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>