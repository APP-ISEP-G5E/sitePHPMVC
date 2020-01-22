<?php
/**
 * Vue : modifier une question de la FAQ
 */
?>
<div id="contenuAccueil">
    <h1 class="addFAQ">Modifier une question</h1>
    <div id="blocAjout">
        <form class="formAdd" action="" method="post">
            <label for="question">Veuillez modifier la question</label>
            <textarea name="question" rows="5" cols="60" required><?php echo $faq['contenuQuestion']; ?></textarea>
            <label for="reponse">Veuillez modifier la reponse</label>
            <textarea name="reponse" rows="5" cols="60" required><?php echo $faq['contenuReponse']; ?></textarea>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
            <div class="blocBTN">
                <input type="submit" value="Valider">
                <a class="styleBTN addBTN" href="index.php?cible=admin&fonction=faq">Annuler</a>
            </div>
        </form>
    </div>
</div>
</div>