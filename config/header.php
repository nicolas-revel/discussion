<header>
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="<?= $root_index . 'index.php' ?>">Mon site</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="<?= $root_index . 'index.php' ?>">Accueil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $root_pages . 'inscription.php' ?>">Inscription</a>
        </li>
      </ul>
      <?php if (empty($_SESSION)) : ?>
        <a href="<?= $root_pages . 'connexion.php' ?>"><button class="btn btn-outline-success my-2 my-sm-0">Se connecter</button></a>
      <?php else : ?>
        <a href="<?= $_SERVER['PHP_SELF'] . '?d' ?>"><button class="btn btn-outline-danger my-2 my-sm-0">Se déconnecter</button></a>
      <?php endif ?>
    </div>
  </nav>
</header>