<?php
/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur de l'utilisateur
 */
if (session_status() != 2){
    session_start();
}
// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.utilisateurs.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}

if (!isset($_SESSION['connecter']) || empty($_SESSION['connecter']))  {
    $_SESSION['connecter'] = _CONNEXION;
} else {
    $_SESSION['connecter'] = $_SESSION['connecter'];
}

if (!isset($_SESSION['type']) || empty($_SESSION['type']))  {
    $_SESSION['type'] = 'null';
}
$alerte=false;

switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        if ($_SESSION['type'] == 'null' || $_SESSION['type'] == 'client') {
            $css = "CSSaccueil";
            $vue = "accueil";
            $title = "Accueil";
        } elseif ($_SESSION['type'] == 'gestionnaire'){
            $css = "CSSnav";
            $vue = "accueilGestionnaire";
            $title = "AccueilGestionnaire";
        } elseif ($_SESSION['type'] == 'admin'){
            $css = "CSSnav";
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


    case 'profil':
        if ($_SESSION['connecter'] == _DECONNEXION) {
            $css = "CSSprofil";
            $vue = "Profil";
            $title = "Profil";
        } else{
            $vue = "connexion";
            $css = "CSSconnexion";
            $title = "Connexion";
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
                        $_SESSION['login'] = $connexion['login'];
                        if ($connexion['type'] == 'admin') {
                            $css = "CSSnav";
                            $vue = "accueilAdmin";
                            $title = "Accueil Admin";
                        } elseif ($connexion['type'] == 'gestionnaire') {
                            $css = "CSSnav";
                            $vue = "accueilGestionnaire";
                            $title = "Accueil Gestionnaire";

                        } elseif ($connexion['type'] == 'client') {
                            $css = "CSSaccueil";
                            $vue = "accueil";
                            $title = "Accueil";
                        }
                    } else {
                        $alerte = "Login ou mot de passe incorrect";
                    }
                }

            }
        } else {
            $css="CSSconnexion";
            $vue = "deconnexion";
            $title = "Deconnexion";
            $alerte = false;
            $_SESSION['connecter'] = _CONNEXION;
            session_destroy();
        }
        break;
        
    case 'faq':
        $title="FAQ";
        $vue="faq";
        $css="CSSfaq";
        $faq="faq";
        $donneesfaq = recupereTous($bdd,$faq);
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $css ="CSSerreur";
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
