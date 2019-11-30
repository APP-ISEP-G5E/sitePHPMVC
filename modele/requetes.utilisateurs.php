<?php

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table
$table = "utilisateur";

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
 * Récupère tous les enregistrements de la table users
 * @param PDO $bdd
 * @return array
 */
function recupereTousUtilisateurs(PDO $bdd): array {
    $query = 'SELECT login,mot_de_passe FROM utilisateur';
    return $bdd->query($query)->fetchAll();
}

/**
 * Ajoute un nouvel utilisateur dans la base de données
 * @param array $utilisateur
 */
function ajouteUtilisateur(PDO $bdd, array $utilisateur) {
    
    $query = ' INSERT INTO utilisateur (username, password) VALUES (:username, :password)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":username", $utilisateur['username'], PDO::PARAM_STR);
    $donnees->bindParam(":password", $utilisateur['password']);
    return $donnees->execute();
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

function typeUtilisateur(PDO $bdd, array $utilisateur) {

}

function modifierReponse(PDO $bdd, $numeroQuestion,$reponse)
{
    $reqr = $bdd->prepare('UPDATE faq SET contenuReponse = :reponse WHERE (idQ = :idQ)');
    $reqr->execute(array(':idQ'=> $numeroQuestion ,':reponse' => $reponse));
}

?>
