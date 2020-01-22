<?php
$drapeau =null;
if(isset($_COOKIE['lang'])){

}else{
    setcookie("lang", "fr", time()+3600);  /* expire dans 1 heure */
}

switch($_COOKIE['lang']){
    case "fr":
        $fichier_langage = "traduction/fr.inc";
        $drapeau="pictures/drapeau_FR.png";
        break;
    case "en":
        $fichier_langage = "traduction/en.inc";
        $drapeau="pictures/drapeau_EN.png";
        break;
    default :
        $fichier_langage = "traduction/fr.inc";
        $drapeau="pictures/drapeau_FR.png";
}

require($fichier_langage);
?>

