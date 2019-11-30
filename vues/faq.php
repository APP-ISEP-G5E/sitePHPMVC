<div id="vide"></div>
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
<div id="vide"></div>










