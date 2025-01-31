<header>
  <nav class="navbar navbar-expand-sm navbar-dark" id="navbar">
    <a class="navbar-brand ml-5" href="<?= $root_index . 'index.php' ?>"><img src="<?= $root_img ?>logo_unbonmoment.png"" alt=""></a>
    <button class=" navbar-toggler d-lg-none mr-4" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-5" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/discussion/index.php') : ?>active<?php endif; ?> ml-4">
            <a class="nav-link" href="<?= $root_index . 'index.php' ?>">Accueil</a>
          </li>
          <?php if (empty($_SESSION)) : ?>
            <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/discussion/pages/inscription.php') : ?>active<?php endif; ?> ml-4">
              <a class="nav-link" href="<?= $root_pages . 'inscription.php' ?>">Inscription</a>
            </li>
          <?php else : ?>
            <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/discussion/pages/profil.php') : ?>active<?php endif; ?> ml-4">
              <a class="nav-link" href="<?= $root_pages . 'profil.php' ?>">Mon profil</a>
            </li>
            <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/discussion/pages/discussion.php') : ?>active<?php endif; ?> ml-4">
              <a class="nav-link" href="<?= $root_pages . 'discussion.php' ?>">Fil de discussion</a>
            </li>
          <?php endif; ?>
        </ul>
        <?php if (empty($_SESSION)) : ?>
          <a href="<?= $root_pages . 'connexion.php' ?>"><button class="btn btn-outline-secondary my-2 my-sm-0 mr-5">Se connecter</button></a>
        <?php else : ?>
          <a href="<?= $_SERVER['PHP_SELF'] . '?d' ?>"><button class="btn btn-outline-secondary my-2 my-sm-0 mr-5">Se déconnecter</button></a>
        <?php endif ?>
      </div>
  </nav>
</header>