<?php

require_once("Manager.php");

class Connecting extends Manager
{
    public function connectingVisitor($connectPass, $connectHashPass, $connectEmail)
    {
        $sql = "SELECT * FROM users WHERE 'user_name' = :email ";

        $manager = new Manager;
        $db = $manager->dbConnect();
        $connectingVisitor = $db->prepare($sql);
        $connectingVisitor->bindParam(':user_name', $connectEmail, PDO::PARAM_STR);
        $connectingVisitor->bindParam(':user_pass',$connectHashPass,PDO::PARAM_STR);
        $connectingVisitor->execute();

        $user = $connectingVisitor->fetch();
        if (!$user) {
            throw new Exception('L\'utilisatreur et/ou le mot de passe est incorrect.');
        }
        if (!password_verify($connectPass, $connectHashPass)) {
            throw new Exception('L\'utilisatreur et/ou le mot de passe est incorrect.');
        }

        return $connectingVisitor;
    }
}