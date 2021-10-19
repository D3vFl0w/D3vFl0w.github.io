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

        <section class="form">
            <!--SECTION_7 Invite response form-->

            <h2 id="formTitle">Je réponds à l'invitation</h2>

            <form method="POST" action="php/form_traitement.php">

                <div class="formGrid">

                    <div>
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name">
                    </div>

                    <div>
                        <label for="firstName">Prénom</label>
                        <input type="text" name="firstName" id="firstName">
                    </div>

                    <div>
                        <label for="tel">Numéro de téléphone</label>
                        <input type="tel" name="tel" id="tel" minlength="10" maxlength="20" required>
                    </div>

                    <div>
                        <label for="email">Adresse email</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div>
                        <label for="adults">Nombre d'adulte :</label>
                        <input type="number" name="adults" id="adults" minlength="0" maxlength="1">
                    </div>

                    <div>
                        <label for="children">Nombre d'enfant :</label>
                        <input type="number" name="children" id="children" minlength="0" maxlength="1">
                    </div>

                    <div class="input7">
                        <p class="label7">Serrez-vous présent ?
                        <div class="radioGroup">
                            <input type="radio" name="answer" class="radio  radioYes" value="yes" id="yes">
                            <label for="yes">Oui</label>
                            <input type="radio" name="answer" class="radio  radioNo" value="no" id="no">
                            <label for="no">Non</label>
                        </div>
                        </p>
                    </div>

                    <div>
                        <label for="diet">Régime particulier :</label>
                        <input type="text" name="diet" id="diet" placeholder="Ex : Végétarien, Sans gluten, Halal, etc.">
                    </div>

                    <div>
                        <label for="allergies">Allérgies :</label>
                        <input type="text" name="allergy" id="allergies" placeholder="Ex : Lait, Fruit à coque, Arachides, etc.">
                    </div>

                    <div class="textarea">
                        <label for="message">Vous avez une question à poser aux mariées ?</label>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Nous vous répondrons aussi vite que possible"></textarea>
                    </div>

                </div>

                <div>
                    <input type="checkbox" name="check" id="check" required>
                    <label for="check">Je suis sur des informations que j'ai renseignées</label>
                    <button type="submit">Envoyer</button>
                </div>

            </form>

        </section>

    </main>

    <?php
    include("php/footer.php");
    ?>

</body>

</html>