<div id="vide"></div>
<h1>FAQ</h1>
<div id="contenuFaq">
    <div class="blocQuestionReponse">
    <?php
    foreach ($donneesfaq as $element) { ?>
            <div class="blocQuestion">
                <?php echo $element['idQA'] .'. ' . $element['contenuQuestion']; ?>
            </div>
            <div class="blocReponse">
                <?php echo '- ' . $element['contenuReponse']; ?>
            </div>
        <?php } ?>

            </div>  <!--bloc questionReponse-->
</div>










