<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription et Connexion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/creator_article_style.css" rel="stylesheet"> 
</head>

<body>
    <div class="container form-container">
        <h1 class="text-center mt-5">Inscription et Connexion</h1>
        <div class="row mt-5 d-flex justify-content-between">
            <!-- Bloc d'inscription -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Inscription</h2>
                    </div>
                    <div class="card-body">
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="register_username">Nom d'utilisateur :</label>
                                <input type="text" class="form-control" id="register_username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="register_email">Email :</label>
                                <input type="email" class="form-control" id="register_email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="register_password">Mot de passe :</label>
                                <input type="password" class="form-control" id="register_password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bloc de connexion -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Connexion</h2>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="login_username">Nom d'utilisateur :</label>
                                <input type="text" class="form-control" id="login_username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="login_password">Mot de passe :</label>
                                <input type="password" class="form-control" id="login_password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-success">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
