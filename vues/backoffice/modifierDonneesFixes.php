<div id="contenuAccueil">
    <h1 class="donneesFixes">Modifier les données fixes</h1>
    <div id="selectionner">
        <form class="formAdd" method="POST" action="">
            <h3 class="titreDF">Quelles données souhaitez-vous modifier ?</h3>
            <table id="addTable">
                <tr>
                    <td><label>Conditions générales d'utilisation</label></td>
                    <td>
                        <a href="index.php?cible=<?php echo $_SESSION['type']; ?>&fonction=modifCGU"
                           title='Modifier la CGU'><img class="stylo" src="pictures/pencil.png" height="32" width="32"
                                                        alt="modifier"></a>
                    </td>
                </tr>
                <tr>
                    <td><label>Mentions légales</label></td>
                    <td>
                        <a href="index.php?cible=<?php echo $_SESSION['type']; ?>&fonction=modifMentionsLegales"
                           title='Modifier la CGU'><img class="stylo" src="pictures/pencil.png" height="32" width="32"
                                                        alt="modifier"></a>
                    </td>
                </tr>
                <tr>
                    <td><label>Nous contacter</label></td>
                    <td>
                        <a href="index.php?cible=<?php echo $_SESSION['type']; ?>&fonction=modifNousContacter"
                           title='Modifier la CGU'><img class="stylo" src="pictures/pencil.png" height="32" width="32"
                                                        alt="modifier"></a>
                    </td>
                </tr>
                <tr>
                    <td><label>Qui sommes-nous ?</label></td>
                    <td>
                        <a href="index.php?cible=<?php echo $_SESSION['type']; ?>&fonction=modifQSN"
                           title='Modifier la CGU'><img class="stylo" src="pictures/pencil.png" height="32" width="32"
                                                        alt="modifier"></a>
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<!--non utilisé-->
<!--<select name="typeDF">
    <option value="modifCGU">Conditions générales d'utilisation</option>
    <option value="modifMentionsLegales">Mentions légales</option>
    <option value="modifNousContacter">Nous contacter</option>
    <option value="modifQSN">Qui sommes-nous ?</option>
</select>-->
