<?php

require_once("/Manager.php");

 
class PicturesManager extends Manager
{
    // ENREGISTRER le lien de l'image uploadée
    public function postLink($namePicture, $pictureLink, $fileSize, $fileType)
    {
        $sql = "INSERT INTO pictures(name, link, size, type, date_creation) VALUES(:name, :link, :size, :type, (NOW()))";

        $db = dbConnect();
        $postPicture = $db->prepare($sql);
        $postPicture->bindValue(':name', $namePicture, PDO::PARAM_STR);
        $postPicture->bindValue(':link', $pictureLink, PDO::PARAM_STR);
        $postPicture->bindValue(':size', $fileSize, PDO::PARAM_INT);
        $postPicture->bindValue(':type', $fileType, PDO::PARAM_STR);

        $postPicture->execute();

        return $postPicture;
    }

    // RECUPERER toutes les informations de l'images
    public function getLink()
    {
        $sql = "SELECT * FROM pictures";

        $db = dbConnect();
        $getDataPictures = $db->prepare($sql);
        $getDataPictures->execute();
        $dataPictures = $getDataPictures->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dataPictures as $dataPicture) { ?>
            <div class="picturesGallery">
                <img src="<?= $dataPicture['link'] ?>" alt="<?= $dataPicture['name'] ?>">
            </div>
            <?php
        }
    }
}
