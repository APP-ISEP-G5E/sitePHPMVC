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

    case 'gestcandidat':
        $css = "backoffice/CSSgestionacces";
        $vue = "backoffice/creerCandidat";
        $title = "Créer / Supprimer un candidat";
        // inscription ou suppresion d'un utilisateur
        $alerte = false;
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['verif_mdp'])) {
            $values = [
                'username' => $_SESSION['login'],
            ];
            $connexion = bddPassword($bdd, $values);
            //on verifie que  le mot de passe de l'admin est correcte
            if ($connexion['mot_de_passe'] == htmlspecialchars($_POST['verif_mdp'])) {
                //Pour ajouter un candidat
                if (isset($_POST['new_user']) and isset($_POST['new_email'])) {
                    $values = [
                        'username' => htmlspecialchars($_POST['new_user'])
                    ];
                    //on verifie si l'utilisateur existe
                    $existe = existantUtilisateur($bdd, $values);
                    if (!empty($existe)) {
                        $alerte = "Le login est deja existant";
                    } //on verifie si il y a bien une saisie
                    elseif ($_POST['new_user'] == "" or $_POST['new_email'] == "") {
                        $alerte = "Aucune saisie";
                    } elseif (!filter_var(htmlspecialchars($_POST['new_email']), FILTER_VALIDATE_EMAIL)) {
                        $alerte = "Adresse email non valide";
                    } else {
                        // Tout est ok, on peut inscrire le nouveau candidat
                        $values = [
                            'type' => 'candidat',
                            'username' => htmlspecialchars($_POST['new_user']),
                            'password' => chaine_aleatoire(8), // on genere un mot de passe aleatoire
                            'email' => htmlspecialchars($_POST['new_email'])
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
                //Pour supprimer un candidat
                if (isset($_POST['sup_user']) and isset($_POST['sup_email'])) {
                    $values = [
                        'username' => htmlspecialchars($_POST['sup_user'])
                    ];
                    $existe = existantUtilisateur($bdd, $values);
                    //on verifie si le login existe dans la bdd
                    if (empty($existe)) {
                        $alerte = "Le login n'existe pas";
                    } //on verifie si il y a bien une saisie
                    elseif ($_POST['sup_user'] == "" or $_POST['sup_email'] == "") {
                        $alerte = "Aucune saisie";
                    } elseif (!filter_var(htmlspecialchars($_POST['sup_email']), FILTER_VALIDATE_EMAIL)) {
                        $alerte = "Adresse email non valide";
                    } else {
                        // Tout est ok, on peut supprimer le candidat
                        $values = [
                            'type' => 'candidat',
                            'username' => htmlspecialchars($_POST['sup_user']),
                            'email' => htmlspecialchars($_POST['sup_email'])
                        ];

                        // Appel à la BDD à travers une fonction du modèle.
                        $retour = supprimerUtilisateur($bdd, $values);
                        if ($retour) {
                            $alerte = "Suppression réussie";
                        } else {
                            $alerte = "La suppression dans la BDD n'a pas fonctionné";
                        }
                    }
                }
            } else {
                $alerte = "Mot de passe incorrecte";
            }
        }
        break;

    case 'gestgestionnaire':
        $css = "backoffice/CSSgestionacces";
        $vue = "backoffice/creerGestionnaire";
        $title = "Créer / Supprimer un gestionnaire";
        // inscription d'un nouvel utilisateur
        $alerte = false;
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['verif_mdp'])) {
            $values = [
                'username' => $_SESSION['login'],
            ];
            $connexion = bddPassword($bdd, $values);
            //on verifie que  le mot de passe de l'admin est correcte
            if ($connexion['mot_de_passe'] == htmlspecialchars($_POST['verif_mdp'])) {
                if (isset($_POST['new_user']) and isset($_POST['new_email'])) {
                    //Pour ajouter un gestionnaire
                    $values = [
                        'username' => htmlspecialchars($_POST['new_user'])
                    ];
                    $existe = existantUtilisateur($bdd, $values);
                    if (!empty($existe)) {
                        $alerte = "Le login est deja existant";
                    } elseif ($_POST['new_user'] == "" or $_POST['new_email'] == "") {
                        $alerte = "Aucune saisie";
                    } elseif (!filter_var(htmlspecialchars($_POST['new_email']), FILTER_VALIDATE_EMAIL)) {
                        $alerte = "Adresse email non valide";
                    } else {
                        // Tout est ok, on peut inscrire le nouveau gestionnaire
                        $values = [
                            'type' => 'gestionnaire',
                            'username' => htmlspecialchars($_POST['new_user']),
                            'password' => chaine_aleatoire(8),  // on genere un mot de passe aleatoire
                            'email' => htmlspecialchars($_POST['new_email'])
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
                //Pour supprimer un gestionnaire
                if (isset($_POST['sup_user']) and isset($_POST['sup_email'])) {
                    $values = [
                        'username' => htmlspecialchars($_POST['sup_user'])
                    ];
                    $existe = existantUtilisateur($bdd, $values);
                    if (empty($existe)) {
                        $alerte = "Le login n'existe pas";
                    } elseif ($_POST['sup_user'] == "" or $_POST['sup_email'] == "") {
                        $alerte = "Aucune saisie";
                    } elseif (!filter_var(htmlspecialchars($_POST['sup_email']), FILTER_VALIDATE_EMAIL)) {
                        $alerte = "Adresse email non valide";
                    } else {
                        // Tout est ok, on peut supprimer le gestionnaire
                        $values = [
                            'type' => 'gestionnaire',
                            'username' => htmlspecialchars($_POST['sup_user']),
                            'email' => htmlspecialchars($_POST['sup_email'])
                        ];

                        // Appel à la BDD à travers une fonction du modèle.
                        $retour = supprimerUtilisateur($bdd, $values);
                        if ($retour) {
                            $alerte = "Suppression réussie";
                        } else {
                            $alerte = "La suppression dans la BDD n'a pas fonctionné";
                        }
                    }
                }
            } else {
                $alerte = "Mot de passe incorrecte";
            }
        }
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

    case 'listeUtilisateurs' :
        $title = "Liste des Utilisateurs";
        $donneesListeUtilisateurs = recupereTous($bdd, "utilisateur");
        $vue = "resultat/listeUtilisateurs";
        $css = "resultat/CSSlisteUtilisateurs";
        break;

    case 'donneesUtilisateurs' :
        $title = "Données des Utilisateurs";
        $donneesUtilisateurs = recupereDonneesUtilisateurs($bdd);
        $vue = "resultat/donnees_des_candidats";
        $css = "resultat/CSSlisteUtilisateurs";
        break;

    case 'faq':
        $title = "Modifier FAQ";
        $vue = "faq/faqAdmin";
        $css = "faq/CSSfaq";
        $faq = "faq";
        $alerte = false;
        $donneesfaq = recupereTous($bdd, $faq);
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
                $retour = ajouterQuestionReponse($bdd, $values);
                if ($retour) {
                    $alerte = "Ajout réussie";
                    header('Refresh: 0.5,index.php?cible=admin&fonction=faq');  // refresh dans 0.5sec
                } else {
                    $alerte = "L'ajout dans la FAQ n'a pas fonctionné";
                }

            }


        }
        break;

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


