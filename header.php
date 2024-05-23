<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Derniers articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="create_article.php">Créer son article</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catégories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Technologie</a></li>
            <li><a class="dropdown-item" href="#">Santé</a></li>
            <li><a class="dropdown-item" href="#">Science</a></li>
            <li><a class="dropdown-item" href="#">Education</a></li>
            <li><a class="dropdown-item" href="#">Voyage</a></li>
          </ul>
        </li>
        <!-- Si pas connecté => connexion si connecté => Déconnexion + accès à la page Mes articles -->
        <?php if(empty($_SESSION['username'])): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Connexion</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="edit_article.php">Editer un article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./handlers/logout_handler.php">Déconnexion</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
</header>
