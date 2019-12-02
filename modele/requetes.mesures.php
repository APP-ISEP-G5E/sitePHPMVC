<?php

function recuperResultat(PDO $bdd, array $mesure) {
    $query = $bdd->prepare('SELECT valeur,instant FROM mesure INNER JOIN utilisateur ON mesure.Utilisateur_id=utilisateur.id WHERE utilisateur.id = :qui AND mesure.Capteur_Actionneur_idCapteur = :numeroCapteur');
    $query->bindParam(':numeroCapteur',$mesure['capteur'], PDO::PARAM_INT);
    $query->bindParam(':qui',$mesure['idUtilisateur'], PDO::PARAM_INT);
    $query-> execute();
    return $query->fetchAll();
}


/*

$values = [
    'capteur' => 1,
    'idUtilisateur' => 6
];
$donneesMesure = recuperResultat($bdd, $values);
foreach ($donneesMesure as $element) { ?>
    <P><?php echo  $element['valeur']; ?></P>
<?php } */
?>