<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'index') {
        homePage();
    } elseif ($_GET['action'] == 'formulaire') {
        formPage();
    } elseif ($_GET['action'] == 'pictures') {
        picturesPage();
    } elseif ($_GET['action'] == 'accommodation') {
        accommodationPage();
    } else {
        echo 'Erreur : aucunes informations rentrés';
    }
} else {
    homePage();
}
