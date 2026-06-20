<?php
require_once __DIR__ . '/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ligue 1 McDonalds</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <style type="text/css">
        * { padding: 0; margin: 0; box-sizing: border-box; }
        .hero-section {
            width: 100%;
            height: 100vh;
            background:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.2)),url('assets/images/stade.jpg');
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
        }
        nav{
            width: 100%;
            height: 100px;
            color: white;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .logo {
    text-decoration: none;
    font-size: 2.5em;
    font-weight: bold;
    letter-spacing: 3px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #FFD700; /* or another bright color like #00FFFF or #FF4500 */
    text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
    transition: transform 0.3s ease, color 0.3s ease;
}

.logo:hover {
    transform: scale(1.05);
    color: #ffffff;
}
        .menu a{
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            font-size: 20px;
            position: relative;
        }
        .menu a:before{
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            border-bottom: 2px solid aliceblue;
            transition: 0.4s linear;
        }
        .menu a:hover:before{
            width: 90%;
        }
        .register a:hover{
            background: transparent;
            border:1px solid antiquewhite;
        }
        .register a{
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            font-size: 20px;
            background: black;
            border-radius: 8px;
            transition: 0.4s;
        }
        .h-txt{
            max-width: 650px;
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
            text-align: center;
            color: white;
        }
        .h-txt span{
            letter-spacing: 5px;
        }
        .h-txt h1 {
            font-size:3.5em ;
        }
        .h-txt a{
            font-family: sans-serif;
            text-decoration: none;
            background:antiquewhite;
            color: black;
            padding: 10px 20px;
            letter-spacing: 5px;
            transition: 0.4s ;
        }
        .h-txt a:hover{
              background: transparent;
            border:1px solid aliceblue;
        }
    </style>
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

    <section class="hero-section">
        <section class="h-txt">
            <span>Ligue 1</span>
            <h1>Classement de la saison 2024-2025</h1>
            <br>
            <a href="saison.php">Voir le Classement</a>
        </section>
    </section>
</body>
</html>
