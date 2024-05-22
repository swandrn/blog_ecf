<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/creator_article_style.css" rel="stylesheet">
</head>

<body>
    <!-- <header>
        <nav>
            <ul>
                <li><a href="index.php">Liste des articles</a></li>
                <li><a href="edit_article.php">Editer un article</a></li>
                <li><a href="create_article.php">Créer un article</a></li>
            </ul>
        </nav>
    </header> -->
    <?php require 'header.php' ?> 
    <div class="container mt-5">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                Actions :
                <div>
                    <button class="btn btn-primary" id="save">Modifier</button>
                    <button class="btn btn-danger" id="supprPubli">Supprimer la publication et les commentaires</button>
                </div>
            </div>
        </div>

        <!-- Bloc Article -->
        <div class="card mb-4">
            <div class="card-header">
                Article :
            </div>
            <div class="card-body">
                <!-- Contenu de l'article -->
            </div>
        </div>

        <!-- Derniers commentaires -->
        <div class="card mb-4">
            <div class="card-header">
                Derniers commentaires :
            </div>
            <div class="card-body">
                <!-- Contenu des derniers commentaires -->
            </div>
        </div>

        <!-- Bloc Laisser un commentaire -->
        <div class="card mb-4">
            <div class="card-header">
                Laisser un commentaire :
            </div>
            <div class="card-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Commentaire :</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" id="save">Ajouter</button>
                        <button type="button" class="btn btn-secondary" id="cancel">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>