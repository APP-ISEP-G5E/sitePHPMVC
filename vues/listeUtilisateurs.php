<div id="vide"></div>
<h1>Liste des Utilisateurs inscrits</h1>
<div id="contenuListeUttilisateurs">
    <div class="blocListeUtilisateurs">
                <div class="blocId">
                    <p style="font-weight: bold">ID</p>
                    <?php
                     foreach ($donneesListeUtilisateurs as $element) { ?>
                         <P><?php echo  $element['id']; ?></P>
                    <?php } ?>
                </div>
                <div class="blocNom">
                    <p style="font-weight: bold">NOM</p>
                    <?php
                    foreach ($donneesListeUtilisateurs as $element) { ?>
                        <P><?php echo  $element['nom']; ?></P>
                    <?php } ?>
                </div>

                <div class="blocPrenom">
                    <p style="font-weight: bold">PRENOM</p>
                    <?php
                    foreach ($donneesListeUtilisateurs as $element) { ?>
                        <P><?php echo  $element['prenom']; ?></P>
                    <?php } ?>
                </div>


    </div>  <!--bloc questionReponse-->
</div>