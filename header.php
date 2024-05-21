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
            <!-- A voir comment rediriger vers les articles spécifiques à chaque catégorie -->
            <li><a class="dropdown-item" href="#">Technologie</a></li>
            <li><a class="dropdown-item" href="#">Santé</a></li>
            <li><a class="dropdown-item" href="#">Science</a></li>
            <li><a class="dropdown-item" href="#">Education</a></li>
            <li><a class="dropdown-item" href="#">Voyage</a></li>
          </ul>
        </li>
      </ul>
<!-- A voir si on laisse la fonctionnalité rechercher... -->
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>
</header>