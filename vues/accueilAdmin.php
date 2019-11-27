<div class="box">
    <div class="box1">
        <div class="dropdown">
            <button onclick="Alertebtn()" class="dropbtn">Alerte</button>
            <div id="alerteDropdown" class="dropdown-content">
                <ul>
                    <div class="borderbox"><a href="">Alerte capteur température</a></div>
                    <div class="borderbox"><a href="">Alerte capteur rythme cardiaque</a></div>
                    <div class="borderbox"><a href="">Alerte capteur sonore</a></div>
                </ul>
            </div>
        </div>
    </div>

    <div class="box2">
        <div class="dropdown">
            <button onclick="Accesbtn()" class="dropbtn">Gestion des droits d'accès</button>
            <div id="accesDropdown" class="dropdown-content">
                <ul>
                    <div class="borderbox"><a href="index.php?cible=admin&fonction=gestcandidat">Créer/supprimer un compte candidat</a></div>
                    <div class="borderbox"><a href="index.php?cible=admin&fonction=gestgestionnaire">Créer/supprimer un compte gestionnaire</a></div>
                    <div class="borderbox"><a href="">Modifier un mot de passe</a></div>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="box">
    <div class="box1">
        <div class="dropdown">
            <button onclick="Capteurbtn()" class="dropbtn">gérer les capteurs</button>
            <div id="capteurDropdown" class="dropdown-content">
                <ul>
                    <div class="borderbox"><a href="">Modifier les seuils des capteurs</a></div>
                    <div class="borderbox"><a href="">Ajouter un capteur</a></div>
                    <div class="borderbox"><a href="">Enlever un capteur</a></div>
                </ul>
            </div>
        </div>
    </div>

    <div class="box2">
        <div class="dropdown">
            <div class="box3">
                <a href="">Données des candidats</a>
            </div>
        </div>
    </div>
</div>

<div class="box">
    <div class="box1">
        <div class="dropdown">
            <button onclick="Acctionneurbtn()" class="dropbtn">gérer les actionneurs</button>
            <div id="acctionneurDropdown" class="dropdown-content">
                <ul>
                    <div class="borderbox"><a href="">Modifier les seuils des actionneurs</a></div>
                    <div class="borderbox"><a href="">Ajouter un Actionneur</a></div>
                    <div class="borderbox"><a href="">Enlever un Actionneur</a></div>
                </ul>
            </div>
        </div>
    </div>

    <div class="box2">
        <div class="dropdown">
            <div class="box3">
                <a href="">Gérer la page FAQ</a>
            </div>
        </div>
    </div>
</div>