<?php
require_once('/wamp64/www/D3vFl0w.github.io/project/controller/frontend.php');
sessionInit();
$title = 'Se connecter';
?>

<!-- FORMULAIRE CONNEXION -->
<form action="index.php?action=connecting" method="post">
    <div>
        <label for="user_name">Prénom</label>
        <input type="text" name="user_name" id="user_name">
    </div>
    <div>
        <label for="pass">Code secret</label>
        <input type="password" name="pass" id="pass">
    </div>
    <div>
        <input type="submit" value="Se connecter">
    </div>
</form>