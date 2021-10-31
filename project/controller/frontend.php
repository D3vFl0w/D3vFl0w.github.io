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
function addPictures($name, $size, $type, $bin)
{
    $postPicture = postPicture($name, $size, $type, $bin);

    if ($postPicture === true) {
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
            if ($_FILES['picture']['size'] <= 4000000) {
                $fileInfo = pathinfo($_FILES['picture']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($extension, $allowedExtensions)) {
                    move_uploaded_file($_FILES['picture']['tmp_name'], 'uploads' . basename($_FILES['picture']['name']));
                    echo 'L\'envoi a bien été effectué';
                }
            }
        }
        header('Location: index.php?action=pictures');
    } else {
        throw new Exception('Impossible d\'ajouter une photos !');
    }
}


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
