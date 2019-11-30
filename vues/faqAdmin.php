<?php include("faq.php");?>
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
<?php if($alerte){  ?>
    <?php echo '<SCRIPT language="Javascript">alert(\''.$alerte.'\');</SCRIPT>'; }?>
<div id="vide"></div>
<div id="vide"></div>

