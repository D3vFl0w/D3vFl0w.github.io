<?php

require_once("Manager.php");

class Connecting extends Manager
{
    public function connectingVisitor($connectPass, $connectName)
    {
        $sql = "SELECT * FROM users WHERE user_name = ?";

        $manager = new Manager;
        $db = $manager->dbConnect();
        $connectingVisitor = $db->prepare($sql);
        $connectingVisitor->execute([$connectName]);
        $user = $connectingVisitor->fetchAll(PDO::FETCH_ASSOC);

        if ($user) {
            if (in_array($connectName, $user[0])) {
                if (password_verify($connectPass, $user[0]['user_pass'])) {
                    session_start();
                    $_SESSION['user'] = [
                        'id' => $user[0]['id'],
                        'user_name' => $user[0]['user_name'],
                        'role' => $user[0]['user_admin']
                    ];
                    if (!isset($_SESSION['user']['user_name'])) {
                        header('Location:index.php');
                    }
                } else {
                    throw new Exception('L\'utilisatreur et/ou le mot de passe est incorrect.');
                }
            } else {
                throw new Exception('L\'utilisatreur et/ou le mot de passe est incorrect.');
            }
        } else {
            throw new Exception('L\'utilisatreur et/ou le mot de passe est incorrect.');
        }
    }
}
