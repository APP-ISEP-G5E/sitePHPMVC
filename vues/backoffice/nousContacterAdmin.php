<div class="conteneurNousContacter">
    <?php
    require(__DIR__ . "/../header/nousContacter.php");
    ?>
    <div class="contact">
        <div class="parametrerContact">
            <form method="POST" action="">
                <div class="input">
                    <input type="email" name="contenuMail" placeholder="Modifier votre mail ici" required>
                    <input type="submit" value="Modifier l'adresse mail">
                </div>
            </form>
        </div>

        <div class="parametrerContact">
            <form method="POST" action="">
                <div class="input">
                    <input type="text" name="numeroTelephone" placeholder="Modifier le numéro de téléphone ici"
                           size="28" required>
                    <input type="submit" value="Modifier le numéro de téléphone"/>
                </div>
            </form>
        </div>
    </div>

    <div id="vide"></div>
</div>
</div>
