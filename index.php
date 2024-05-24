<!DOCTYPE html>
<html lang="fr">

<?php require_once './handlers/article_data_handler.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style_card_article.css">


    <title>Page d'accueil</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <h1>Le Blog POP'Culture , où tu te tiens au JUS !</h1>
    <main class="container mt-5">
        <div class="row">
            <?php foreach ($articles as $article) : ?>
                <div class="col-md-4 mb-4 card-container">
                    <div class="card" data-article-id="<?= htmlspecialchars($article['id_article']); ?>">
                        <div class="card-body">
                            <div class="cardCategorie">
                                <h5 class="titreCategorie"><?= htmlspecialchars($db->getCategoryName($article['categorie_id'])); ?></h5>
                            </div>
                            <h5 class="card-title"><?= htmlspecialchars($article['titre']); ?></h5>
                            <?php
                            // Longueur max du nombre de caractères (à voir combien on voudra)
                            $maxLength = 100;
                            $content = htmlspecialchars($article['contenu']);
                            //mb_strlen : prend en compte tous les caractère
                            if (mb_strlen($content) > $maxLength) {
                                // mb_substre lit une sous chaîne en partant de 0 jusqu'au max caractères
                                $content = mb_substr($content, 0, $maxLength) . '...';
                            }
                            ?>
                            <!-- nl2br insère un retour à la ligne HTML à chaque nouvelle ligne -->
                            <p class="card-text"><?= nl2br($content); ?></p>
                            <!-- Au clic sur lire la suite, redirige vers l'article -->
                            <div class="button-container">
                            <a href="details_article.php?id=<?= htmlspecialchars($article['id_article']); ?>" class="btn btn-primary">Lire la suite</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php require 'footer.php'; ?>
    
    <script src="https://kit.fontawesome.com/51314cf778.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>