<h1>FAQ</h1>
<div id="contenuFaq">
    <div class="blocQuestionReponse">
    <?php

    foreach ($donneesfaq as $element) { ?>
        <?php
        if ($element['contenuReponse'] == null && $element['contenuQuestion'] != null) {  /*s'il n'y a pas de contenuReponse mais un contenuQuestion*/
            ?>

            <div class="blocQuestion">
                <?php echo $element['idQ'] .'. ' . $element['contenuQuestion']; ?>
            </div>
        <?php } elseif ($element['contenuReponse'] != null && $element['contenuQuestion'] == null) { ?>
            <div class="blocReponse">
                <?php echo '- ' . $element['contenuReponse']; ?>
            </div>


        <?php } ?>

    <?php } ?>
            </div>  <!--bloc questionReponse-->
</div>










