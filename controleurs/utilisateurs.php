<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur de l'utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.utilisateurs.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}

session_start();

if (!isset($_SESSION['connecter']) || empty($_SESSION['connecter']))  {
    $_SESSION['connecter'] = _CONNEXION;
} else {
    $_SESSION['connecter'] = $_SESSION['connecter'];
}

if (!isset($_SESSION['connecter']) || empty($_SESSION['connecter']))  {
    $_SESSION['type'] = 'null';
} else {
    $_SESSION['type'] = $_SESSION['type'];
}

switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        if ($_SESSION['type'] == 'null' || $_SESSION['type'] == 'client') {
            $css = "CSSaccueil";
            $vue = "accueil";
            $title = "Accueil";
        } elseif ($_SESSION['type'] == 'gestionnaire'){
            $css = "CSSaccueil";
            $vue = "accueilGestionnaire";
            $title = "AccueilGestionnaire";
        } elseif ($_SESSION['type'] == 'admin'){
            $css = "CSSaccueil";
            $vue = "accueilAdmin";
            $title = "AccueilAdmin";
        }
        break;


    case 'inscription':
        // inscription d'un nouvel utilisateur
        $vue = "inscription";
        $alerte = false;

        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['username']) and isset($_POST['password'])) {

            if (!estUneChaine($_POST['username'])) {
                $alerte = "Le nom d'utilisateur doit être une chaîne de caractère.";

            } else if (!estUnMotDePasse($_POST['password'])) {
                $alerte = "Le mot de passe n'est pas correct.";

            } else {
                // Tout est ok, on peut inscrire le nouvel utilisateur

                //
                $values = [
                    'username' => $_POST['username'],
                    'password' => crypterMdp($_POST['password']) // on crypte le mot de passe
                ];

                // Appel à la BDD à travers une fonction du modèle.
                $retour = ajouteUtilisateur($bdd, $values);

                if ($retour) {
                    $alerte = "Inscription réussie";
                } else {
                    $alerte = "L'inscription dans la BDD n'a pas fonctionné";
                }
            }
        }
        $title = "Inscription";
        break;

    case 'liste':
        // Liste des utilisateurs déjà enregistrés
        $vue = "liste";
        $title = "Liste des utilisateurs inscrits";
        $entete = "Voici la liste :";

        $liste = recupereTousUtilisateurs($bdd);

        if (empty($liste)) {
            $alerte = "Aucun utilisateur inscrit pour le moment";
        }

        break;

    case 'profil':
        if ($_SESSION['connecter'] == _CONNEXION) {
            $css = "CSSprofil";
            $vue = "Profil";
            $title = "Profil";
        } else{
            $vue = "erreur404";
            $css = "CSSprofil";
            $title = "Non connecter";
        }
        break;

    case 'contacter':
        $css = "CSSlegal";
        $vue = "nousContacter";
        $title = "Nous Contacter";
        break;

    case 'cgu':
        $css = "CSSlegal";
        $vue = "cgu";
        $title = "CGU";
        break;

    case 'mentionLegale':
        $css = "CSSlegal";
        $vue = "mentionLegale";
        $title = "Mentions légales";
        break;

    case 'langue':
        $vue = "accueil";
        $css = "CSSaccueil";
        $title = "Accueil";
        if ($_SESSION['lang'] == "fr") {
            $_SESSION['lang'] = "en";
        } elseif ($_SESSION['lang'] == "en") {
            $_SESSION['lang'] = "fr";
        }
        break;

    case 'connexion':
        if ($_SESSION['connecter'] == _CONNEXION) {
            $css = "CSSconnexion";
            $vue = "connexion";
            $title = "Connexion";
            $alerte = false;
            // Cette partie du code est appelée si le formulaire a été posté
            if (isset($_POST['connex_login']) and isset($_POST['connex_mdp'])) {
                if ($_POST['connex_login'] == "" or $_POST['connex_mdp'] == "") {
                    $alerte = "Aucune saisie";
                } else {
                    $values = [
                        'username' => $_POST['connex_login'],
                        'password' => $_POST['connex_mdp']
                    ];
                    $connexion = bddContient($bdd, $values);
                    if ($connexion['mot_de_passe'] == $_POST['connex_mdp']) {
                        $_SESSION['connecter'] = _DECONNEXION;
                        $_SESSION['type'] = $connexion['type'];
                        $_SESSION['nom'] = $connexion['nom'];
                        $_SESSION['prenom'] = $connexion['prenom'];
                        $_SESSION['numero_telephone'] = $connexion['numero_telephone'];
                        $_SESSION['email'] = $connexion['adresse_mail'];
                        $css = "CSSaccueil";
                        if ($connexion['type'] == 'admin') {
                            $vue = "accueiladmin";
                            $title = 'admin';
                        } elseif ($connexion['type'] == 'gestionnaire') {
                            $vue = "accueilGestionnaire";

                        } elseif ($connexion['type'] == 'client') {
                            $vue = "accueil";

                        }
                    } else {
                        $alerte = "Login ou mot de passe incorrect";
                    }
                }

            }
        } else {
            $css="CSSaccueil";
            $vue = "accueil";
            $title = "Accueil";
            $alerte = false;
            $_SESSION['connecter'] = _CONNEXION;
            $_SESSION['type'] = 'null';
            $_SESSION['nom'] = 'null';
            $_SESSION['prenom'] = 'null';
            $_SESSION['numero_telephone'] = 'null';
            $_SESSION['email'] = 'null';
        }
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header.php');
include('vues/' . $vue . '.php');
if ($vue == 'accueil') {
    include('vues/footer.php');
} else {
    include('vues/footerFixed.php');
}
