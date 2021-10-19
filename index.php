<?php
// Connexion à la base de donnée 
require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Le mariage d'Éléonore et de Florian est prévu pour le 17/09/2022.">
    <link rel="shortcut icon" href="img/coeurs.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title>Eléonore & Florian</title>
</head>

<body>

    <?php
    include("php/header.php");
    ?>

    <main>
        <!--There are seven sections on this page : #dateIMG ; #history ; #carousel ; #townHall ; #church ; #reception ; #form-->

        <section id="dateImg">
            <!--SECTION_1 Date-->

            <div class="backgroundDate">
                <h2> <span class="spanTitle">Nous nous marions !</span><br>
                    <span class="spanDate">
                        <!--17/09/2022-->
                    </span>
                </h2>
            </div>

        </section>

        <section id="history">
            <!--SECTION_2 welcome visitors-->

            <div class="historyContainer">

                <h2>Bienvenue à notre mariage ! ❤️</h2>
                <p>Et oui nous allons nous marier !<br>
                    Nous sommes sur un petit nuage et nous souhaitons partager tout ce bonheur avec vous.<br>
                    En attendant le grand jour, nous avons créé un site où vous aurez toutes les informations du jour J et vous pourrez nous poser des questions si vous en avez.<br>
                    Un détail plus qu'important, <strong> <a class="formTitleLink" href="#formTitle">remplissez le formulaire</a></strong> au bas de la page où vous pouvez confirmer ou non votre venue. (Un moyen supplémentaire de pouvoir nous donner votre réponse)
                </p>

                <div>
                    <p>Communiquez-le nous au plus vite afin que l’on puisse s’organiser plus facilement ! 🙂</p>
                </div>

                <div>
                    <p>Bonne lecture à tous et à très bientôt ! ❤️</p>
                </div>

            </div>

        </section>

        <section id="carousel">
            <!--SECTION_3 Carousel -> Faire le carousel en JS avec quelques photos de nous-->
        </section>

        <section id="townHall">
            <!--SECTION_4 Places and date for the town hall of Valence-->

            <div class="townHallContainer">
                <h3>MAIRIE</h3>
                <p>Mairie de Valence<br>
                    1 Place de la libérté<br>
                    26000 Valence<br>
                    France
                </p>
                <p><strong>14h00</strong></p>
            </div>

            <div class="img"></div>

        </section>

        <section id="church">
            <!--SECTION_5 Places and date for the St Jean church-->

            <div class="img"></div>

            <div class="churchContainer">

                <div class="churchResponsiveText">
                    <h3>EGLISE</h3>
                    <p>Eglise St-Jean-Baptiste<br>
                        4 Rue du Petit Saint-Jean<br>
                        26000 Valence<br>
                        France
                    </p>
                    <p><strong>15h00</strong></p>
                </div>

            </div>

        </section>

        <section id="reception">
            <!--SECTION_6 Places and date for Gourdan castle-->

            <div class="receptionContainer">
                <h3>RECEPTION</h3>
                <p>Château de gourdan<br>
                    1448 Chemin de gourdan<br>
                    07430 Saint-Clair<br>
                    France
                </p>
                <p><strong>17h00</strong></p>
            </div>

            <div class="img"></div>

        </section>

        <?php
        require_once('php/form_traitement.php');
        include('form.php');
        ?>

    </main>

    <?php
    include("php/footer.php");
    ?>

</body>

</html>