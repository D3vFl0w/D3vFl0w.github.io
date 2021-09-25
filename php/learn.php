<?php
// $notes = [10, 20, 10, 9, 8];
// echo $notes[3];

// $students = [
//     'name' => 'Doe',
//     'firstName' => 'Marc',
//     'notes' => [10, 20, 15]
// ];
// echo $students['firstName'] . ' ' . $students['notes'][2];

/*
$note = (int)readline('entrez votre note : ');
if ($note > 10) {
    echo 'Bravo, vous avez la moyenne';
} elseif ($note ===10){
    echo 'Vous avez juste la moyenne';
} else {
    echo 'Dommage, vous n\'avez pas la moyenne';
}
*/

// $action = (int)readline('Entrez votre action : 1: J\'attaque, 2: Je défend, 3: Je passe mon tour : ');

// switch ($action) {
//     case '1':
//         echo 'J\'attaque !';
//         break;
//     case '2':
//         echo 'Je défend !';
//         break;
//     case '3':
//         echo 'Je passe mon tour !';
//         break;
//     default:
//         echo 'Commande inconnue';
//         break;
// }

// $heure = (int)readline('Entrez une heure : ');

// if ((9 <= $heure && $heure <= 12) || (14 <= $heure && $heure <= 17)) {
//     echo 'Le magasin est ouvert';
// } else {
//     echo 'Le magasin est fermé';
// }

/*
VRAI && VRAI = VRAI
VRAI && FAUX = FAUX
FAUX && FAUX = FAUX

VRAI || VRAI = VRAI
VRAI || FAUX = VRAI
FAUX || FAUX = FAUX
*/

// = -> Assignation
// == -> Vérifie une égalité de valeur
// === -> Vérifie une égalité de type et de valeur



// Demander à l'utilisateur de rentrer une note ou de taper "fin"
// chaque note est sauvegardée dans un tableau $notes
// à la fin on affiche le tableau de note sous dorme de liste

// TANT QUE l'utilisateur ne tape pas "fin"
//   On ajoute la note tapée au tableau notes
// POUR CHAQUE note DANS notes
//   ON AFFICHE "- note"

// $notes = [];
// $action = null;

// while ($action !== 'fin') { /* TANT QUE l'utilisateur ne tape pas "fin" */
//     $action = readline('Entrer une nouvelle note (ou \'fin\' pour terminer la saisie) :');
//     /*On ajoute la note tapée au tableau notes*/
//     if ($action !== 'fin') {
//         $notes[] = (int)$action;
//     }
// }

// //POUR CHAQUE note DANS notes
// foreach ($notes as $note) {
//     // ON AFFICHE "- note"
//     echo "- $note \n";
// }

/*
On veut demander à l'utilisateur de rentrer les horaires d'ouverture d'un magasin
On demande à l'utilisateur de rentrer une heure et on lui dira si le magasin est ouvert
*/

// On demande à l'utilisateur de rentrer un créneaux;
// On demande une heure d'ouverture;
// On demande une heure de fin;
// On vérifie que l'heure de début < l'heure de fin
// On demande s'il veut ajouter un créneaux (o/n);
// On demande à l'utilisateur de rentrer une heure;
// On affiche l'état du magasin;

// $creneaux = [];

// while (true) {
//     $debut = (int)readline('Heure de d\'ouverture : ');
//     $fin = (int)readline('Heure de fermeture : ');
//     if ($debut >= $fin) {
//         echo "Le créneaux ne peut pas être enregistré car l'heure d'ouverture ($debut) est supérieure à l'heure de fermeture ($fin).";
//     } else {
//         $action = readline('Voulez-vous enregistrer un nouveau créneau ?');
//         if ($action === 'n') {
//             break;
//         }
//     }
// }


for ($x=0; $x <=5 ; $x++) { 
    echo 'La variable \'x\' contient la valeur : ' .$x. "\n";
}