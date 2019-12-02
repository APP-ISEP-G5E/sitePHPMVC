<div id="vide"></div>
<h1>Liste des Utilisateurs inscrits</h1>
<div id="contenuListeUttilisateurs">
    <div class="blocListeUtilisateurs">
        <div class="blocId">
            <p style="font-weight: bold">valeur</p>
            <?php
            foreach ($donneesMesure as $element) { ?>
            <P><?php echo  $element['valeur']; ?></P>
            <?php } ?>
        </div>
        <div class="blocNom">
            <p style="font-weight: bold">Date</p>
            <?php
            foreach ($donneesMesure as $element) { ?>
            <P><?php echo  $element['instant']; ?></P>
            <?php } ?>
        </div>
    </div>  <!--bloc questionReponse-->
</div>