<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Créer un article</h1>
        <form action="submit_article.php" method="post">
            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Contenu :</label>
                <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="author">Auteur :</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='create_article.html';">Annuler</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
