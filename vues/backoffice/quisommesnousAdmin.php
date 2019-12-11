<div>
    <div id="vide">

    </div>

    <div id="contenuQSN">  <!--même mise en forme que les mentions légales-->
        <div id="parametrer">
            <form method="POST" action="">
                <div class="input">
                <textarea name="contenuQSN" class="ML" rows="10" cols="120"><?php //pour afficher le texte deja présent
                    foreach ($donneesQSN as $element) {
                        if ($element['idFixe'] == 5) {     //5 correspond à l'id de QSN
                            echo $element['donneeFixe'];
                        }
                    } ?>
                </textarea>
                </div>
                <input type="submit" value="Modifier le contenu de Qui sommes-nous">
            </form>
        </div>
    </div>

    <div id="vide"></div>
</div>
</div>
