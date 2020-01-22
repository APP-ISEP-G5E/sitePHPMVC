<div id="contenuAccueil">
    <h1 class="suppCapteur">Supprimer un Actionneur</h1>
    <div id="blocSupprimer">
        <form class="formSupprimer" action="" method="POST">
            <div>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET["id"]); ?>"/>
                <label>Êtes-vous sure de vouloir supprimer ce capteur ?</label>
                <p>
                    <input type="submit" value="Oui">
                    <a class="styleBTN" href="index.php?cible=gestionnaire&fonction=actionneur">Non</a>
                </p>
            </div>
        </form>
    </div>
</div>
</div>