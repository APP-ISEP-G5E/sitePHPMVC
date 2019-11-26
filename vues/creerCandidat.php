<div class="haut0"><p>Gestion des droits d'accès</p></div>

<div class="ensemble">
    <div class="gauche">
        <div class="haut">
            <p>Créer un compte candidat</p>
        </div>
        <form method="post">       <!--action="traitement.php"-->
            <fieldset>
                <div>
                    <label for="pseudo">Nom d'utilisateur<br/></label>
                    <input type="text" name="pseudo" id="pseudo" autofocus required/>
                    <span class="commentaire"><br/>Un mot de passe aléatoire sera envoyé au candidat <br/><br/></span>
                </div>
                <div>
                    <label for="mailCandidat">Adresse courriel du candidat<br/></label>
                    <input type="email" name="email" id="mailCandidat" required/>
                </div>
                <div>

                    <label for="passAdmin"><br/>Votre mot de passe<br/></label>
                    <input type="password" name="pass" id="passAdmin" required/>
                </div>

            </fieldset>
            <input type="submit" value="Confirmer"/>
        </form>

    </div>


    <div class="droit">
        <div class="haut">
            <p>Supprimer un compte candidat</p>
        </div>
        <form method="post">       <!--action="traitement.php"-->
            <fieldset>
                <div>
                    <label for="pseudo">Nom d'utilisateur<br/></label>
                    <input type="text" name="pseudo" class="pseudo" autofocus required/>
                    <!--ici on n'a pas id="pseudo" mais class="pseudo", créera un potentiel bug-->
                </div>
                <div>
                    <label for="nom">Nom du candidat<br/></label>
                    <input type="text" name="nom" id="nom" required/>
                </div>
                <div>
                    <label for="prenom">Prénom du candidat<br/></label>
                    <input type="text" name="prenom" id="prenom" required/>
                </div>
                <div>
                    <label for="passAdmin">Votre mot de passe<br/></label>
                    <input type="password" name="pass" class="passAdmin" required/>
                    <!--ici on n'a pas id="nom" mais un class, créera un potentiel bug-->
                </div>

            </fieldset>
            <input type="submit" value="Confirmer"/>
        </form>

    </div>
</div>