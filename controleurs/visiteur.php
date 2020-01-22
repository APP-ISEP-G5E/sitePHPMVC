<?php

if (session_status() != 2) {
    session_start();
}

include('./modele/requetes.utilisateurs.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = htmlspecialchars($_GET['fonction']);
}

if (!isset($_COOKIE['connecter']) || empty($_COOKIE['connecter'])) {
    setcookie("connecter", "false", time()+3600);  /* expire dans 1 heure */
}

if (!isset($_SESSION['type']) || empty($_SESSION['type'])) {
    $_SESSION['type'] = 'null';
}
$alerte = false;

switch ($function) {

    case 'accueil':
        $title = "Accueil";
        if ($_SESSION['type'] == 'null') {
            setcookie("connecter", "false", time() + 3600);
            $css = "accueil/CSSaccueil";
            $vue = "accueil/accueil";
        } elseif ($_SESSION['type'] == 'candidat') {
            $css = "accueil/CSSaccueil";
            $vue = "accueil/accueilClient";
        } elseif ($_SESSION['type'] == 'gestionnaire') {
            $css = "accueil/CSSnav";
            $vue = "accueil/accueilGestionnaire";
        } elseif ($_SESSION['type'] == 'admin') {
            $css = "accueil/CSSnav";
            $vue = "accueil/accueilAdmin";
        }
        $donneesQSN = recupereTous($bdd, "donneesfixes");
        break;

    case 'contacter':
        $css = "header/CSSlegal";
        $vue = "header/nousContacter";
        $title = "Nous Contacter";
        $donneesNousContacter = recupereTous($bdd, "donneesfixes");
        break;

    case 'cgu':
        $css = "header/CSSlegal";
        $vue = "header/cgu";
        $title = "CGU";
        $donneesCGU = recupereTous($bdd, "donneesfixes");
        break;

    case 'mentionLegale':
        $css = "header/CSSlegal";
        $vue = "header/mentionLegale";
        $title = "Mentions légales";
        $donneesML = recupereTous($bdd, "donneesfixes");
        break;

    case 'langue':
        $vue = "accueil/accueil";
        $css = "accueil/CSSaccueil";
        $title = "Accueil";
        if ($_COOKIE['lang'] == "fr") {
            setcookie("lang", "en", time()+3600);  /* expire dans 1 heure */
        } elseif ($_COOKIE['lang'] == "en") {
            setcookie("lang", "fr", time()+3600);  /* expire dans 1 heure */
        }
        header('Refresh: 0.1,index.php?cible=visiteur&fonction=accueil');
        break;

    case 'connexion':
        if ($_COOKIE['connecter'] == "false") {
            $css = "connexion/CSSconnexion";
            $vue = "connexion/connexion";
            $title = "Connexion";
            // Cette partie du code est appelée si le formulaire a été posté
            if (isset($_POST['connex_login']) and isset($_POST['connex_mdp'])) {
                $values = [
                    'username' => htmlspecialchars($_POST['connex_login']),
                    'password' => htmlspecialchars($_POST['connex_mdp'])
                ];
                $connexion = bddContient($bdd, $values);
                if ($connexion['mot_de_passe'] == HachagePassword(htmlspecialchars($_POST['connex_mdp']))) {
                    setcookie("connecter", "true", time()+3600);  /* expire dans 1 heure */
                    $_SESSION['type'] = $connexion['type'];
                    $_SESSION['nom'] = $connexion['nom'];
                    $_SESSION['prenom'] = $connexion['prenom'];
                    $_SESSION['numero_telephone'] = $connexion['numero_telephone'];
                    $_SESSION['email'] = $connexion['adresse_mail'];
                    $_SESSION['login'] = $connexion['login'];
                    $_SESSION['id'] = $connexion['id'];
                    if ($connexion['type'] == 'admin') {
                        $css = "accueil/CSSnav";
                        $vue = "accueil/accueilAdmin";
                        $title = "Accueil Admin";
                    } elseif ($connexion['type'] == 'gestionnaire') {
                        $css = "accueil/CSSnav";
                        $vue = "accueil/accueilGestionnaire";
                        $title = "Accueil Gestionnaire";
                    } elseif ($connexion['type'] == 'candidat') {
                        $css = "accueil/CSSaccueil";
                        $vue = "accueil/accueilClient";
                        $title = "Accueil";
                        $donneesQSN = recupereTous($bdd, "donneesfixes");   //sinon dès qu'on se connecte en tant que candidat, le contenu de QSN bug
                    }
                    header("Refresh: 0.1,index.php?cible=visiteur&fonction=accueil");
                } else {
                    $alerte = "Login ou mot de passe incorrect";
                }

            }
        } else {
            $css = "connexion/CSSconnexion";
            $vue = "connexion/deconnexion";
            $title = "Deconnexion";
            setcookie("connecter", "false", time()+3600);  /* expire dans 1 heure */
            session_destroy();
            header("Refresh: 0.1,index.php?cible=visiteur&fonction=accueil");
        }
        break;

    case 'faq':
        $title = "FAQ";
        $vue = "faq/faq";
        $css = "faq/CSSfaq";
        $donneesfaq = recupereTous($bdd, "faq");
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $css = "CSSerreur";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header/header.php');
include('vues/' . $vue . '.php');
if ($vue == 'accueil/accueil' or $vue == 'accueil/accueilClient') {
    include('vues/header/footer.php');
} else {
    include('vues/header/footerFixed.php');
}
