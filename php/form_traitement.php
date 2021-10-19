<?php
// Initialisation des variables en NULL
$name = $firstName = $tel = $email = $adults = $children = $answer = $diet = $allergy = $message = "";

// Appel du fichier où il y a la fonction permettant de sécuriser les données envoyés par le formulaire
require_once('functions/security.php');

if (!empty($_POST)) {
    // POST n'est pas vide, on vérifie que toutes les données sont présentes
    if (
        isset(
            $_POST['name'],
            $_POST['firstName'],
            $_POST['tel'],
            $_POST['email'],
            $_POST['adults'],
            $_POST['children'],
            $_POST['answer'],
            $_POST['diet'],
            $_POST['allergy'],
            $_POST['message']
        )
        && !empty($_POST['name'])
        && !empty($_POST['firstName'])
        && !empty($_POST['tel'])
        && !empty($_POST['email'])
        && !empty($_POST['adults'])
        && !empty($_POST['children'])
        && !empty($_POST['answer'])
        && !empty($_POST['diet'])
        && !empty($_POST['allergy'])
        && !empty($_POST['message'])
    ) { // Le formulaire est complet, on récupère les données en les protégeant (failles XSS)
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

        // Connexion à la base de données
        require_once('connect.php');

        // Stockage de la requête SQL dans une variable
        $sql = "INSERT INTO invites(Nom,Prenom,Telephone,Mail,Adultes,Enfants,Participe,Règime,Allergies,Question) VALUES(:nom,:prenom,:tel,:email,:adults,:children,:answer,:diet,:allergy,:message)";

        // Requête préparé 
        $query = $db->prepare($sql);

        // Lier les marqueurs de la requête SQL à des variables
        $query->bindParam(':nom', $name, PDO::PARAM_STR);
        $query->bindParam(':prenom', $firstName, PDO::PARAM_STR);
        $query->bindParam(':tel', $tel, PDO::PARAM_INT);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':adults', $adults, PDO::PARAM_INT);
        $query->bindParam(':children', $children, PDO::PARAM_INT);
        $query->bindParam(':answer', $answer, PDO::PARAM_BOOL);
        $query->bindParam(':diet', $diet, PDO::PARAM_STR);
        $query->bindParam(':allergy', $allergy, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);

        // Exécution du la requête SQL avec affichage d'une erreur si la requête n'est pas exécutée
        if (!$query->execute()) {
            die('Une erreur est survenue');
        }
    } else {
        die('Le formulaire est incomplet');
    }
}
// Sécurisation des données
