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
    $function = $_GET['fonction'];
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
        // inscription d'un nouvel utilisateur
        $alerte = false;
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['username']) and isset($_POST['password'])) {
            $values = [
                'username' => $_SESSION['nom'],
                'password' => $_POST['password']
            ];
            $connexion = bddContient($bdd, $values);
            //on verifie que  le mot de passe de l'admin est correcte
            if ($connexion['mot_de_passe'] == $_POST['password']){
                // Tout est ok, on peut inscrire le nouvel utilisateur
                $values = [
                    'username' => $_POST['username'],
                    'password' => chaine_aleatoire(8) // on crypte le mot de passe
                ];

                // Appel à la BDD à travers une fonction du modèle.
                $retour = ajouteUtilisateur($bdd, $values);

                if ($retour) {
                    $alerte = "Inscription réussie";
                } else {
                    $alerte = "L'inscription dans la BDD n'a pas fonctionné";
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
        if (isset($_POST['username']) and isset($_POST['password'])) {

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
        break;
        
    case 'listeUtilisateurs' :
            $title="Liste des Utilisateurs";
            $donneesListeUtilisateurs = recupereTous($bdd, "utilisateur");
            $vue= "listeUtilisateurs";
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

