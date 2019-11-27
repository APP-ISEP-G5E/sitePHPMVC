<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur de l'admin
 */

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}


switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        $css="CSSaccueil";
        $vue = "accueilAdmin";
        $title = "Accueil Admin";
        break;

    case 'gestcandidat':
        $css="CSSgestionacces";
        $vue="creerCandidat";
        $title="Créer / Supprimer un candidat";
        break;

    case 'gestgestionnaire':
        $css="CSSgestionacces";
        $vue="creerGestionnaire";
        $title="Créer / Supprimer un gestionnaire";
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/header.php');
include ('vues/' . $vue . '.php');
if ($vue == 'accueil'){
    include('vues/footer.php');
}
else{
    include ('vues/footerFixed.php');
}

