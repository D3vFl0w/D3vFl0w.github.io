<?php $title = 'Photos'; ?>

<?php ob_start(); ?>

    <form action="/project/controller/frontend.php" method="post">
        <label for="picture">Choisir une image</label>
        <input type="file" name="picture" id="picture">
        <input type="submit" name="Valider" value="Valider">
    </form>

    <?php
    while ($picture = $getPicture->fetch()) {
    ?>
        <div class="picture">
            <?= $picture["bin"]; ?>
            <!-- <img src="/project/controller/frontend.php?id=?"> -->
        </div>
    <?php
    }
    $getPicture->closeCursor();
    ?>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>