<?php
require_once('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'home') {
            homePage();
        } elseif ($_GET['action'] == 'connecting') {
            if (!empty($_POST)) {
                if (isset($_POST['user_name'], $_POST['user_pass']) && !empty($_POST['user_name']) && !empty($_POST['user_pass'])) {
                    $connectName = securing($_POST['user_name']);
                    $connectPass = securing($_POST['user_pass']);
                    connecting($connectName, $connectPass);
                } else {
                    throw new Exception('Merci d\'indiquer un identifiant et/ou un mot de passe correct');
                }
            } else {
                throw new Exception('Merci d\'indiquer un identifiant et/ou un mot de passe correct');
            }
        } elseif ($_GET['action'] == 'forgotView') {
            passForgetView();
        } elseif ($_GET['action'] == 'forgotPost') {
            if (isset($_POST['user_mail']) && !empty($_POST['user_mail'])) {
                $userEmail = securing($_POST['user_mail']);
                if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                    GenerateToken($userEmail);
                } else {
                    throw new Exception("L'adresse e-mail est invalide", 1);
                }
            } else {
                throw new Exception("Merci de renseigner votre adresse email", 1);
            }
        } elseif ($_GET['action'] == 'token') {
            if (isset($_GET['token']) && $_GET['token'] != '') {
                $tokenUrl = $_GET['token'];
                compareTokens($tokenUrl);
            } else {
                throw new Exception("L'adresse URL est incorrecte", 1);
            }
        } elseif ($_GET['action'] == 'addNewPass') {
            if (isset($_POST['user_newPassword'], $_POST['user_newPasswordConf']) && !empty($_POST['user_newPassword']) && !empty($_POST['user_newPasswordConf'])) {
                $userEmail = securing($_POST['user_email']);
                $newPassword = securing($_POST['user_newPassword']);
                $newPasswordConf = securing($_POST['user_newPasswordConf']);

                if ($newPassword === $newPasswordConf) {
                    changePassword($newPassword,$userEmail);
                } else {
                    throw new Exception("Les mots de passe ne sont pas identiques, merci de renseigner le même mot de passe", 1);
                }
            } else {
                throw new Exception("L'adresse e-mail et/ou les mots de passe sont incorrects", 1);
            }
        } elseif ($_GET['action'] == 'unset') {
            sessionUnset();
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
                        $_POST['allergy']
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
            if (isset($_FILES['uploadedPicture']) && $_FILES['uploadedPicture']['error'] === 0) {
                addPictures();
            } else {
                if ($_FILES['uploadedPicture']['error']) {
                    switch ($_FILES['uploadedPicture']['error']) {
                        case 1:
                            throw new Exception("Erreur : Le fichier dépasse la limite autorisée par le serveur (fichier php.ini (upload_max_filesize))",);
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
                        case 6:
                            throw new Exception("Erreur : Un dossier temporaire est manquant.");
                            break;
                        case 7:
                            throw new Exception("Erreur : Échec de l'écriture du fichier sur le disque.");
                            break;
                        case 8:
                            throw new Exception("Erreur : Une extension PHP a arrêté l'envoi de fichier. PHP ne propose aucun moyen de déterminer quelle extension est en cause. L'examen du phpinfo() peut aider.");
                            break;
                    }
                }
            }
        } elseif ($_GET['action'] == 'accommodation') {
            accommodationPage();
        } else {
            echo 'Erreur : aucunes informations rentrés';
        }
    } else {
        connectPage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


// Ajouter dans chaque if et elseif la VERIFICATION de la précense d'une session : Si $_SESSION présent afficher les pages demandées SINON afficher la page connectPage()
