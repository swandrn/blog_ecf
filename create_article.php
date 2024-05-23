<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_formulaire.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/header.css">
</head>

<body>
    <?php require 'header.php' ?>
    <div class="page-container">
        <div class="form-container">
            <h1 class="text-center mb-4">Créer un article</h1>
            <form action="./handlers/creation_form_handler.php" method="POST">
                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="content">Contenu :</label>
                    <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="categories">Catégories :</label>
                    <select class="form-control" id="categories" name="categoryId" multiple required>
                        <option value="1">Technologie</option>
                        <option value="2">Santé</option>
                        <option value="3">Science</option>
                        <option value="4">Éducation</option>
                        <option value="5">Voyage</option>
                    </select>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Actions :</span>
                            <div>
                                <button type="submit" class="btn btn-success" id="save">Enregistrer</button>
                                <button type="button" class="btn btn-danger" id="cancel" onclick="window.location.href='create_article.php';">Annuler</button>
                            </div>
                        </div>
                    </div>
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