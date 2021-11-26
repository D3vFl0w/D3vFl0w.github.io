<?php
require_once('/wamp64/www/D3vFl0w.github.io/project/controller/frontend.php');

$title = 'Mot de passe oublié';
?>

<!-- FORMULAIRE MOT DE PASSE PERDU -->
<form action="index.php?action=forgotPost" method="post">
    <div>
        <label for="user_mail">email</label>
        <input type="text" name="user_mail" id="user_mail" required>
    </div>
    <div>
        <input type="submit" value="Envoyer un mot de passe provisoire par email">
    </div>
</form>