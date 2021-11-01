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
    $postForm->bindParam(':answer', $answer, PDO::PARAM_STR);
    $postForm->bindParam(':diet', $diet, PDO::PARAM_STR);
    $postForm->bindParam(':allergy', $allergy, PDO::PARAM_STR);
    $postForm->bindParam(':message', $message, PDO::PARAM_STR);

    $postForm->execute();

    return $postForm;
}

// ENREGISTRER le lien de l'image uploadée 
function postLink($namePicture,$newFileName,$fileSize,$fileType)
{
    $sql = "INSERT INTO pictures(name, link, size, type, date_creation) VALUES(:name, :link, :size, :type, (NOW()))";

    $db = dbConnect();
    $postPicture = $db->prepare($sql);
    $postPicture->bindValue(':name', $namePicture, PDO::PARAM_STR);
    $postPicture->bindValue(':link', $newFileName, PDO::PARAM_STR);
    $postPicture->bindValue(':size', $fileSize, PDO::PARAM_INT);
    $postPicture->bindValue(':type', $fileType, PDO::PARAM_STR);

    $postPicture->execute();

    return $postPicture;
}

// RECUPERER toutes les informations de l'images
function getLink()
{
    $sql = "SELECT * FROM pictures";

    $db = dbConnect();
    $getDataPictures = $db->prepare($sql);
    $getDataPictures->execute();
    $dataPictures = $getDataPictures->fetchAll(PDO::FETCH_ASSOC); 

    foreach ($dataPictures as $dataPicture) { ?>
        <div class="picturesGallery">
            <img src="<?= $dataPicture['link'] ?>" alt="<?= $dataPicture['name'] ?>">
        </div>
    <?php }
    
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