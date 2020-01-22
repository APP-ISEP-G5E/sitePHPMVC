<?php
/**
 * Vue : ajouter un Actionneur
 */
?>
<div id="contenuAccueil">
    <h1 class="addFAQ">Ajouter un actionneur</h1>
    <div id="blocAjout">
        <form class="formAdd" method="POST" action="">
            <table id="addTable">
                <tr>
                    <td class="left"><label for="idActionneur">Id Actionneur</label></td>
                    <td><input type="text" name="idActionneur" value="" required/></td>
                </tr>
                <tr>
                    <td><label for="typeActionneur">Type Actionneur</label></td>
                    <td><select name="typeActionneur">
                            <option>
                                lumineux
                            </option>
                            <option>
                                sonore
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="uniteCapteur">Unité de l'Actionneur</label></td>
                    <td><input type="text" name="uniteCapteur" value="" required/></td>
                </tr>
            </table>
            <div class="blocBTN">
                <input id="inputAjout" type="submit" value="Ajouter" required>
                <a class="styleBTN addBTN"
                   href="index.php?cible=gestionnaire&fonction=actionneur">Annuler</a>
            </div>
        </form>
    </div>
</div>