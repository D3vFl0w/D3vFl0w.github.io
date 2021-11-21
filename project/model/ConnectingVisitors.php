<?php

require_once("Manager.php");

class Connecting extends Manager
{
    public function connectingVisitor($connectPass, $connectHashPass, $connectName)
    {
        $sql = "SELECT * FROM users WHERE user_name = :name AND user_pass = :pass";

        $manager = new Manager;
        $db = $manager->dbConnect();
        $connectingVisitor = $db->prepare($sql);
        $connectingVisitor->bindValue(':name', $connectName);
        $connectingVisitor->bindValue(':pass', $connectPass);
        $connectingVisitor->execute();
        $user = $connectingVisitor->fetchAll(PDO::FETCH_ASSOC);

        echo '<pre>';
        print_r($user);
        echo '</pre>';

        if (!$user) {
            throw new Exception('Utilisateur inéxistant !');
        }
        if (!password_verify($connectPass, $connectHashPass)) {
            throw new Exception('password_verify impossible, les mots de passe sont différents');
        }

        if (in_array($connectName,$user[0])) {
            // Si l'utilisateur éxiste, créer une séssion pour que l'utilisateur reste connecté dans toutes les pages.
        } else {
            throw new Exception('Je ne trouve rien :(');
        }
        throw new Exception("Error Processing Request", 1);
        
        return $user;
    }
}