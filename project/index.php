<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'index') {
            homePage();
        } elseif ($_GET['action'] == 'form') {
            formPage();
        } elseif ($_GET['action'] == 'addForm') {
            if (!empty($_POST)) {
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
                ) {
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
                    addForm($name, $firstName, $tel, $email, $adults, $children, $answer, $diet, $allergy, $message);
                } else {
                    throw new Exception('Le formulaire est incomplet, merci de vérifier les informations.');
                }
            } else {
                throw new Exception('Merci de remplir tous les champs du formulaire.');
            }
        } elseif ($_GET['action'] == 'pictures') {
            picturesPage();
        } elseif ($_GET['action'] == 'addPictures') {
            addPictures($namePicture, $size, $type, $bin);
        } elseif ($_GET['action'] == 'accommodation') {
            accommodationPage();
        } else {
            echo 'Erreur : aucunes informations rentrés';
        }
    } else {
        homePage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
