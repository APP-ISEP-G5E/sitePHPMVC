<form method="POST" action="">
    <fieldset class="fieldset" style="z-index:5">
        <legend><?php echo _IDENTIF; ?></legend>

        <label class="nu"><?php echo _NOM_UTILISA; ?></label>
        <input type="text" name="connex_login" class="cnu">

        <label class="mp"><?php echo _MDP; ?></label>
        <input type="password" name="connex_mdp" class="cmp">

        <label class="oubli">
            <a href="Nous_Contacter.html"><?php echo _MDP_OUBLIE; ?></a>
        </label>
        <?php echo AfficheAlerte($alerte); ?>
        <button type="submit" name="submit">Se connecter</button>
        <input class="rc" type="checkbox" value="Rester connecté"/>
        <label class="trc"><?php echo _SOUVENIR; ?></label>
    </fieldset>
</form>



