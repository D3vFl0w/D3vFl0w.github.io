<?php

require('model/frontend.php');

// AFFICHER la page d'acceuil
function homePage()
{
    require('views/indexView.php');
}

// Traiter le formulaire
function addForm($name, $firstName, $tel, $email, $adults, $children, $answer, $diet, $allergy, $message)
{
    // $name = $firstName = $tel = $email = $adults = $children = $answer = $diet = $allergy = $message = "";
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
    $postForm = postForm($name, $firstName, $tel, $email, $adults, $children, $answer, $diet, $allergy, $message);

    if ($postForm === false) {
        die('Impossible d\'enregistrer votre réponse !');
    } else {

        header('Location: index.php?action=index');
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
    $postPicture = postPicture();

    if ($postPicture === false) {
        die('Impossible d\'ajouter une photos !');
    } else {
        header('Location: index.php?action=pictures');
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

