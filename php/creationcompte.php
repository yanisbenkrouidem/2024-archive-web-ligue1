<?php
session_start();

$inscriptionMessage = "";
$connexionMessage = "";

// Connexion à la base de données
require_once __DIR__ . '/db.php';

// Traitement de l'inscription
if (isset($_POST["btninscrit"])) {
    $pseudo = htmlspecialchars($_POST["txtuser"]);
    $mdp = $_POST["txtmdp"];

    $req = $bdd->prepare("SELECT pseudoutil FROM utilisateur WHERE pseudoutil = :pseudo");
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->execute();
    $uneligne = $req->fetch();

    if ($uneligne) {
        $inscriptionMessage = "<p style='color: red;'>Ce pseudo est déjà utilisé.</p>";
    } else {
        $req = $bdd->prepare("INSERT INTO utilisateur (pseudoutil, mdputil) VALUES (:pse, :mdp)");
        $req->bindParam(':pse', $pseudo, PDO::PARAM_STR);
        $req->bindParam(':mdp', $mdp, PDO::PARAM_STR);

        if ($req->execute()) {
            $inscriptionMessage = "<p style='color: #4CAF50;'>Inscription réussie !</p>";
        } else {
            $inscriptionMessage = "<p style='color: red;'>Échec de l'inscription.</p>";
        }
    }
}

// Traitement de la connexion
if (isset($_POST["btnconnect"])) {
    $pseudo = htmlspecialchars($_POST["username"]);
    $mdp = $_POST["password"];

    $req = $bdd->prepare("SELECT mdputil FROM utilisateur WHERE pseudoutil = :pseudo");
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->execute();
    $user = $req->fetch();

    if ($user && $mdp === $user["mdputil"]) {
        $_SESSION["user"] = $pseudo;
        header("Location: dashboard.php");
        exit();
    } else {
        $connexionMessage = "<p style='color: red;'>Identifiants incorrects.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter - Yanis Benkrouidem</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <script defer src="../js/login.js"></script>
</head>

<body>
    <!-- New Unified Navbar -->
    <header id="l1-navbar">
        <div class="l1-nav-top">
            <div class="l1-nav-top-left">
                <div class="l1-hamburger">
                    <span></span><span></span><span></span>
                </div>
                <a href="../index.html" class="l1-top-logo">LIGUE 1 MCDONALDS</a>
            </div>
            <div class="l1-nav-top-right">
                <a href="creationcompte.php">REWARDS</a>
                <a href="resultatjournee.php">ACTUALITÉS</a>
                <span class="l1-divider">|</span>
                <a href="#">FRANÇAIS</a>
                <span class="l1-divider">|</span>
                <a href="creationcompte.php">
                    <svg class="l1-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                </a>
            </div>
        </div>
        <div class="l1-nav-bottom">
            <a href="../index.html" class="l1-bottom-logo">
                <img src="../assets/imgs/ligue1.jpg" alt="Ligue 1 Logo">
            </a>
            <div class="l1-nav-bottom-links">
                <a href="../index.html">Accueil</a>
                <a href="resultatjournee.php">Matches</a>
                <a href="classement.php">Classements</a>
                <a href="../html/en-direct.html">En Direct</a>
                <a href="../html/calendrier.html">Calendrier</a>
            </div>
        </div>
    </header>

    <div class="container" id="container">
        <div class="form-container register-container">
            <form id="register-form" method="POST">
                <h1>S'inscrire</h1>
                <input type="text" name="txtuser" placeholder="Nom" required>
                <input type="password" name="txtmdp" placeholder="Mot de passe" required>
                <input type="submit" name="btninscrit" value="S'inscrire">
                <div id="inscription-message"><?php echo $inscriptionMessage; ?></div>
            </form>
        </div>

        <div class="form-container login-container">
            <form method="POST">
                <h1>Connectez-vous ici</h1>
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit" name="btnconnect">Se connecter</button>
                <div id="connexion-message"><?php echo $connexionMessage; ?></div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Amusez-vous bien !</h1>
                    <p>Si vous avez un compte, connectez-vous ici et amusez-vous</p>
                    <button class="ghost" id="login">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">Bienvenue sur la Ligue 1 McDonalds !</h1>
                    <p>Rejoignez-nous et commencez votre voyage</p>
                    <button class="ghost" id="register">Inscris-toi</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
