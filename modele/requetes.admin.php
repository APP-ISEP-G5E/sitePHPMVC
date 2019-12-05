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

function recupereDonneesUtilisateurs(PDO $bdd): array {
    $query = 'SELECT id,nom, prenom, valeur, instant FROM utilisateur INNER JOIN mesure ON mesure.Utilisateur_id = utilisateur.id ORDER BY nom,prenom';
    return $bdd->query($query)->fetchAll();
}
/**
 * Ajoute un nouvel utilisateur dans la base de données
 * @param array $utilisateur
 */
function ajouteUtilisateur(PDO $bdd, array $utilisateur) {

    $query = ' INSERT INTO utilisateur (type, login, mot_de_passe,adresse_mail) VALUES (:type, :username, :password, :email)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":type", $utilisateur['type'], PDO::PARAM_STR);
    $donnees->bindParam(":username", $utilisateur['username'], PDO::PARAM_STR);
    $donnees->bindParam(":password", $utilisateur['password']);
    $donnees->bindParam(":email", $utilisateur['email'], PDO::PARAM_STR);
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

/**
 * Vérifie si l'utilisateur existe dans la BDD
 * @param array $utilisateur
 */
function bddPassword(PDO $bdd, array $utilisateur) {
    $query=$bdd->prepare('SELECT mot_de_passe,type FROM utilisateur WHERE login = :pseudo');
    $query->bindValue(':pseudo',$utilisateur['username'], PDO::PARAM_STR);
    $query->execute();
    return $query->fetch();
}

/**
 * Ajoute un nouvel utilisateur dans la base de données
 * @param array $utilisateur
 */
function supprimerUtilisateur(PDO $bdd, array $utilisateur) {

    $query = ' DELETE FROM utilisateur WHERE login=:username AND adresse_mail=:email AND type=:type';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":type", $utilisateur['type'], PDO::PARAM_STR);
    $donnees->bindParam(":username", $utilisateur['username'], PDO::PARAM_STR);
    $donnees->bindParam(":email", $utilisateur['email'], PDO::PARAM_STR);
    return $donnees->execute();
}

/**
 * Verifie si le login existe deja dans la BDD
 * @param array $utilisateur
 */
function existantUtilisateur(PDO $bdd, array $utilisateur) {

    $query=$bdd->prepare('SELECT adresse_mail FROM utilisateur WHERE login = :pseudo');
    $query->bindValue(':pseudo',$utilisateur['username'], PDO::PARAM_STR);
    $query->execute();
    return $query->fetch();

}

function modifierCGU(PDO $bdd, $contenuCGU){
    $req=$bdd->prepare('UPDATE donneesfixes SET donneeFixe = :newCGU WHERE (idFixe = 1)');
    $req->bindValue(':newCGU', $contenuCGU, PDO::PARAM_STR);
    return $req->execute();
}

function modifierMentionLegale(PDO $bdd, $contenuML){
    $req=$bdd->prepare('UPDATE donneesfixes SET donneeFixe = :newML WHERE (idFixe = 2)');
    $req->bindValue(':newML', $contenuML, PDO::PARAM_STR);
    return $req->execute();
}

function modifierNumeroSite(PDO $bdd, $numero){    //le numéro affiché sur la page Nous contacter
    $req=$bdd->prepare('UPDATE donneesfixes SET donneeFixe = :newNumero WHERE (idFixe = 3)');
    $req->bindValue(':newNumero', $numero, PDO::PARAM_STR);
    return $req->execute();
}

function modifierMailSite(PDO $bdd, $mail){      //le mail affiché sur la page Nous contacter
    $req=$bdd->prepare('UPDATE donneesfixes SET donneeFixe = :newMail WHERE (idFixe = 4)');
    $req->bindValue(':newMail', $mail, PDO::PARAM_STR);
    return $req->execute();
}

function modifierQSN(PDO $bdd, $contenuQSN){      //modifier le qui sommes-nous
    $req=$bdd->prepare('UPDATE donneesfixes SET donneeFixe = :newQSN WHERE (idFixe = 5)');
    $req->bindValue(':newQSN', $contenuQSN, PDO::PARAM_STR);
    return $req->execute();
}

?>
