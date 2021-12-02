<?php
require_once('/wamp64/www/D3vFl0w.github.io/mariage/controller/frontend.php');
require_once('../model/PicturesManager.php');
?>

<?php $title = 'Photos'; ?>

<?php ob_start(); ?>

<!-- Ajouter une image -->
<form action="index.php?action=addPictures" method="post" enctype="multipart/form-data">
    <label for="picture">Choisir une image (max 4Mo) format(.jpg , .jpeg , .png et .gif)</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
    <input type="file" name="uploadedPicture" id="picture">
    <input type="submit" name="submit" value="Envoyer">
</form>

<!-- Afficher toutes les images -->
<?php
$picturesGalery = new PicturesManager;
$getLink = $picturesGalery->getLink;
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>