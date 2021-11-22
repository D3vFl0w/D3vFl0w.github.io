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
    - AFFICHER toutes les images SI le visiteur est connécté(BUG!);
    - Refactoriser en POO;
    - Vérifier s'il y a pas d'autres dossiers et/ou fichiers à créer;
    - Se faire une page administrateur pour voir les réponses des invites et les graphiques


|///////////////////////////////|
|       AUTHENTIFICATION        |
|///////////////////////////////|

    - Stocker les données de l'utilisateur de page en page pour rester connecté
    - Bouton 'Déconnexion'
    - Faire une page profil ou un overlay pour modifier ses données (idantifiant, mdp, photo de profil,...)
    - Faire un formulaire pour mot de passe perdu


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



Photos de profil pro
Vetements
Auto entrepreneur