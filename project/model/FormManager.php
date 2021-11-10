<?php

require_once("/model/Manager.php");


class FormManager extends Manager
{
    // ENREGISTRER le formulaire dans la base de donnée
    public function postForm($name, $firstName, $tel, $email, $adults, $children, $answer, $diet, $allergy, $message)
    {
        $sql = "INSERT INTO invites(Nom,Prenom,Telephone,Mail,Adultes,Enfants,Participe,Règime,Allergies,Question) VALUES(:name,:firstName,:tel,:email,:adults,:children,:answer,:diet,:allergy,:message)";

        $db = dbConnect();
        $postForm = $db->prepare($sql);
        $postForm->bindParam(':name', $name, PDO::PARAM_STR);
        $postForm->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $postForm->bindParam(':tel', $tel, PDO::PARAM_INT);
        $postForm->bindParam(':email', $email, PDO::PARAM_STR);
        $postForm->bindParam(':adults', $adults, PDO::PARAM_INT);
        $postForm->bindParam(':children', $children, PDO::PARAM_INT);
        $postForm->bindParam(':answer', $answer, PDO::PARAM_STR);
        $postForm->bindParam(':diet', $diet, PDO::PARAM_STR);
        $postForm->bindParam(':allergy', $allergy, PDO::PARAM_STR);
        $postForm->bindParam(':message', $message, PDO::PARAM_STR);

        $postForm->execute();

        return $postForm;
    }
}
