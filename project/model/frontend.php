<?php

// RECUPERER les identifiants d'un visiteurs via un CODE éxistant
function connect()
{
}


// ENREGISTRER le formulaire dans la base de donnée
function postForm($name, $firstName, $tel, $email, $adults, $children, $answer, $diet, $allergy, $message)
{
    $sql = "INSERT INTO invites(Nom,Prenom,Telephone,Mail,Adultes,Enfants,Participe,Règime,Allergies,Question) VALUES(:name,:firstName,:tel,:email,:adults,:children,:answer,:diet,:allergy,:message)";

    $db = dbConnect();
    $postForm = $db->prepare($sql);
    $postForm->bindParam(':name', $name, PDO::PARAM_STR);
    $postForm->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $postForm->bindParam(':tel', $tel, PDO::PARAM_INT);
    $postForm->bindParam(':email', $email, PDO::PARAM_STR);
    $postForm->bindParam(':adults', $adults, PDO::PARAM_INT);
    $postForm->bindParam(':children', $children, PDO::PARAM_INT);
    $postForm->bindParam(':answer', $answer, PDO::PARAM_BOOL);
    $postForm->bindParam(':diet', $diet, PDO::PARAM_STR);
    $postForm->bindParam(':allergy', $allergy, PDO::PARAM_STR);
    $postForm->bindParam(':message', $message, PDO::PARAM_STR);

    $postForm->execute();

    return $postForm;
}

// AJOUTER des photos dans la base de donnée
function postPicture()
{
    $name = $size = $type = $bin = "";
    $sql = "INSERT INTO pictures(nom, taille, type, bin) VALUES (:name, :size, :type, :bin)";

    $db = dbConnect();
    $postPicture = $db->prepare($sql);
    $postPicture->bindValue(":name", $name, PDO::PARAM_STR);
    $postPicture->bindValue(":size", $size, PDO::PARAM_INT);
    $postPicture->bindValue(":type", $type, PDO::PARAM_STR);
    $postPicture->bindValue(":bin", $bin, PDO::PARAM_STR);

    $postPicture->execute(array($_FILES["picture"]["name"], $_FILES["picture"]["size"], $_FILES["picture"]["type"], file_get_contents($_FILES["picture"]["bin"])));

    return $postPicture;
}

// RECUPERER les photos qui sont sur la base de donnée
function getPicture()
{
    $db = dbConnect();

    $getPicture = $db->prepare('SELECT * FROM pictures where id= ? limit 1');
    $getPicture->setFetchMode(PDO::FETCH_ASSOC);
    $getPicture->execute(array($_GET["id"]));
    $getPicture->fetchAll();

    return $getPicture;
}

// CONNEXION à la base de donnée
function dbConnect()
{
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "mariage");

    $dns = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
    $db = new PDO($dns, DBUSER, DBPASS);
    return $db;
}





/*// ************** ANCIEN CODE *******************

// Formulaire ajouter une photos pour que les invitées ajoutent leurs photos
// function postPicture()
// {
//     $name = $size = $type = $bin = "";

//     securing($name);

//     if (!empty($_POST)) { // Vérification de $_POST n'est pas vide, le formulaire est rempli
//         if (
//             isset($_POST["picture"])
//             && !empty($_POST["picture"])
//         ) {
//             $name = securing($_POST["picture"]);

//             $db = dbConnect();

//             $sql = "INSERT INTO pictures(nom, taille, type, bin) VALUES (:name, :size, :type, :bin)";
//             $query = $db->prepare($sql);

//             $query->bindValue(":name", $name, PDO::PARAM_STR);
//             $query->bindValue(":size", $size, PDO::PARAM_INT);
//             $query->bindValue(":type", $type, PDO::PARAM_STR);
//             $query->bindValue(":bin", $bin, PDO::PARAM_STR);

//             if (!$query->execute(array($_FILES["picture"]["name"], $_FILES["picture"]["size"], $_FILES["picture"]["type"], file_get_contents($_FILES["picture"]["bin"])))) {
//                 die("Une erreur est survenue");
//             }
//         } else {
//             die("Merci d'avoir ajouté votre photos");
//         }
//     }*/