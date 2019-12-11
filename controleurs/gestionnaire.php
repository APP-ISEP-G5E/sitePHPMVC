<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur du gestionnaire
 */
// on vérifie bien que le visiteur est un gestionnaire, puis on appelle le modèle qui fait appel aux requetes génériques
if($_SESSION['type']=="gestionnaire"){
    include('./modele/requetes.gestionnaire.php');
} else{
    throw new Exception("Vous vous êtes égaré.");
}

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = htmlspecialchars($_GET['fonction']);
}
$alerte=false;


switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        $css="accueil/CSSnav";
        $vue = "accueil/accueilGestionnaire";
        $title = "Accueil Gestionnaire";
        break;

    case 'alerteTemperature':
        $title="Alertes des Capteurs de températures";
        $vue="alerte/alerteTemperature";
        $css="alerte/CSSalertes";
        break;

    case 'alerteCardiaque':
        $title="Alertes des Capteurs cardiaques";
        $vue="alerte/alerteCardiaque";
        $css="alerte/CSSalertes";
        break;

    case 'alerteSonore':
        $title="Alertes des Capteurs sonores";
        $vue="alerte/alerteSonore";
        $css="alerte/CSSalertes";
        break;

    case 'actionneurLumineux':
        $title="Actionneur Lumineux";
        $vue="actionneur/actionneurLumineux";
        $css="actionneur/CSSactionneur";
        break;

    case 'actionneurSonore':
        $title="Actionneur Sonore";
        $vue="actionneur/actionneurSonore";
        $css="actionneur/CSSactionneur";
        break;

    case 'donneesUtilisateursAnonymes' :
        $title="Données des Utilisateurs Anonymes";
        $donneesUtilisateurs=recupereDonneesUtilisateurs($bdd);
        $vue="resultat/donnees_des_candidats_anonymes";
        $css="resultat/CSSlisteUtilisateurs";
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header/header.php');
if ($vue !== 'accueil/accueilGestionnaire'){
    include('vues/accueil/accueilGestionnaire.php');
}
include ('vues/' . $vue . '.php');
if ($vue == 'accueil/accueilGestionnaire'){
    include('vues/header/footer.php');
}
else{
    include('vues/header/footerFixed.php');
}


