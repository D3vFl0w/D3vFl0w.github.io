<?php

// Appel du fichier où il y a la fonction permettant de sécuriser les données envoyés par le formulaire
require_once('functions/security.php');

// Sécurisation des données
$name = securing($_POST['name']);
$firstName = securing($_POST['firstName']);
$tel = securing($_POST['tel']);
$email = securing($_POST['email']);
$adults = securing($_POST['adults']);
$children = securing($_POST['children']);
$answer = securing($_POST['answer']);
$diet = securing($_POST['diet']);
$allergy = securing($_POST['allergy']);
$message = securing($_POST['message']);

require_once('connect.php');

// Stockage de la requête SQL dans une variable
$sql = "INSERT INTO invites(Nom,Prenom,Telephone,Mail,Adultes,Enfants,Participe,Règime,Allergies,Questions) VALUES(:nom,:prenom,:tel,:email,:adults,:children,:answer,:diet,:allergy,:message)";

// Requête préparé 
$query = $db->prepare($sql);

// Lier les marqueurs de la requête SQL à des variables
$query->bindParam(':nom', $name);
$query->bindParam(':prenom', $firstname);
$query->bindParam(':tel', $tel);
$query->bindParam(':email', $email);
$query->bindParam(':adults', $adults);
$query->bindParam(':children', $children);
$query->bindParam(':answer', $answer);
$query->bindParam(':diet', $diet);
$query->bindParam(':allergy', $allergy);
$query->bindParam(':message', $message);

// Exécution du la requête SQL avec affichage d'une erreur si la requête n'est pas exécutée
if (!$query->execute()) {
    die('Une erreur est survenue');
}

?>