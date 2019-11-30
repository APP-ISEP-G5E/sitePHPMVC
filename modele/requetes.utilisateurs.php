<?php

// on récupère les requêtes génériques
include('requetes.generiques.php');

// requêtes spécifiques à la table des capteurs


/**
 * Recherche un utilisateur en fonction du nom passé en paramètre
 * @param PDO $bdd
 * @param string $nom
 * @return array
 */
function rechercheParNom(PDO $bdd, string $nom): array {
    
    $statement = $bdd->prepare('SELECT * FROM  utilisateur WHERE username = :username');
    $statement->bindParam(":username", $value);
    $statement->execute();
    
    return $statement->fetchAll();
    
}

/**
 * Vérifie si l'utilisateur existe dans la BDD
 * @param array $utilisateur
 */
function bddContient(PDO $bdd, array $utilisateur) {
    $query=$bdd->prepare('SELECT nom,prenom,adresse_mail,numero_telephone,login,mot_de_passe,type FROM utilisateur WHERE login = :pseudo');
    $query->bindValue(':pseudo',$utilisateur['username'], PDO::PARAM_STR);
    $query->execute();
    return $query->fetch();
}

?>
