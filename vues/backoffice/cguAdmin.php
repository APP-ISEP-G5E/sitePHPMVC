<?php
require("cgu.php");
?>
<div id="contenuML">  <!--même mise en forme que les mentions légales-->
    <div id="parametrer">
        <form method="POST" action="">
            <div class="input">
                <textarea name="contenuCGU" class="ML" rows="10" cols="120"><?php    //pour afficher le texte deja présent
                    foreach ($donneesCGU as $element){
                        if($element['idFixe'] ==1){     //1 correspond à l'id des CGU
                            echo $element['donneeFixe']; }
                    } ?>
                </textarea>
            </div>
            <input type="submit" value="Modifier les conditions générales d'utilisation">
        </form>
    </div>
</div>
