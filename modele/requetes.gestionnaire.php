<?php

// on récupère les requêtes génériques
include('requetes.generiques.php');

function recupereDonneesUtilisateurs(PDO $bdd): array
{
    $query = 'SELECT id,nom, prenom, valeur, instant FROM utilisateur INNER JOIN mesure ON mesure.Utilisateur_id = utilisateur.id ORDER BY nom,prenom';
    return $bdd->query($query)->fetchAll();
}

?>