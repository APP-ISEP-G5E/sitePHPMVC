<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur de l'admin
 */
// on vérifie bien que le visiteur est un admin, puis on appelle le modèle qui fait appel aux requetes génériques
if ($_SESSION['type'] == "admin") {
    include('./modele/requetes.admin.php');
} else {
    throw new Exception("Vous vous êtes égaré.");
}


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = htmlspecialchars($_GET['fonction']);
}
$alerte = false;

switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        $css = "accueil/CSSnav";
        $vue = "accueil/accueilAdmin";
        $title = "Accueil Admin";
        break;

    case 'modifierMdp':
        $css = "profil/CSSchangement";
        $vue = "profil/changementMdp";
        $title = "Changement mot de passe";

        $values = ['username' => $_SESSION['login']];
        $ancienMdp = bddPassword($bdd, $values);
        if (isset($_POST['ancienMdp']) && isset($_POST['nouveauMdp']) && isset($_POST['confirmationNouveauMdp'])) {
            if (($_POST['ancienMdp'] == $ancienMdp) && ($_POST['nouveauMdp'] == $_POST['confirmationNouveauMdp'])) {
                $req = $bdd->prepare('UPDATE utilisateur SET mot_de_passe = :nvmdp WHERE login = :lgn');
                $req->execute(array(
                    'nvmdp' => $_POST['nouveauMdp'],
                    'lgn' => $_SESSION['login']
                ));
            }
        }
        break;

    case 'modifierNumeroTelephone':
        $css = "profil/CSSchangement";
        $vue = "profil/changementNumero";
        $title = "Changement Numero";
        $values = ['username' => $_SESSION['login']];
        if (isset($_POST['nouveauNumero'])) {
            $req = $bdd->prepare('UPDATE utilisateur SET numero_telephone = :nve WHERE login = :lgn');
            $req->execute(array(
                'nve' => $_POST['nouveauNumero'],
                'lgn' => $_SESSION['login']
            ));
            $_SESSION['numero_telephone'] = htmlspecialchars($_POST['nouveauNumero']);    //pour actualiser l'affichage de la page Mon profil
        }
        break;

    case 'modifierEmail':
        $css = "profil/CSSchangement";
        $vue = "profil/changementEmail";
        $title = "Changement Email";
        $values = ['username' => $_SESSION['login']];
        if (isset($_POST['nouvelEmail'])) {
            $req = $bdd->prepare('UPDATE utilisateur SET adresse_mail = :nve WHERE login = :lgn');
            $req->execute(array(
                'nve' => $_POST['nouvelEmail'],
                'lgn' => $_SESSION['login']
            ));
            $_SESSION['email'] = htmlspecialchars($_POST['nouvelEmail']);
        }
        break;

    case 'donneesUtilisateurs' :
        $title = "Données des Utilisateurs";
        $donneesUtilisateurs = recupereDonneesUtilisateurs($bdd);
        $vue = "resultat/donnees_des_candidats";
        $css = "user/CSSuser";
        break;

    /**
     * Alerte
     */

    case 'alerteTemperature':
        $title = "Alertes des Capteurs de températures";
        $vue = "alerte/alerteTemperature";
        $css = "alerte/CSSalertes";
        break;

    case 'alerteCardiaque':
        $title = "Alertes des Capteurs cardiaques";
        $vue = "alerte/alerteCardiaque";
        $css = "alerte/CSSalertes";
        break;

    case 'alerteSonore':
        $title = "Alertes des Capteurs sonores";
        $vue = "alerte/alerteSonore";
        $css = "alerte/CSSalertes";
        break;

    /**
     * Actionneur
     */

    case 'actionneurLumineux':
        $title = "Actionneur Lumineux";
        $vue = "actionneur/actionneurLumineux";
        $css = "actionneur/CSSactionneur";
        break;

    case 'actionneurSonore':
        $title = "Actionneur Sonore";
        $vue = "actionneur/actionneurSonore";
        $css = "actionneur/CSSactionneur";
        break;

    case 'modifCGU':
        $title = "Modifier les CGU";
        $vue = "backoffice/cguAdmin";
        $css = "header/CSSlegal";
        $donneesFixes = "donneesfixes";   //petit 'f' pour fixes
        $donneesCGU = recupereTous($bdd, $donneesFixes);
        if (isset($_POST['contenuCGU'])) {
            if ($_POST['contenuCGU'] == "") {
                $alerte = "Aucune saisie";
            } else {
                $contenuCGU = htmlspecialchars($_POST['contenuCGU']);
                $retour = modifierCGU($bdd, $contenuCGU);
                if ($retour) {
                    $alerte = "Modification réussie";
                    header('Refresh: 0.5, index.php?cible=admin&fonction=modifCGU');  // refresh dans 0.5sec
                } else {
                    $alerte = "La modification des CGU n'a pas fonctionné";
                }
            }
        }
        break;

    case 'modifMentionsLegales':
        $title = "Modifier les Mentions légales";
        $vue = "backoffice/mentionLegaleAdmin";
        $css = "header/CSSlegal";
        $donneesFixes = "donneesfixes";   //petit 'f' pour fixes
        $donneesML = recupereTous($bdd, $donneesFixes);
        if (isset($_POST['contenuML'])) {
            if ($_POST['contenuML'] == "") {
                $alerte = "Aucune saisie";
            } else {
                $contenuML = htmlspecialchars($_POST['contenuML']);
                $retour = modifierMentionLegale($bdd, $contenuML);
                if ($retour) {
                    $alerte = "Modification réussie";
                    header('Refresh: 0.5, index.php?cible=admin&fonction=modifMentionsLegales');  //refresh dans 0.5sec
                } else {
                    $alerte = "La modification des mentions légales n'a pas fonctionné";
                }
            }
        }
        break;

    case 'modifNousContacter':
        $title = "Modifier la page Nous contacter";
        $vue = "backoffice/nousContacterAdmin";
        $css = "header/CSSlegal";
        $donneesFixes = "donneesfixes";   //petit 'f' pour fixes
        $donneesNousContacter = recupereTous($bdd, $donneesFixes);

        if (isset($_POST['contenuMail'])) {             //modifier le mail de contact
            if ($_POST['contenuMail'] == "") {
                $alerte = "Aucune saisie";
            } else {
                $contenuMail = htmlspecialchars($_POST['contenuMail']);
                $retour = modifierMailSite($bdd, $contenuMail);
                if ($retour) {
                    $alerte = "Modification réussie";
                    header('Refresh: 0.5, index.php?cible=admin&fonction=modifNousContacter');  //refresh dans 0.5sec
                } else {
                    $alerte = "La modification du mail n'a pas fonctionné";
                }
            }
        } elseif (isset($_POST['numeroTelephone'])) {           //modifier le numéro de contact
            if ($_POST['numeroTelephone'] == "") {
                $alerte = "Aucune saisie";
            } else {
                $numeroTelephone = htmlspecialchars($_POST['numeroTelephone']);
                if (preg_match("#[+]?[0-9]{2}([-. ]?[0-9]){4,5}$#", $numeroTelephone)) {    //utilisation des expressions régulières pour controler la saisie de l'utilisateur
                    $retour = modifierNumeroSite($bdd, $numeroTelephone);
                    if ($retour) {
                        $alerte = "Modification réussie";
                        header('Refresh: 0.5, index.php?cible=admin&fonction=modifNousContacter');  //refresh dans 0.5sec
                    } else {
                        $alerte = "La modification du numéro de contact n'a pas fonctionné";
                    }
                } else {
                    $alerte = "Saisie incorrecte";
                }
            }
        }
        break;


    case 'modifQSN':
        $title = "Modifier le contenu de Qui sommes-nous";
        $vue = "backoffice/quisommesnousAdmin";
        $css = "accueil/CSSaccueil";
        $donneesFixes = "donneesfixes";   //petit 'f' pour fixes
        $donneesQSN = recupereTous($bdd, $donneesFixes);
        if (isset($_POST['contenuQSN'])) {
            if ($_POST['contenuQSN'] == "") {
                $alerte = "Aucune saisie";
            } else {
                $contenuQSN = htmlspecialchars($_POST['contenuQSN']);
                $retour = modifierQSN($bdd, $contenuQSN);
                if ($retour) {
                    $alerte = "Modification réussie";
                    header('Refresh: 0.5, index.php?cible=admin&fonction=modifQSN');    //refresh dans 0.5sec
                } else {
                    $alerte = "La modification du contenu Qui sommes-nous n'a pas fonctionné";
                }
            }
        }
        break;

    /**
     *  FAQ
     */

    case 'faq':
        $title = "Modifier FAQ";
        $vue = "faq/faqAdmin";
        $css = "faq/CSSfaq";
        $faq = recupereTous($bdd, "faq");
        break;

    //permet d'ajouter une question de la FAQ
    case 'ajoutFAQ':
        $vue = "faq/ajoutFAQ";
        $css = "faq/CSSfaq";
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['ajoutQuestion']) and isset($_POST['ajoutReponse'])) {
            if ($_POST['ajoutQuestion'] == "" or $_POST['ajoutReponse'] == "") {
                $alerte = "Aucune saisie";
            } else {
                $values = [
                    'question' => htmlspecialchars($_POST['ajoutQuestion']),
                    'reponse' => htmlspecialchars($_POST['ajoutReponse'])
                ];
                // Appel à la BDD à travers une fonction du modèle.
                $retour = addQuestion($bdd, $values);
                if ($retour) {
                    $alerte = "Ajout réussie";
                    header('Refresh: 0.5,index.php?cible=admin&fonction=faq');  // refresh dans 0.5sec
                } else {
                    $alerte = "L'ajout dans la FAQ n'a pas fonctionné";
                }
            }
        }
        break;

    //permet de supprimer une question de la FAQ
    case 'supprimerFAQ':
        $vue = "faq/supprimerFAQ";
        $css = "faq/CSSfaq";
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['id'])) {
            if (empty($_POST["id"])) {
                $alerte = "Aucune saisie";
            } else {
                // Appel à la BDD à travers une fonction du modèle.
                $retour = deleteQuestion($bdd, htmlspecialchars($_POST['id']));
                if ($retour) {
                    $alerte = "Suppression réussie";
                    header('Refresh: 0.5,index.php?cible=admin&fonction=faq');  // refresh dans 0.5sec
                } else {
                    $alerte = "La suppression dans la FAQ n'a pas fonctionné";
                }
            }
        }
        break;

    //permet de modifier une question de la FAQ
    case 'updateFAQ':
        $vue = "faq/updateFAQ";
        $css = "faq/CSSfaq";
        $faq = recupereQuestion($bdd, $_GET['id']);
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['question']) && isset($_POST['reponse'])) {
            if (empty($_POST['question']) OR empty($_POST['reponse'])) {
                $alerte = "Aucune saisie";
            } else {
                // Appel à la BDD à travers une fonction du modèle.
                $values = [
                    'id' => htmlspecialchars($_POST['id']),
                    'question' => htmlspecialchars($_POST['question']),
                    'reponse' => htmlspecialchars($_POST['reponse'])
                ];
                $retour = modifyQuestion($bdd, $values);
                if ($retour) {
                    $alerte = "La modification a réussie";
                    header('Refresh: 0.5,index.php?cible=admin&fonction=faq');  // refresh dans 0.5sec
                } else {
                    $alerte = "La modification dans la FAQ n'a pas fonctionné";
                }
            }
        }
        break;

    /**
     *  Utilisateur
     */
    case 'user' :
        $title = "Liste des Utilisateurs";
        $user = recupereTous($bdd, "utilisateur");
        $vue = "user/user";
        $css = "user/CSSuser";
        break;

    case 'ajoutUSER':
        $vue = "user/ajoutUSER";
        $css = "user/CSSuser";
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date']) && isset($_POST['telephone']) && isset($_POST['taille']) && isset($_POST['poids']) && isset($_POST['type']) && isset($_POST['login']) && isset($_POST['email'])) {
            if (empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['date']) OR empty($_POST['telephone']) OR empty($_POST['taille']) OR empty($_POST['poids']) OR empty($_POST['type']) OR empty($_POST['login']) OR empty($_POST['email'])) {
                $alerte = "Aucune saisie";
            } elseif (!filter_var(htmlspecialchars($_POST['email']), FILTER_VALIDATE_EMAIL)) {
                $alerte = "Adresse email invalide";
            } else {
                $values = [
                    'nom' => htmlspecialchars($_POST['nom']),
                    'prenom' => htmlspecialchars($_POST['prenom']),
                    'date_naissance' => htmlspecialchars($_POST['date']),
                    'telephone' => htmlspecialchars($_POST['telephone']),
                    'taille' => htmlspecialchars($_POST['taille']),
                    'poids' => htmlspecialchars($_POST['poids']),
                    'type' => htmlspecialchars($_POST['type']),
                    'login' => htmlspecialchars($_POST['login']),
                    'email' => htmlspecialchars($_POST['email']),
                    'password' => hachagePassword(chaine_aleatoire(8))
                ];
                // Appel à la BDD à travers une fonction du modèle.
                $retour = addUser($bdd, $values);
                if ($retour) {
                    $alerte = "Ajout réussie";
                    header('Refresh: 0.5,index.php?cible=admin&fonction=user');  // refresh dans 0.5sec
                } else {
                    $alerte = "L'ajout n'a pas fonctionné";
                }
            }
        }
        break;

    case 'updateUSER':
        $vue = "user/updateUSER";
        $css = "user/CSSuser";
        $user = recupereUser($bdd, $_GET['id']);
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date']) && isset($_POST['telephone']) && isset($_POST['taille']) && isset($_POST['poids']) && isset($_POST['type']) && isset($_POST['login']) && isset($_POST['email'])) {
            if (empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['date']) OR empty($_POST['telephone']) OR empty($_POST['taille']) OR empty($_POST['poids']) OR empty($_POST['type']) OR empty($_POST['login']) OR empty($_POST['email'])) {
                $alerte = "Aucune saisie";
            } elseif (!filter_var(htmlspecialchars($_POST['email']), FILTER_VALIDATE_EMAIL)) {
                $alerte = "Adresse email invalide";
            } else {
                // Appel à la BDD à travers une fonction du modèle.
                $values = [
                    'id' => htmlspecialchars($_POST['id']),
                    'nom' => htmlspecialchars($_POST['nom']),
                    'prenom' => htmlspecialchars($_POST['prenom']),
                    'date_naissance' => htmlspecialchars($_POST['date']),
                    'telephone' => htmlspecialchars($_POST['telephone']),
                    'taille' => htmlspecialchars($_POST['taille']),
                    'poids' => htmlspecialchars($_POST['poids']),
                    'type' => htmlspecialchars($_POST['type']),
                    'login' => htmlspecialchars($_POST['login']),
                    'email' => htmlspecialchars($_POST['email'])
                ];
                $retour = modifyUser($bdd, $values);
                if ($retour) {
                    $alerte = "La modification a réussie";
                    header('Refresh: 0.5,index.php?cible=admin&fonction=user');  // refresh dans 0.5sec
                } else {
                    $alerte = "La modification n'a pas fonctionné";
                }
            }
        }
        break;

    case 'deleteUSER':
        $vue = "user/deleteUSER";
        $css = "user/CSSuser";
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['id'])) {
            if (empty($_POST["id"])) {
                $alerte = "Aucune saisie";
            } else {
                // Appel à la BDD à travers une fonction du modèle.
                $retour = deleteUser($bdd, htmlspecialchars($_POST['id']));
                if ($retour) {
                    $alerte = "Suppression réussie";
                    header('Refresh: 0.5,index.php?cible=admin&fonction=user');  // refresh dans 0.5sec
                } else {
                    $alerte = "La suppression n'a pas fonctionné";
                }
            }
        }
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header/header.php');
if ($vue !== 'accueil/accueilAdmin') {
    include('vues/accueil/accueilAdmin.php');
}
include('vues/' . $vue . '.php');
if ($vue == 'accueil/accueilAdmin') {
    include('vues/header/footer.php');
} else {
    include('vues/header/footerFixed.php');
}


