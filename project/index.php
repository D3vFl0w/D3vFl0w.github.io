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
            if (isset($_FILES['uploadedPicture']) /*&& $_FILES['uploadedPicture']['error'] === 0*/) {
                if ($_FILES['uploadedPicture']['error']) {
                    switch ($_FILES['uploadedPicture']['error']) {
                        case 1:
                            throw new Exception("Erreur : Le fichier dépasse la limite autorisée par le serveur (fichier php.ini)",);
                            break;
                        case 2:
                            throw new Exception("Erreur : Le fichier dépasse la limite autorisée dans le formulaire HTML !",);
                            break;
                        case 3:
                            throw new Exception("Erreur : L'envoi du fichier a été interrompu pendant le transfert !",);
                            break;
                        case 4:
                            throw new Exception("Erreur : Le fichier que vous avez envoyé a une taille nulle !");
                            break;
                    }
                }
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
                if ($fileSize > 4000000) {
                    throw new Exception("Erreur : Fichier trop volumineux. Taille max accepté = 4Mo.");
                }
                $newName = md5(uniqid());
                $newFileName = __DIR__ . "/public/img/uploaded/$newName.$extensionFile";

                if (!move_uploaded_file($_FILES['uploadedPicture']['tmp_name'], $newFileName)) {
                    throw new Exception("Le téléchargement à échoué, mauvais chemin de dossier.");
                }
                chmod($newFileName, 0644);
                header('Location : index.php?action=pictures');
            } else {
                throw new Exception("Error Processing Request");
            }

            // addPictures();}

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
