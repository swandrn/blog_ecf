<!DOCTYPE html>
<html lang="fr">

<?php require_once './handlers/article_data_handler.php' ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Page d'accueil</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Liste des articles</a></li>
                <li><a href="create_article.php">Créer un article</a></li>
                <li><a href="edit_article.php">Editer un article</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php foreach($articles as $article):  ?>
        <div class="article">
            <h2><?= htmlspecialchars($article['titre']); ?></h2>
            <p><?= htmlspecialchars($article['contenu']); ?></p>
        </div>
        <?php endforeach; ?>
    </main>
    <footer>
        <p>&copy; 2024</p>
    </footer>
</body>

</html>