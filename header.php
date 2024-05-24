<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<header class="custom-header">
  <nav class="navbar navbar-expand-lg custom-nav bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="img/spam!.png" alt="Logo" width="150" height="100" class="d-inline-block align-top">
      </a>
      <a class="navbar-brand" href="index.php">Accueil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 custom-nav-ul">
          <?php if (empty($_SESSION['username'])) : ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="login.php">Connexion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="register.php">S'inscrire</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="create_article.php">Créer son article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="user_articles.php?user=<?= htmlspecialchars($_SESSION['username']) ?>">Mes articles</a>
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
