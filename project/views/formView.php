<?php
require_once('/wamp64/www/D3vFl0w.github.io/project/controller/frontend.php');
?>

<?php $title = 'Répondre à l\'invitation'; ?>

<?php ob_start(); ?>
<section class="form">

    <h2 id="formTitle">Je réponds à l'invitation</h2>

    <form method="POST" action="index.php?action=addForm">

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

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>