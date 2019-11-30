<?php

// on récupère les requêtes génériques
include('requetes.generiques.php');

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
 * Ajoute une nouvelle question dans la base de données
 * @param array $question
 */
function ajouterQuestionReponse(PDO $bdd, array $question)
{
    $query = 'INSERT INTO faq (contenuQuestion,contenuReponse) VALUES (:question, :reponse)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":question", $question['question'], PDO::PARAM_STR);
    $donnees->bindParam(":reponse", $question['reponse'],PDO::PARAM_STR);
    return $donnees->execute();

}