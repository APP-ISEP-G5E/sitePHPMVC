<div id="vide"></div>
<h1>Données des Utilisateurs</h1>
<div id="contenuAnonymesUttilisateurs">
    <div class="blocListeUtilisateurs">
        <div class="blocId">
            <p style="font-weight: bold">ID</p>
            <?php
            foreach ($donneesUtilisateurs as $element) { ?>
                <P><?php echo  $element['id']; ?></P>
            <?php } ?>
        </div>

        <div class="blocResultat">
            <p style="font-weight: bold">RESULTAT</p>
            <?php
            foreach ($donneesUtilisateurs as $element) { ?>
                <P><?php echo  $element['valeur']; ?></P>
            <?php } ?>
        </div>

        <div class="blocDate">
            <p style="font-weight: bold">DATE</p>
            <?php
            foreach ($donneesUtilisateurs as $element) { ?>
                <P><?php echo  $element['instant']; ?></P>
            <?php } ?>
        </div>


    </div>  <!--bloc questionReponse-->
</div>