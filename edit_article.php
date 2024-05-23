<!DOCTYPE html>
<html lang="en">

<?php require_once './handlers/article_data_handler.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_formulaire.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/header.css">
</head>

<body>

    <?php require 'header.php' ?>
    <div class="container mt-5">

        <!-- Bloc Article -->
        <div class="card mb-4">
            <div class="card-header">
                Article : <?= $article['titre']; ?>
            </div>
            <div class="card-body">
                <p><?= $article['contenu']; ?></p>
            </div>
        </div>

        <!-- Derniers commentaires -->
        <div class="card mb-4">
            <div class="card-header">
                Derniers commentaires :
            </div>
            <?php foreach ($comments as $comment) : ?>
                <div class="card-body">
                    <p class="author"><?= $comment['auteur'] ?></p>
                    <p class="content"><?= $comment['contenu'] ?></p>
                    <p class="creation-date"><?= $comment['date_creation'] ?></p>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <?php if ($comment['auteur'] == $_SESSION['username'] || $article['auteur'] == $_SESSION['username']) : ?>
                            <form action="./handlers/comment_handler.php" method="POST">
                                <input type="hidden" name="commentId" value="<?= $comment['id_commentaire'] ?>">
                                <input type="hidden" name="articleId" value="<?php if (!empty($_GET)) {echo htmlspecialchars($_GET['id']);} ?>">
                                <button type="submit" class="btn btn-primary" id="delete">Supprimer</button>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                Actions :
                <div>
                    <button class="btn btn-primary" id="save">Modifier</button>
                    <button class="btn btn-danger" id="supprPubli">Supprimer la publication et les commentaires</button>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>