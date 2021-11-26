<?php

require_once("Manager.php");

class ForgotPassword extends Manager
{
    public function controlerEmailEtGenererUnToken($userEmail)
    {
        $sqlEmail = "SELECT * FROM users WHERE user_email = ?";

        $manager = new Manager;
        $db = $manager->dbConnect();
        $getEmail = $db->prepare($sqlEmail);
        $getEmail->execute([$userEmail]);
        $userMailDb = $getEmail->fetchColumn(PDO::FETCH_ASSOC);

        if ($userEmail === $userMailDb) {
            $token = uniqid();
            $url = "http://localhost/D3vFl0w.github.io/project/index.php?action=token&token=$token";
            $message = "Bonjour, cliquez sur le lien pour la réinitialisation de votre mot de passe : $url";
            $headers = 'Content-Type: text/plain; charset="utf-8"' . ' ';

            if (mail($userEmail, 'Mot de passe oublié', $message, $headers)) {
                $sqlToken = 'UPDATE users SET token = ? WHERE user_email = ?';
                $getToken = $db->prepare($sqlToken);
                $getToken->execute([$token, $userEmail]);
                echo "Merci de vérifier votre boite mail, un courriel vous a été envoyez afin de changer votre mot de passe. (Vous pouvez fermer cette fenêtre)";
            } else {
                throw new Exception("L'e-mail n'a pas pu être envoyé !", 1);
            }
        } else {
            throw new Exception("L'adresse mail renseigné est différente de celle présente dans la BDD", 1);
        }
    }

    public function verificationToken($tokenUrl)
    {
        $sqlTokenDb = "SELECT token FROM users WHERE token = ?";

        $manager = new Manager;
        $db = $manager->dbConnect();
        $getTokenDb = $db->prepare($sqlTokenDb);
        $getTokenDb->execute([$tokenUrl]);
        $tokenDb = $getTokenDb->fetch(PDO::FETCH_ASSOC);

        if ($tokenDb) {
            AfficherChangerMotDePasse();
        } else {
            throw new Exception("Le token n'a pas été récupépré dans la BDD", 1);
        }
    }

    public function enregistrerLeNouveauMotDePasse($newPassword, $userEmail)
    {
        $sqlEmail = "SELECT * FROM users WHERE user_email = ?";

        $manager = new Manager;
        $db = $manager->dbConnect();
        $getEmail = $db->prepare($sqlEmail);
        $getEmail->execute([$userEmail]);
        $userMailDb = $getEmail->fetchColumn(PDO::FETCH_ASSOC);

        if ($userMailDb === $userEmail) {
            $sqlPass = 'UPDATE users SET user_pass = ?, token = NULL WHERE user_email = ?';

            $newPasswordHashed = password_hash($newPassword, PASSWORD_BCRYPT);
            $getPass = $db->prepare($sqlPass);
            $reqPass = $getPass->execute([$newPasswordHashed, $userEmail]);

            if ($reqPass) {
                header('Location:index.php?');
            } else {
                throw new Exception("Le mot de passe n'a pas pu être enregister sur la base de donnée", 1);
            }
        } else {
            throw new Exception("L'adresse e-mail renseignée est incorrecte", 1);
        }
    }
}
