<div id="connexion">
    <h1 class="connex">Connexion</h1>
    <form method="POST" action="">
        <label for="username"><?php echo _NOM_UTILISA; ?></label>
        <input type="text" id="username" name="connex_login" placeholder="username">

        <label for="password"><?php echo _MDP; ?></label>
        <input type="password" id="password" name="connex_mdp" placeholder="password">

        <input type="checkbox" id="souvenir" value="Rester connecté"/>
        <label for="souvenir"><?php echo _SOUVENIR; ?></label></br>
        <a href="index.php?cible=utilisateurs&fonction=contacter">Mot de passe oublié ?</a>
        <input type="submit" value="SUBMIT" onclick="Message()">
    </form>
</div>
<div id="espace">

</div>

