<!DOCTYPE html>
<html lang="fr">

<?php require_once './handlers/article_data_handler.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Page d'accueil</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <main class="container mt-5">
        <div class="row">
            <?php foreach($articles as $article): ?>
            <div class="col-md-4 mb-4">
                <div class="card" data-article-id="<?= htmlspecialchars($article['id_article']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($article['titre']); ?></h5>
                        <p class="card-text"><?= nl2br(htmlspecialchars($article['contenu'])); ?></p>
                        <a href="details_article.php?id=<?= htmlspecialchars($article['id_article']); ?>" class="btn btn-primary">Lire la suite</a>
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
