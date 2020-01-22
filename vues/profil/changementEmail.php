<div class="conteneurMail">
    <form method="post" action="">
        <h1><label for="nouvelEmail" class="profil"><?php echo _ADRESSE_EMAIL; ?></label></h1>
        <input type="email" id="email" name="nouvelEmail" placeholder="Nouvelle adresse mail" required>
        <div class="blocBouton">
            <button class="styleBTN" type="submit">Valider</button>
            <a class="styleBTN addBTN" href="index.php?cible=utilisateurs&fonction=profil">Annuler</a>
        </div>
    </form>
</div>

<script>
    function emailValid (email) {
        return /\S+@\S+\.\S+/.test(email)
    }

    document.getElementById("email").addEventListener("input",function(e){
        var email1=e.target.value;
        if (emailValid(email1)){
            e.target.style.color = "green";
        }
        else{
            e.target.style.color = "red";
        }
    });
</script>
