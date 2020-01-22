<div class="conteneurQSN">
    <div id="vide">

    </div>

    <h1>Qui sommes-nous?</h1>
    <div class="blocCGU">
        <p>
            <?php
            foreach ($donneesQSN as $element) {
                if ($element['idFixe'] == 5) {     //idFixe = 5 correspond aux données Qui sommes-nous
                    echo nl2br($element['donneeFixe']);
                }
            }
            ?>
        </p>
    </div>
    <div id="contenuQSN">  <!--même mise en forme que les mentions légales -->
        <div id="parametrer">

            <form method="POST" action="">
                <div class="input">
                <textarea class="zoneDeTexte" name="contenuQSN" rows="10"
                          cols="120" required><?php //pour afficher le texte deja présent
                    foreach ($donneesQSN as $element) {
                        if ($element['idFixe'] == 5) {     //5 correspond à l'id de QSN
                            echo $element['donneeFixe'];
                        }
                    } ?>
                </textarea>
                    <input type="submit" value="Modifier le contenu de Qui sommes-nous">
                </div>
            </form>

        </div>
    </div>

    <div id="vide"></div>
</div>

