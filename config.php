<?php
if(empty($_GET['lang'])){
    $_SESSION['lang'] = "fr";
}
else{
    switch($_GET['lang']){
        case "fr":
            $_SESSION['lang'] = "fr";
            break;
        case "en":
            $_SESSION['lang'] = "en";
            break;
        default :
            $_SESSION['lang'] = "fr"; //au cas ou quelqu'un rentre autre chose que fr/en ou it
            break;
    }
}
switch($_SESSION['lang']){
    case "fr":
        $fichier_langage = "traduction/fr.inc";
        break;
    case "en":
        $fichier_langage = "traduction/en.inc";
        break;
}


if ($_SESSION['lang'] == "fr") {
    $drapeau="pictures/drapeau_FR.png";
} else {
    $drapeau="pictures/drapeau_EN.png";
}

include($fichier_langage);
?>
