<div class="modifActionneur">
    <div id="titre">
        <h1>Modification des capteurs</h1>
    </div>
    <form>             <!--ajouter method="post" action="traitement.php"-->
        <fieldset class="fieldset">
            <legend>Capteur n°<?php echo $_GET['id']; ?> </legend>
            <div class="haut">
                <div>
                    <label>Temps (minutes)<input type="number" min="1" max="20" step="1" required/><br/></label>
                </div>
            </div>
            <div id="conteneur">
                <div class="element">
                    <p>Fréquence d'émission : 0.8 Hz</p><!--la valeur doit être modifiable-->
                    <div class="inputRadio">
                        <input type="radio" name="freqlumineux" value="aleatoire" id="aleatoire" checked/><label
                                class="labelRadio" for="aleatoire">Émission aléatoire</label>
                        <input type="radio" name="freqlumineux" value="rythmee" id="rythmee"/><label class="labelRadio"
                                                                                                     for="aleatoire">Émission
                            rythmée</label>
                    </div>
                    <input class="buttonModif" type="submit" value="Modifier"/>
                </div>
            </div>


            <p>Dernière modification le</p>
            <p>../../..</p>
            <p><br/>par : </p>

            <span class="barre"></span>
            <!--pour la barre verticale , MAIS NE S'ADAPTE PAS LORSQU'ON CHANGE LA TAILLE DE L'ECRAN!-->
            <!--<input type="submit" value="Confirmer" />-->
            <a class="styleBTN" href="index.php?cible=gestionnaire&fonction=capteur">Confirmer</a>
        </fieldset>

    </form>
</div>

