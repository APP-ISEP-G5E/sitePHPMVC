<div id="vide"></div>
<!--ajouter une question-->
<div id="faq">
    <div id="parametrer">
        <form method="POST" action="">
            <div class="label">
                <label for="ajoutQuestion">Veuillez saisir la question </label>
                <label for="ajoutReponse">Veuillez saisir la réponse </label>
            </div>
            <div class="input">
                <textarea name="ajoutQuestion" class="ajoutQuestion" rows="5" cols="60"></textarea>
                <textarea name="ajoutReponse" class="ajoutReponse" rows="5" cols="60"></textarea>
            </div>
            <input type="submit" value="SUBMIT">
        </form>
    </div>
</div>
<div id="contenuFaq">
    <h1>FAQ</h1>
    <?php
    foreach ($donneesfaq as $element) { ?>
        <!--bloc questionReponse-->
        <div class="blocQuestionReponse">
            <div class="blocQuestion">
                <?php echo $element['contenuQuestion']; ?>
            </div>
            <div class="blocReponse">
                <?php echo $element['contenuReponse']; ?>
            </div>
        </div>
    <?php } ?>
</div>
<?php if($alerte){  ?>
    <?php echo '<SCRIPT language="Javascript">alert(\''.$alerte.'\');</SCRIPT>'; }?>
<div id="vide"></div>
<div id="vide"></div>

