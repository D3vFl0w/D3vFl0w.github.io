# D3vFl0w.github.io

Reste à faire en FRONTEND :
    - Mettre le logo de la fleur entre les sections history et townhall;
    - SECTION -> API météo;
    - Faire un footer conforme avec credit;
    - Terminer la partie responsive : Refaire les images + logo à la bonne taille;
    - Faire le refactoring du CSS;
    - Utiliser SASS;
    - Mettre un carrousel en javascript;
    - Faire un nav hamburger en JS;
    - SECTION -> Compte à rebour JS ou PHP ??;

Reste à faire en BACKEND :
    - Faire un formulaire pour mot de passe perdu dans le formulaire de connexion avec un envoi d'un token temporaire par email
    - AFFICHER toutes les images SI le visiteur est connécté(BUG!);
    - Faire une page profil ou un overlay pour modifier ses données (idantifiant, mdp, photo de profil,...)
    - Faire un systeme de j'aime pour les photos comme sur facebook
    - Se faire une page administrateur pour voir les réponses des invites et les graphiques
    - Refactoriser en POO;
    - Voir la gestion des erreurs, remplacer les throw par des $_SESSION['error'] = []
    - Vérifier s'il y a pas d'autres dossiers et/ou fichiers à créer;


*** MESSAGE D'ERREUR A METTRE SUR TOUTES LES EXCEPTIONS DE LA CONNEXION : L\'utilisatreur et/ou le mot de passe est incorrect. ***

****Faire les jointures des BDD et mettre à jours les requetes SQL****
Jointures internes = INNER JOIN 'nom de la table' ON 'non de la seconde table'
Jointures externes = LEFT/RIGHT JOIN ... ON ... (récupère toutes les infos de la table de gauche/droite)

Double jointures : 
SELECT u.full_name, c.comment, r.title
FROM users u
JOIN comments c
	ON u.user_id = c.user_id
JOIN recipes r
	ON c.recipe_id = r.recipe_id


**** USERS ****
Mettre uniquement des mots de passe hashé dans la base de donnée
***************

TOKEN à 17min

VIDEO
    index.php 
      OK  => Formulaire de connexion classique + lien vers la page de mot de passe oublié **passForgetView.php**

    db.php 
      OK  => Connexion à la base de donnée. **MANAGER.PHP**

    forgot_password.php 
       OK => Affiche le formulaire pour le mot de passe perdu afin d'envoyer un mail au visiteur
       OK => Vérifier si le formulaire est complet + sécuriser les infos envoyés par le visiteur
       OK => Si controle OK, Créer un TOKEN ($token = uniqid())
        => Créer une variable $url avec le chemin du fichier où il y a le formulaire pour modifier le mot de passe avec une fonction qui contient une requête SQL UPDATE // lien du fichier token index.php
        => Préparation du mail à envoyer : $message ""Bonjour voici le lien pour réinitialiser votre mot de passe $url
        => Envoyer le mail avec if(mail($userEmail, Mot de passe oublié, $message)){ $sql = ""UPDATE users SET token = ? WHERE user_mail = ?; $stmt = $db->prepare($sql); $stmt->execute([$token, $userEmail])}

    TOKEN
        index.php
            => Récupérer une variable $_GET['token'] dans l'url, vérifier qu'elle existe et qu'elle n'est pas nulle (if+isset+empty)
            => préparer une requete : SELECT user_mail FROM users WHERE token = ?
            => execute la requete avec le token en parametre tableau : $stmt->execute([$_GET['token']])
            => Creer une variable pour stocker les infos de la requete : $email = $stmt->fetchColumn()
            => SI l'email n'est pas vide ALORS afficher la page avec le formulaire pour renseigner un nouveau mot de passe
            => Verifier si les variables du formulaire nouveau mot de passe existent et ne sont pas vides
            => Si les variables existent ALORS Hasher le mot de passe entrer par l'utilisateur dans le formulaire precedent
            => Mettre à jours le nouveau mot de passe hashé du visiteur sur la BDD :  $sql = ""UPDATE users SET user_pass = ?, token = NULL WHERE user_mail = ?; $stmt = $db->prepare($sql); $stmt->execute([$motDePasseHasher, $userEmail]) ; echo mot de passe modifie

METHODE 1 : MAIL


METHODE 2 : TOKEN