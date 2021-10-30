<?php $title = 'Photos'; ?>

<?php ob_start(); ?>

<!-- Ajouter une image -->
<form action="/project/controller/frontend.php" method="post">
    <label for="picture">Choisir une image</label>
    <input type="file" name="picture" id="picture">
    <input type="submit" name="Valider" value="Valider">
</form>

<!-- Afficher toutes les images -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>