<?php
require_once('/wamp64/www/D3vFl0w.github.io/project/controller/frontend.php');
sessionVerify()
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Le mariage d'Éléonore et de Florian est prévu pour le 17/09/2022.">
    <link rel="shortcut icon" href="img/coeurs.png" type="image/x-icon">
    <link rel="stylesheet" href="public/css/styles.css">
    <title><?= $title ?></title>
</head>

<body>
    <header class="navigation">
        <!--Header + Navigation bar -> voir pour rendre le nav en hamburger en mode mobile et modifier les liens + Mettre un logo-->

        <nav>

            <ul class="navLeft">
                <li><a href="index.php?action=home#history">Notre histoire</a></li>
                <li><a href="index.php?action=accommodation">Hébergements</a></li>
            </ul>

            <div class="navImgContainer">
                <a class="navImg" href="index.php?action=index"><img src="../../public/img/logo.png" alt="logo du site" height="90px"></a>
            </div>

            <ul class="navRight">
                <li><a href="index.php?action=form">Je réponds à l'invitation</a></li>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li><a href="index.php?action=unset">Déconnexion</a></li>
                <?php endif ?>
                <!-- <li><a href="index.php?action=pictures">Photos</a></li> -->
                <!--Ajouter la fonctionnalité aux visiteurs d'ajouter et voir les photos du mariage sur une autre page-->
            </ul>

        </nav>

    </header>
    <?= $content ?>
</body>

</html>