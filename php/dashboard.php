<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../php/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Ligue 1 McDonalds</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
                <a href="logout.php">DÉCONNEXION</a>
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

    <main class="dashboard-content">
        <section class="welcome-section">
            <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['user']); ?> 👋</h1>
            <p>Voici votre tableau de bord.</p>
        </section>

        <section class="cards-grid">
            <div class="card">
                <h2>Classement</h2>
                <p>Voir le classement en temps réel.</p>
                <a href="../php/classement.php">Voir →</a>
            </div>
            <div class="card">
                <h2>Résultats</h2>
                <p>Voir les résultats des dernières journées.</p>
                <a href="../php/resultatjournee.php">Voir →</a>
            </div>
            <div class="card">
                <h2>Calendrier</h2>
                <p>Consultez les prochains matchs.</p>
                <a href="../html/calendrier.html">Voir →</a>
            </div>
        </section>
    </main>

</body>
</html>
