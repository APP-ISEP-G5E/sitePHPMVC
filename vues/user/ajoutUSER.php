<?php
/**
 * Vue : ajouter un utilisateur
 */
?>
<div id="contenuAccueil">
    <h1 class="addFAQ">Ajouter un utilisateur</h1>
    <div id="blocAjout">
        <form class="formAdd" method="POST" action="">
            <table id="addTable">
                <tr>
                    <td class="left"><label for="login">Login</label></td>
                    <td><input type="text" name="login" value="" required/></td>
                </tr>
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td><input type="text" name="nom" value="" required/></td>
                </tr>
                <tr>
                    <td><label for="prenom">Prenom</label></td>
                    <td><input type="text" name="prenom" value="" required/></td>
                </tr>
                <tr>
                    <td><label for="type">Type</label></td>
                    <td><select name="type">
                           <?php if($_SESSION['type'] == 'admin'){ ?>
                                <option value="gestionnaire">Gestionnaire</option>
                                <option value="candidat">Candidat</option>
                                <option value="admin">Administrateur</option>
                            <?php } else { ?>
                                <option value="candidat">Candidat</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="date">Date de naissance</label></td>
                    <td><input type="date" name="date" value="" required/></td>
                </tr>
                <tr>
                    <td><label for="telephone">Telephone</label></td>
                    <td><input type="tel" name="telephone" value="" required/></td>
                </tr>
                <tr>
                    <td><label for="taille">Taille</label></td>
                    <td><input type="number" name="taille" value="" required/></td>
                </tr>
                <tr>
                    <td><label for="poids">Poids</label></td>
                    <td><input type="number" name="poids" value="" required/></td>
                </tr>
                <tr>
                    <td><label for="email">Adresse mail</label></td>
                    <td><input id="email" type="email" name="email" value="" required/></td>
                </tr>
            </table>
            <div class="blocBTN">
                <input type="submit" value="Ajouter">
                <a class="styleBTN addBTN"
                   href="index.php?cible=gestionnaire&fonction=user">Annuler</a>
            </div>
        </form>
    </div>
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
