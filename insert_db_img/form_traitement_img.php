<?php

$name = $firstName = "";

include('../php/functions/security.php');

if (!empty($_POST)) { // Vérification de $_POST n'est pas vide, le formulaire est rempli
    if (
        isset($_POST["name"], $_POST["firstName"])
        && !empty($_POST["name"]) && !empty($_POST["firstName"])
    ) {
        $name = securing($_POST["name"]);
        $firstName = securing($_POST['firstName']);

        require_once("../php/connect.php");

        $sql = "INSERT INTO invites(Nom, Prenom) VALUES (:name, :firstName)";
        $query = $db->prepare($sql);

        $query->bindValue(":name", $name, PDO::PARAM_STR);
        $query->bindValue(":firstName", $firstName, PDO::PARAM_STR);

        if (!$query->execute()) {
            die("Une erreur est survneie");
        }
    } else {
        die("Le formulaire est incomplet");
    }
}
