<div class="conteneurCGU">
    <div id="vide">

    </div>
    <?php
    require(__DIR__ . "/../header/cgu.php");
    ?>
    <div id="contenuML">  <!--même mise en forme que les mentions légales-->
        <div id="parametrer">
            <form method="POST" action="">
                <div class="input">
                    <textarea name="contenuCGU" class="ML" rows="10"
                              cols="120" required><?php //pour afficher le texte deja présent
                        foreach ($donneesCGU as $element) {
                            if ($element['idFixe'] == 1) {     //1 correspond à l'id des CGU
                                echo $element['donneeFixe'];
                            }
                        } ?>
                    </textarea>
                    <input type="submit" value="Modifier les conditions générales d'utilisation">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
