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
function addPictures($namePicture, $size, $type, $bin)
{
    $postPicture = postPicture($namePicture, $size, $type, $bin);

    if ($postPicture === true) {
        if (isset($_FILES['uploadedPicture']) && $_FILES['uploadedPicture']['size'] <= 4000000) {
            if ($_FILES['piuploadedPicturecture']['error']) {
                switch ($_FILES['uploadedPicture']['error']) {
                    case 1:
                        throw new Exception("Error Processing Request",);
                        echo "Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";
                        break;
                    case 2:
                        throw new Exception("Error Processing Request",);
                        echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !";
                        break;
                    case 3:
                        throw new Exception("Error Processing Request",);
                        echo "L'envoi du fichier a été interrompu pendant le transfert !";
                        break;
                    case 4:
                        throw new Exception("Error Processing Request",);
                        echo "Le fichier que vous avez envoyé a une taille nulle !";
                        break;
                }
                $fileInfo = pathinfo($_FILES['uploadedPicture']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($extension, $allowedExtensions)) {
                    move_uploaded_file($_FILES['uploadedPicture']['tmp_name'], 'uploaded' . basename($_FILES['uploadedPicture']['name']));
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
