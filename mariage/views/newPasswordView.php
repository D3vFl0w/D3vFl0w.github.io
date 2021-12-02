<?php
require_once('/wamp64/www/D3vFl0w.github.io/project/controller/frontend.php');

$title = 'Nouveau mot de passe';
?>

<!-- FORMULAIRE NOUVEAU MOT DE PASSE -->
<form action="index.php?action=addNewPass" method="post">
    <div>
    <div>
            <label for="user_email">Votre adresse e-mail :</label>
            <input type="ptext" name="user_email" id="user_email" required>
        </div>
        <div>
            <label for="user_newPassword">Nouveau mot de passe :</label>
            <input type="password" name="user_newPassword" id="user_newPassword" required>
        </div>
        <div>
            <label for="user_newPasswordConf">Confirmer le nouveau mot de passe :</label>
            <input type="password" name="user_newPasswordConf" id="user_newPasswordConf" required>
        </div>
        <div>
            <input type="submit" value="Confirmer le mot de passe provisoire">
        </div>
</form>
