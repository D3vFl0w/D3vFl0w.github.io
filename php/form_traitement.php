<?php
require_once('connect.php');

$query = $db->prepare("INSERT INTO invites(Nom,Prenom,Telephone,Mail) VALUES(:nom,:prenom,:tel,:email)");

$query->bindParam(':nom', $name);
$query->bindParam(':prenom', $firstname);
$query->bindParam(':tel', $tel);
$query->bindParam(':email', $email);

$name = 'Waro';
$firstname = 'Flo';
$tel = 0102030405;
$email = "Flo.war@flo.fr";

$query->execute();
?>

<p><a href="/index.html">Retour à l'acceuil</a></p>