<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur de l'admin
 */
// on appelle le modèle qui fait appel aux requetes génériques
include('./modele/requetes.admin.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
}
else {
    $function = htmlspecialchars($_GET['fonction']);
}
$alerte=false;

switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        $css="CSSnav";
        $vue = "accueilAdmin";
        $title = "Accueil Admin";
        break;

    case 'gestcandidat':
        $css="CSSgestionacces";
        $vue="creerCandidat";
        $title="Créer / Supprimer un candidat";
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
                    $existe=existantUtilisateur($bdd,$values);
                    if (!empty($existe)){
                        $alerte="Le login est deja existant";
                    }
                    //on verifie si il y a bien une saisie
                    elseif ($_POST['new_user'] == "" or $_POST['new_email'] == "") {
                        $alerte = "Aucune saisie";
                    }
                    elseif(!filter_var(htmlspecialchars($_POST['new_email']), FILTER_VALIDATE_EMAIL)){
                        $alerte="Adresse email non valide";
                    }
                    else {
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
                    $existe=existantUtilisateur($bdd,$values);
                    //on verifie si le login existe dans la bdd
                    if (empty($existe)){
                        $alerte="Le login n'existe pas";
                    }
                    //on verifie si il y a bien une saisie
                    elseif ($_POST['sup_user'] == "" or $_POST['sup_email'] == "") {
                        $alerte = "Aucune saisie";
                    } 
                    elseif(!filter_var(htmlspecialchars($_POST['sup_email']), FILTER_VALIDATE_EMAIL)){
                        $alerte="Adresse email non valide";
                    }
                    else {
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
            }
            else {
                $alerte = "Mot de passe incorrecte";
            }
        }
        break;

    case 'gestgestionnaire':
        $css="CSSgestionacces";
        $vue="creerGestionnaire";
        $title="Créer / Supprimer un gestionnaire";
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
                    $existe=existantUtilisateur($bdd,$values);
                    if (!empty($existe)){
                        $alerte="Le login est deja existant";
                    }
                    elseif ($_POST['new_user'] == "" or $_POST['new_email'] == "") {
                        $alerte = "Aucune saisie";
                    }
                    elseif(!filter_var(htmlspecialchars($_POST['new_email']), FILTER_VALIDATE_EMAIL)){
                        $alerte="Adresse email non valide";
                    }
                    else {
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
                    $existe=existantUtilisateur($bdd,$values);
                    if (empty($existe)){
                        $alerte="Le login n'existe pas";
                    }
                    elseif ($_POST['sup_user'] == "" or $_POST['sup_email'] == "") {
                        $alerte = "Aucune saisie";
                    }
                    elseif(!filter_var(htmlspecialchars($_POST['sup_email']), FILTER_VALIDATE_EMAIL)){
                        $alerte="Adresse email non valide";
                    }
                    else {
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
            }
            else {
                $alerte = "Mot de passe incorrecte";
            }
        }
        break;
        case 'modifierMdp':
        $css = "CSSchangement";
        $vue = "changementMdp";
        $title = "Changement mot de passe";

        $values = ['username' => $_SESSION['login']];
        $ancienMdp = bddPassword($bdd,$values);
        if(isset($_POST['ancienMdp']) && isset($_POST['nouveauMdp']) && isset($_POST['confirmationNouveauMdp'])){
            if(($_POST['ancienMdp']==$ancienMdp) && ($_POST['nouveauMdp'] == $_POST['confirmationNouveauMdp'])){
                $req = $bdd->prepare('UPDATE utilisateur SET mot_de_passe = :nvmdp WHERE login = :lgn');
                $req->execute(array(
                    'nvmdp'=> $_POST['nouveauMdp'],
                    'lgn'=> $_SESSION['login']
                ));
            }
        }
        break;

    case 'modifierNumeroTelephone':
        $css = "CSSchangement";
        $vue = "changementNumero";
        $title = "Changement Numero";
        $values = ['username' => $_SESSION['login']];
        if(isset($_POST['nouveauNumero'])){
            $req = $bdd->prepare('UPDATE utilisateur SET numero_telephone = :nve WHERE login = :lgn');
            $req->execute(array(
                'nve'=> $_POST['nouveauNumero'],
                'lgn'=> $_SESSION['login']
            ));
        }
        break;

    case 'modifierEmail':
        $css = "CSSchangement";
        $vue = "changementEmail";
        $title = "Changement Email";
        $values = ['username' => $_SESSION['login']];
        if(isset($_POST['nouvelEmail'])){
                $req = $bdd->prepare('UPDATE utilisateur SET adresse_mail = :nve WHERE login = :lgn');
                $req->execute(array(
                    'nve'=> $_POST['nouvelEmail'],
                    'lgn'=> $_SESSION['login']
                ));
        }
        break;
        
    case 'listeUtilisateurs' :
            $title="Liste des Utilisateurs";
            $donneesListeUtilisateurs = recupereTous($bdd, "utilisateur");
            $vue= "listeUtilisateurs";
            $css="CSSlisteUtilisateurs";
            break;
        
    case 'donneesUtilisateurs' :
            $title="Données des Utilisateurs";
            $donneesUtilisateurs=recupereDonneesUtilisateurs($bdd);
            $vue="donnees_des_candidats";
            $css="CSSlisteUtilisateurs";
            break;

    case 'faq':
            $title="Modifier FAQ";
            $vue= "faqAdmin";
            $css="CSSfaq";
            $faq="faq";
            $alerte=false;
            $donneesfaq = recupereTous($bdd,$faq);
            // Cette partie du code est appelée si le formulaire a été posté
            if (isset($_POST['ajoutQuestion']) and isset($_POST['ajoutReponse'])) {
                if ($_POST['ajoutQuestion'] == "" or $_POST['ajoutReponse'] == "") {
                    $alerte = "Aucune saisie";
                }
                else {
                    $values = [
                        'question' => htmlspecialchars($_POST['ajoutQuestion']),
                        'reponse' => htmlspecialchars($_POST['ajoutReponse'])
                    ];
                    // Appel à la BDD à travers une fonction du modèle.
                    $retour = ajouterQuestionReponse($bdd, $values);
                    if ($retour) {
                        $alerte = "Ajout réussie";
                    } else {
                        $alerte = "L'ajout dans la FAQ n'a pas fonctionné";
                    }

                }


        }
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
        
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/header.php');
include ('vues/' . $vue . '.php');
if ($vue == 'accueilAdmin'){
    include('vues/footer.php');
}
else{
    include ('vues/footerFixed.php');
}

