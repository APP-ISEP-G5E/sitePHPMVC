<div class="conteneurML">
    <div id="vide">

    </div>
    <?php
    require(__DIR__ . "/../header/mentionLegale.php");
    ?>
    <div id="contenuML">
        <div id="parametrer">

            <form method="POST" action="">
                <div class="input">
                    <textarea name="contenuML" class="ML" rows="10"
                              cols="120" required><?php //pour afficher le texte deja présent
                        foreach ($donneesML as $element) {
                            if ($element['idFixe'] == 2) {     //2 correspond à l'id des Mentions Légales
                                echo $element['donneeFixe'];
                            }
                        } ?>
                    </textarea>
                    <input type="submit" value="Modifier les mentions légales">
                </div>
            </form>

        </div>
    </div>
    <div id="vide">

    </div>
</div>
