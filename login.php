<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_formulaire.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <!-- <header>
        <nav>
            <ul>
                <li><a href="index.php">Liste des articles</a></li>
                <li><a href="edit_article.php">Editer un article</a></li>
            </ul>
        </nav>
    </header> -->
    <?php require 'header.php' ?>
    <div class="page-container">
        <div class="form-container">
            <h1 class="text-center mb-4">Connexion</h1>
            <form action="handlers/traitement_login.php" method="post">
                <div class="form-group">
                    <label for="email">Adresse e-mail :</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" id="login">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
    <?php require 'footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>