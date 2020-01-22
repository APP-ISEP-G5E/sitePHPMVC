<div class="ConteneurMdp">
    <h1>Modifier le mot de passe</h1>
    <form method="post" action="">
        <label for="ancienMdp"><?php echo _MDP; ?></label>
        <input type="password" name="ancienMdp" placeholder="Ancien mot de passe" required>

        <label for="nouveauMdp"><?php echo _NOUVEAUMDP; ?></label>
        <input type="password" id="mdp1"  name="nouveauMdp" placeholder="Nouveau mot de passe" required>

        <label for="confirmationNouveauMdp"><?php echo _CMDP; ?></label>
        <input type="password" id="mdp2" name="confirmationNouveauMdp" placeholder="Confirmer votre nouveau mot de passe" required>

        <div class="blocBouton">
            <input type="submit" value="Valider"/>
            <a class="styleBTN addBTN" href="index.php?cible=utilisateurs&fonction=profil">Annuler</a>
        </div>
    </form>
</div>

<script>

    document.getElementById("mdp1").addEventListener("input",function (e){
        var mdp1=e.target.value;
        if (mdp1.length>7){
            e.target.style.color ="green";
        }
        else{
            e.target.style.color ="red";
        }
    });

    document.getElementById("mdp2").addEventListener("input",function (e){
        var mdp1=document.getElementById("mdp1").value;
        var mdp2=e.target.value;
        if (mdp1==mdp2){
            e.target.style.color ="green";
        }
        else{
            e.target.style.color ="red";
        }
    });
</script>
