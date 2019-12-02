<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur du gestionnaire
 */
// on appelle le modèle qui fait appel aux requetes génériques
include('./modele/requetes.gestionnaire.php');

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
        $css="CSSnav";
        $vue = "accueilGestionnaire";
        $title = "Accueil Gestionnaire";
        break;

    case 'alerteTemperature':
        $title="Alertes des Capteurs de températures";
        $vue="alerteTemperature";
        $css="CSSalertes";
        break;

    case 'alerteCardiaque':
        $title="Alertes des Capteurs cardiaques";
        $vue="alerteCardiaque";
        $css="CSSalertes";
        break;

    case 'alerteSonore':
        $title="Alertes des Capteurs sonores";
        $vue="alerteSonore";
        $css="CSSalertes";
        break;

    case 'actionneurLumineux':
        $title="Actionneur Lumineux";
        $vue="actionneurLumineux";
        $css="CSSactionneur";
        break;

    case 'actionneurSonore':
        $title="Actionneur Sonore";
        $vue="actionneurSonore";
        $css="CSSactionneur";
        break;

    case 'donneesUtilisateursAnonymes' :
        $title="Données des Utilisateurs Anonymes";
        $donneesUtilisateurs=recupereDonneesUtilisateurs($bdd);
        $vue="donnees_des_candidats_anonymes";
        $css="CSSlisteUtilisateurs";
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/header.php');
include ('vues/' . $vue . '.php');
if ($vue == 'accueilGestionnaire'){
    include('vues/footer.php');
}
else{
    include ('vues/footerFixed.php');
}

