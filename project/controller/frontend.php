<?php

// Chargement des classes
require_once('/wamp64/www/D3vFl0w.github.io/project/model/FormManager.php');
require_once('/wamp64/www/D3vFl0w.github.io/project/model/PicturesManager.php');
require_once('/wamp64/www/D3vFl0w.github.io/project/model/ConnectingVisitors.php');

// AFFICHER le page de connexion
function connectPage()
{
    require('views/login.php');
}

// Vérifier s'il existe une session ouverte
function sessionVerify()
{
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location:index.php');
        exit;
    }
}


// Detruire la session
function sessionUnset()
{
    session_start();
    unset($_SESSION['user']);
    header('Location:index.php');
}

// CONNECTER le visiteur
function connecting($connectName, $connectPass, $connectHashPass)
{
    $connectingVisitors = new Connecting;
    $connectingVisitors->connectingVisitor($connectPass, $connectHashPass, $connectName);

    if ($connectingVisitors === false) {
        throw new Exception("Impossible de se connecter le fonction connectingVisitor n'a pas fonctionné");
    } 
    if (!isset($_SESSION['user'])) {
        header('Location:index.php');
    } else {
        header('Location:index.php?action=home');
    }
}

// Changer le mot de passe
function passChange()
{
    
}

// Mot de passe perdu
function passForget()
{

}

// Tester si le visiteur est un administrateur
function isAdmin(): bool
{
    return true; // en cours de test, à terminer.
}

// AFFICHER la page d'acceuil
function homePage()
{
    require('views/indexView.php');
}

// Traiter le formulaire
function addForm($name, $firstName, $tel, $email, $adults, $children, $answer, $diet, $allergy, $message)
{
    $formManager = new FormManager();
    $postForm = $formManager->postForm($name, $firstName, $tel, $email, $adults, $children, $answer, $diet, $allergy, $message);

    if ($postForm === false) {
        throw new Exception('Impossible d\'enregistrer votre réponse !');
    } else {
        header('Location:index.php?action=home');
    }
}


// AFFICHER le formulaire
function formPage()
{
    require('views/formView.php');
}


// AFFICHER la galerie d'image
function picturesPage()
{
    require('views/picturesView.php');
}


// Ajouter des images
function addPictures()
{
    $allowed = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif'
    ];
    $fileName = $_FILES['uploadedPicture']['name'];
    $fileType = $_FILES['uploadedPicture']['type'];
    $fileSize = $_FILES['uploadedPicture']['size'];

    $extensionFile = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!array_key_exists($extensionFile, $allowed) || !in_array($fileType, $allowed)) {
        throw new Exception("Erreur : Format du fichier incorect. Pour rappel, seul les .jpg, .jpeg et .gif sont accéptés",);
    }
    if ($fileSize > 4194304) {
        throw new Exception("Erreur : Fichier trop volumineux. Taille max accepté = 4Mo.");
    }
    $newName = md5(uniqid());
    $newFileName = __DIR__ . "/../public/img/uploaded/$newName.$extensionFile";

    if (!move_uploaded_file($_FILES['uploadedPicture']['tmp_name'], $newFileName)) {
        throw new Exception("Le téléchargement à échoué, mauvais chemin de dossier.");
    }
    chmod($newFileName, 0644);

    $pictureLink = $newFileName = "/D3vFl0w.github.io/project/controller/../public/img/uploaded/$newName.$extensionFile";
    $namePicture = $newName;
    $picturesManager = new PicturesManager;
    $picturesManager->postLink($namePicture, $pictureLink, $fileSize, $fileType);

    header('Location:index.php?action=pictures');

    // ****** RESIZING IMG ***********
    $pictureForResize = $newName;
    $newPectureLink = "/D3vFl0w.github.io/project/controller/../public/img/resize/$pictureForResize";
    $pictureSize = getimagesize($pictureForResize);

    $width = $pictureSize[0];
    $height = $pictureSize[1];

    // Nouvelle image vierge en mémoire
    $nouvelleImage = imagecreatetruecolor($width / 2, $height / 2);

    switch ($pictureSize["mime"]) {
        case 'image/png':
            // Si c'est une image.png, on l'ouvre
            $imageSource = imagecreatefrompng($pictureForResize);
            break;
        case 'image/jpeg':
            $imageSource = imagecreatefromjpeg($pictureForResize);
            break;
        case 'image/gif':
            $imageSource = imagecreatefromgif($pictureForResize);
            break;
        default:
            throw new Exception("Format d'image incorrect");
    }

    // On copie toute l'image source dans l'image de destination en la réduisant
    imagecopyresampled(
        $nouvelleImage, //Image destination
        $imageSource, // Image de départ
        0, // Position en x du coin superieur gauche de l'image de destination
        0, // Position en y du coin superieur gauche de l'image de destination
        0, // Position en x du coin superieur gauche de l'image source
        0, // Position en y du coin superieur gauche de l'image source
        $width / 2, // Largeur dans l'image de destination
        $height / 2, // La hauteur de l'image de destination
        $width, // Largeur dans l'image source
        $height, // La hauteur de l'image source
    );

    // Enregistrer la nouvelle image sur le serveur
    switch ($pictureSize["mime"]) {
        case 'image/png':
            imagepng($nouvelleImage, $newPectureLink);
            break;
        case 'image/jpeg':
            imagejpeg($nouvelleImage, $newPectureLink);
            break;
        case 'image/gif':
            imagegif($nouvelleImage, $newPectureLink);
            break;
        default:
            throw new Exception("Impossible d'enregistrer la nouvelle image dans le dossier");
    }

    // On detruit les images dans la mémoire temporaire
    imagedestroy($imageSource);
    imagedestroy($nouvelleImage);
}

// AFFICHER les images dans le dossier



// AFFICHER la liste des hebergements à proximité
function accommodationPage()
{
    require('views/accommodationsView.php');
}

// Fonction pour sécuriser les données envoyés par l'utilisateur
function securing($formData)
{
    $formData = trim($formData);
    $formData = stripslashes($formData);
    $formData = strip_tags($formData);
    return $formData;
}
