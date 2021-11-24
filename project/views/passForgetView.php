<?php
require_once('/wamp64/www/D3vFl0w.github.io/project/controller/frontend.php');
?>

<!-- FORMULAIRE MOT DE PASSE PERDU -->
<form action="index.php?action=forgot" method="post">
    <div>
        <label for="user_mail">email</label>
        <input type="text" name="user_mail" id="user_mail">
    </div>
    <div>
        <input type="submit" value="M'envoyer un mot de passe temporaire par e-mail">
    </div>
</form>