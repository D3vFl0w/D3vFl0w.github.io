<?php
require_once('/wamp64/www/D3vFl0w.github.io/mariage/controller/frontend.php');
?>

<!-- FORMULAIRE CONNEXION -->
<form action="index.php?action=connecting" method="post">
    <div>
        <label for="user_name">Identifiant</label>
        <input type="text" name="user_name" id="user_name" required>
    </div>
    <div>
        <label for="pass">Mot de passe </label>
        <input type="password" name="user_pass" id="pass" required>
        <a href="index.php?action=forgotView">Mot de passe oublié ?</a>
    </div>
    <div>
        <input type="submit" value="Se connecter">
    </div>
</form>