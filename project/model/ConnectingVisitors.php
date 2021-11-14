<?php

require_once("Manager.php");

class Connecting extends Manager
{
    public function connectingVisitor($connectPass, $connectHashPass, $connectName)
    {
        $sql = "SELECT * FROM users WHERE 'user_name' = :user_name 'user_pass' = :user_pass ";

        $manager = new Manager;
        $db = $manager->dbConnect();
        $connectingVisitor = $db->prepare($sql);
        $connectingVisitor->bindParam(':user_name', $connectName, PDO::PARAM_STR);
        $connectingVisitor->bindParam(':user_pass',$connectHashPass,PDO::PARAM_STR);
        $connectingVisitor->execute();

        $user = $connectingVisitor->fetch();
        if (!$user) {
            throw new Exception('Les données ne sont pas récupérées de la base de donnée');
        }
        if (!password_verify($connectPass, $connectHashPass)) {
            throw new Exception('password_verify impossible, les mot de passe sont différents');
        }

        return $user;
    }
}
