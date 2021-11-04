<?php

require('model/frontend.php');

// AFFICHER le page de connexion
function connectPage()
{
}


// AFFICHER la page d'acceuil
function homePage()
{
    require('views/indexView.php');
}

// Traiter le formulaire
function addForm($name, $firstName, $tel, $email, $adults, $children, $answer, $diet, $allergy, $message)
{
    $postForm = postForm($name, $firstName, $tel, $email, $adults, $children, $answer, $diet, $allergy, $message);

    if ($postForm === false) {
        throw new Exception('Impossible d\'enregistrer votre réponse !');
    } else {
        header('Location:index.php?action=index');
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

    $pictureLink =$newFileName = "/D3vFl0w.github.io/project/controller/../public/img/uploaded/$newName.$extensionFile";
    $namePicture= $newName;
    postLink($namePicture,$pictureLink,$fileSize,$fileType);

    header('Location:index.php?action=pictures');
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
