<?php
/**
 * Vue : modifier un utilisateur
 */
?>
<div id="contenuAccueil">
    <div id="blocAjout">
        <h1 class="addFAQ">Modifier un utilisateur</h1>
        <form class="formAdd" action="" method="POST">
            <?php if (($_SESSION['type'] == 'gestionnaire' && $user['type'] == "candidat") || $_SESSION['type'] == 'admin') { ?>
                <table id="addTable">
                    <tr>
                        <td class="left"><label for="login">Login</label></td>
                        <td><input type="text" name="login" value="<?php echo $user['login']; ?>" required/></td>
                    </tr>
                    <tr>
                        <td><label for="nom">Nom</label></td>
                        <td><input type="text" name="nom" value="<?php echo $user['nom']; ?>" required/></td>
                    </tr>
                    <tr>
                        <td><label for="prenom">Prenom</label></td>
                        <td><input type="text" name="prenom" value="<?php echo $user['prenom']; ?>" required/></td>
                    </tr>
                    <tr>
                        <td><label for="type">Type</label></td>
                        <td><select name="type">
                                <?php if ($user['type'] == "gestionnaire") { ?>
                                    <option value="gestionnaire">Gestionnaire</option>
                                    <option value="candidat">Candidat</option>
                                    <option value="admin">Administrateur</option>
                                <?php } else if ($user['type'] == "admin") { ?>
                                    <option value="admin">Administrateur</option>
                                    <option value="gestionnaire">Gestionnaire</option>
                                    <option value="candidat">Candidat</option>
                                <?php } else if ($_SESSION['type'] == "admin") { ?>
                                    <option value="candidat">Candidat</option>
                                    <option value="admin">Administrateur</option>
                                    <option value="gestionnaire">Gestionnaire</option>
                                <?php } else { ?>
                                    <option value="candidat">Candidat</option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date">Date de naissance</label></td>
                        <td><input type="date" name="date" value="<?php echo $user['date_naissance']; ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="telephone">Telephone</label></td>
                        <td><input type="tel" name="telephone" value="<?php echo $user['numero_telephone']; ?>"
                                   required/>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="taille">Taille</label></td>
                        <td><input type="number" name="taille" value="<?php echo $user['taille']; ?>" required/></td>
                    </tr>
                    <tr>
                        <td><label for="poids">Poids</label></td>
                        <td><input type="number" name="poids" value="<?php echo $user['poids']; ?>" required/></td>
                    </tr>
                    <tr>
                        <td><label for="email">Adresse mail</label></td>
                        <td><input id="email" type="email" name="email" value="<?php echo $user['adresse_mail']; ?>" required/>
                        </td>
                    </tr>
                </table>
            <?php } else { ?>
                <h3 class="alerte">Vous n'êtes pas autorisé à modifier</h3>
            <?php } ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>

            <div class="blocBTN">
                <input type="submit" value="Valider">
                <a class="styleBTN addBTN"
                   href="index.php?cible=gestionnaire&fonction=user">Annuler</a>
            </div>
        </form>
    </div>
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
