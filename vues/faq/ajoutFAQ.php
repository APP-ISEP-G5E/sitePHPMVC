<?php
/**
 * Vue : ajouter une question à la FAQ
 */
?>
<div id="contenuAccueil">
    <h1 class="addFAQ">Ajouter une question</h1>
    <div id="blocAjout">
        <form class="formAdd" method="POST" action="">
            <label for="ajoutQuestion">Veuillez saisir la question </label>
            <textarea name="ajoutQuestion" rows="5" cols="120" required></textarea>
            <label for="ajoutReponse">Veuillez saisir la réponse </label>
            <textarea name="ajoutReponse" rows="5" cols="120" required></textarea>
            <div class="blocBTN">
                <input type="submit" value="Publier">
                <a class="styleBTN addBTN" href="index.php?cible=admin&fonction=faq">Annuler</a>
            </div>
        </form>
    </div>
</div>