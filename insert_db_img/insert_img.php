<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Le mariage d'Éléonore et de Florian est prévu pour le 17/09/2022.">
    <link rel="shortcut icon" href="img/coeurs.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles.css">
    <title>Eléonore & Florian</title>
</head>

<?php

include("../php/functions/security.php");

if (!empty($_POST)) { // Vérification de $_POST n'est pas vide, le formulaire est rempli
    if(
        isset($_POST["name"], $_POST["firsName"])
        && !empty($_POST["name"]) && !empty($_POST["firstName"])
    ){
        $name = securing($_POST["name"]);
        $firstName = securing($_POST['firstName']);

        require_once("../php/connect.php");

        $sql = "INSERT INTO 'invites' ('Nom', 'Prenom') VALUES (:name, :firstName)";
        $query = $db->prepare($sql);

        $query->bindValue(":name", $name, PDO::PARAM_STR);
        $query->bindValue(":firstName", $firstName, PDO::PARAM_STR);

        if(!$query->execute()){
            die("Une erreur est survneie");
        }

    } else {
        die("Le formulaire est incomplet");
    }
}

include("../insert_db_img/form_img.php");