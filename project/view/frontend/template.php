<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Le mariage d'Éléonore et de Florian est prévu pour le 17/09/2022.">
    <link rel="shortcut icon" href="img/coeurs.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title><?= $title ?></title>
</head>

<body>
    <header class="navigation">
        <!--Header + Navigation bar -> voir pour rendre le nav en hamburger en mode mobile et modifier les liens + Mettre un logo-->

        <nav>

            <ul class="navLeft">
                <li><a href="#history">Notre histoire</a></li>
                <li><a href="#townHall">Lieux</a></li>
            </ul>

            <div class="navImgContainer">
                <a class="navImg" href="#"><img src="/img/logo.png" alt="logo du site" height="90px"></a>
            </div>

            <ul class="navRight">
                <li><a href="#formTitle">Je réponds à l'invitation</a></li>
                <li><a href="#">Je poste mes photos</a></li>
                <!--Ajouter la fonctionnalité aux visiteurs d'ajouter et voir les photos du mariage sur une autre page-->
            </ul>

        </nav>

        <hgroup>
            <h1 class="maried"> <span class="h1Group"><span class="h1Ele">ELEONORE</span> <span class="h1And">&</span> <span class="h1Florian">FLORIAN</span></span></h1>
        </hgroup>

    </header>
    <?= $content ?>
</body>

</html>