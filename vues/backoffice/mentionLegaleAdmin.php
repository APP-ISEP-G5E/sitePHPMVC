<div>
    <div id="vide">

    </div>
<?php
require("mentionLegale.php");
?>
<div id="contenuML">
    <div id="parametrer">
        <form method="POST" action="">
            <div class="input">
                <textarea name="contenuML" class="ML" rows="10" cols="120"><?php    //pour afficher le texte deja présent
                    foreach ($donneesML as $element){
                        if($element['idFixe'] ==2){     //2 correspond à l'id des Mentions Légales
                            echo $element['donneeFixe']; }
                    } ?>
                </textarea>
            </div>
            <input type="submit" value="Modifier les mentions légales">
        </form>
    </div>
</div>
    <div id="vide">

    </div>
</div>
</div>