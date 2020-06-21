<?php require_once __DIR__ . "/../config/parameters.php";
session_start();

if (isset($_SESSION["id"])){
    $user = getAllEntities("user", $_SESSION["id"]);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Salutem - Maison médicale</title>
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="sign-in">

<header>
    <div class="header-top">
        <div class="container">
            <div class="social-networks">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
            <div class="contact-infos">
                <ul>
                    <li>
                        <i class="fa fa-phone"></i>
                        <a href="tel:0243785462">0243785462</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:contact@salutem.fr">contact@salutem.fr</a>
                    </li>
                    <li>|</li>
                        <?php if (isset($user)) : ?>
                            <li>
                                <i class="fa fa-user"></i>
                                <?= $user["email"]; ?>
                            </li>

                        <li>
                              <i class="fa fa-sign-out"></i>
                            <a href="<?=SITE_URL;?>admin/logout.php">Déconnexion</a>
                         </li>
                        <?php else : ?>
                    <li>
                        <i class="fa fa-sign-in"></i>
                        <a href="<?=SITE_URL;?>admin/login.php">Connexion</a>
                    </li>
                        <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="logo">
                <i class="fa fa-heartbeat"></i>
                Salutem
            </div>
            <div class="status">
                Votre centre est actuellement <span class="open">ouvert</span>
            </div>
        </div>
    </div>

    </div>
</header>

<main>
    <?php require_once __DIR__  . "/menu.php"; ?>