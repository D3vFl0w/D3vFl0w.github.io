<?php

require('../model/frontend.php');

// Afficher la page d'acceuil
function homePage()
{
    $home = header('Location:index.php?action=index');

    require('../view/frontend/indexView.php');
}

// Afficher le formulaire
function formPage()
{
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
    $postForm = postForm();

    if ($postForm === false) {
        die('Impossible d\'enregistrer votre réponse !');
    } else {

        header('Location: index.php?action=index');
    }
    require('../view/frontend/formView.php');
}

// Afficher la galerie d'images
function picturesPage()
{
    $postPicture = postPicture();

    if ($postPicture === false) {
        die('Impossible d\'ajouter une photos !');
    } else {
        header('Location: index.php?action=pictures');
    }
    require('../view/frontend/picturesView.php');
}



// Affiche la liste des hebergements à proximité
function accommodationPage()
{
    $accommodation = header('Location: index.php?action=accommodaton');

    require('../view/frontend/accommodationsView.php');
}



/************* ROUTEUR ******************
Test 
 */


/********** CONTROLLER = Logique, calculs, décisions *******************
1. une fonction listPosts --> qui appelle la fonction getPosts dans le model et appel la vue listPostView.

2. une fonction post --> qui initialise une variable post qui contient la fonction getPost qui récupère un post ciblé + une seconde variable qui contient la fonction getComments qui récupère les commentaires du post ciblé et appel la vue postView

3. une fonction addComment --> qui appelle la fonction postComment via la variable affectedLines + Si la fonction renvoie FALSE on affiche une erreur, si la fonction renvoit TRUE on affiche le commentaire
 */


/******* MODEL = Acces à la BDD *********************
1. une fonction getPosts --> où il y a une requête SQL qui permet de selectionner tous les posts éxistants et les stockent dans la variable $req

2. une fonction getPost --> qui permet de récupèrer un post en fonction de son ID et est stocké dans un tableau $postId qui est stocké dans $post

3. une fonction getComments --> récupèrer tous les commentaires d'un post 

4. une fonction postComment -->

5. une fonction dbConnect --> Connexion à la BDD
 */


/************* VIEWS = Affichage de la page ******************
1. une vue listPosts -->

2. une vue post -->

3. une vue template -->
 */










/* CONTROLLER
1. une fonction listPosts -->
2. une fonction post -->
3. une fonction addComment -->
*/

/* MODEL
1. une fonction getPosts -->
2. une fonction getPost -->
3. une fonction getComments -->
4. une fonction postComment -->
5. une fonction dbConnect -->
*/

/* VIEWS
1. une vue listPosts -->
2. une vue post -->
3. une vue template -->
*/