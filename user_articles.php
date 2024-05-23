<!DOCTYPE html>
<html lang="fr">

<?php require_once './handlers/user_article_data_handler.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style_card_article.css">

    <title>Page d'accueil</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <h1>Mes Articles</h1>
    <main class="container mt-5">
        <div class="row">
            <?php foreach ($userArticles as $article) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card" data-article-id="<?= htmlspecialchars($article['id_article']); ?>">
                        <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($db->getCategoryName($article['categorie_id'])); ?></h5>
                            <h5 class="card-title"><?= htmlspecialchars($article['titre']); ?></h5>
                            <?php
                            $maxLength = 100;
                            $content = htmlspecialchars($article['contenu']);
                            if (mb_strlen($content) > $maxLength) {
                                $content = mb_substr($content, 0, $maxLength) . '...';
                            }
                            ?>
                            <p class="card-text"><?= nl2br($content); ?></p>
                            
                            <div class="d-flex justify-content-between">
                                <a href="edit_article.php?id=<?= htmlspecialchars($article['id_article']); ?>" class="btn btn-primary">Modifier</a>
                                <a href="./handlers/delete_article_handler.php?id=<?= htmlspecialchars($article['id_article']); ?>" class="btn btn-danger" id="delete">🗑</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php require 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>