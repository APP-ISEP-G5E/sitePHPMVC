<?php
ob_start();
session_start();
require("config.php");

// Activation des erreurs
ini_set('display_errors', 1);

// Appel des fonctions du contrôleur
require("controleurs/fonctions.php");
// Appel des fonctions liées à l'affichage
require("vues/fonctions.php");

// On identifie le contrôleur à appeler dont le nom est contenu dans cible passé en GET
if(isset($_GET['cible']) && !empty($_GET['cible'])) {
    $url = htmlspecialchars($_GET['cible']);
} else {
    $url = 'visiteur';
}

// Appel du contrôleur
require('controleurs/' . $url . '.php');

