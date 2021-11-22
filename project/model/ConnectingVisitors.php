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

        if (!$user) {
            throw new Exception('L\'utilisatreur et/ou le mot de passe est incorrect.');
        }
        if (!password_verify($connectPass, $connectHashPass)) {
            throw new Exception('password_verify impossible, les mots de passe sont différents');
        }
        if (!in_array($connectName, $user[0])) {
            throw new Exception('Je ne trouve rien :(');
        }

        session_start();
        $_SESSION['user'] = [
            'id' => $user[0]['id'],
            'user_name' => $user[0]['user_name'],
            'role' => $user[0]['user_admin']
        ];
        if (!isset($_SESSION['user']['user_name'])) {
            header('Location:index.php');
        }
    }
}
