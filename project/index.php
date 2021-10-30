<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'index') {
        homePage();
    } elseif ($_GET['action'] == 'form') {
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


/* BESOIN
A - ENREGISTRER un formulaire sur la BDD
B - ENREGISTRER des images sur la BDD
C - RECUPERER toutes les images contenu dans la BDD
D - RECUPERER un ID à la page d'accueil pour connexion au site
*/

/* ROUTEUR
1. index.php
*/


/* VIEWS
1. Page d'accueil
2. Page formulaire
3. Page hébergements
4. Page galerie d'image
*/


/* CONTROLLER
1. TRAITE le formulaire (SECURISATION + CONTROLE PRESENCE DONNEES) =
2. TRAITE les images (SECURISATION + CONTROLE PRESENCE DONNEES) =
4. AFFICHE la page d'accueil
5. AFFICHE la page du formulaire
6. AFFICHE la page des hébergements
7. AFFICHE la galerie d'image
*/


/* MODEL
1. REQUETE SQL --> une fonction postform = A
2. REQUETE SQL --> une fonction postpictures = B
3. REQUETE SQL --> une fonction getpctures = C
4. REQUETE SQL --> une focntion connect = D
*/