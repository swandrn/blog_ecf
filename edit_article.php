<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/edit_article.css">
    <title>Modifier un article</title>
</head>

<body>
    <!-- <header>
        <nav>
            <ul>
                <li><a href="index.php">Liste des articles</a></li>
                <li><a href="create_article.php">Créer un article</a></li>
            </ul>
        </nav>
    </header> -->
    <?php require 'header.php' ?>
    <main>
        <div class="article">
            <h2>Article 1 (extrait)</h2>
            <p>Appuyer ici pour editer votre article</p>
        </div>
    </main>
    <?php require 'footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>