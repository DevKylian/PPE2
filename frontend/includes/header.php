<?php session_start() ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord | PPE2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link type="text/css" rel="stylesheet" href="css/structure.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/all.css">
    <link rel="shortcut icon" href="images/favicon.png">
</head>
<body>
<div class="loader-wrap"></div>
<div id="main">
    <header class="main-header dark-header fs-header sticky">
        <div class="header-inner">
            <div class="logo-holder main-logo">
                <a href="dashboard.php">
                    <h3><span>PPE<strong>2</strong></span></h3>
                </a>
            </div>
            <div class="header-user-menu">
                <div class="header-user-name">
                    <span><img src="images/avatar/avatar.png" alt=""></span> Bonjour, <?php if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo 'Invité';
                    } ?>
                </div>
                <?php if (isset($_SESSION['username'])) {
                    echo "
                <ul>
                    <li><a href='../profil.php'> Mon Profil</a></li>
                    <li><a href='/PPE2/frontend/logout.php'> Se Déconnecter</a></li>
                </ul>";
                }
                ?>
            </div>
            <?php if (!isset($_SESSION['username'])) {
                echo "
            <div class='show-reg-form'>            
            <a href='login.php' class='btn-auth color-bg flat-btn'>Connexion
                <i class='fa fa-sign-in'></i></a>
                ou
            <a href='register.php' class='btn-auth color-bg flat-btn'>Inscription
                <i class='fa fa-sign-in'></i></a>
            </div>";
            }
            ?>
            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <div class="nav-holder main-menu">
                <nav>
                    <ul>
                        <li>
                            <a href="dashboard.php">Accueil</a>
                        </li>
                        <li>
                            <a href="memberlist.php">Liste des Membres <i class="fa fa-caret-down"></i></a>
                            <ul>
                                <li><a href="">Sous Menu</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </header>
