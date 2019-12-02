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
    $query=$bdd->prepare('SELECT nom,prenom,adresse_mail,numero_telephone,login,id,mot_de_passe,type FROM utilisateur WHERE login = :pseudo');
    $query->bindValue(':pseudo',$utilisateur['username'], PDO::PARAM_STR);
    $query->execute();
    return $query->fetch();
}

function ajouteQuestion(PDO $bdd, $question)
{
    $recupereMax = $bdd->query('SELECT MAX(idQ) as max FROM faq');
    $idQMax = $recupereMax->fetch();      //fetch() renvoie la première ligne récupérée sous un array
    ++$idQMax['max'];     //'max' vient de 'as max' dans la requete recupereMax, (le AUTO_INCREMENT de MySQL bug si fait supprime des questions au milieu)
    //$recupereMax->closeCursor();
    $reqq = $bdd->prepare('INSERT INTO faq(idQ,contenuQuestion) VALUES(:idQNext,:question)');
    $reqq->execute(array(':idQNext'=> $idQMax['max'] ,':question' => $question));
}

function modifierReponse(PDO $bdd, $numeroQuestion,$reponse)
{
    $reqr = $bdd->prepare('UPDATE faq SET contenuReponse = :reponse WHERE (idQ = :idQ)');
    $reqr->execute(array(':idQ'=> $numeroQuestion ,':reponse' => $reponse));
}

?>
