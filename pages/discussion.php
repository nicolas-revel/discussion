<?php

$root_index = '../';
$root_pages = '';
$root_config = '../config/';

require_once($root_config . 'config.php');

if (isset($_GET['d'])) {
  session_destroy();
}

?>
<!doctype html>
<html lang="fr">

<head>
  <title>Discussion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <?php require_once($root_config . 'header.php') ?>
  <main class="vh-50">
    <div class="w-50" style="overflow: scroll; height : 30em;">
      <?php ?>
    </div>
    <div class="container">
      <form action="connexion.php" method="post">
        <div class="form-group">
          <label for="message">Votre message :</label>
          <input type="text" name="message" id="message" class="form-control" placeholder="Votre message ici ..." aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-dark">Envoyer</button>
      </form>
    </div>
  </main>
  <!-- Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>