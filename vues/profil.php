<body>
<div class="conteneur">
    <h1><?php echo _PROFIL ?></h1>
        <div class="informations">
            <p><span class="profil"><?php echo _NOM_PRENOM; ?> :</span> <?php echo $_SESSION['nom'].' '.$_SESSION['prenom']; ?>
            </p>
            <p><span class="profil"><?php echo _ADRESSE_EMAIL; ?> :</span> <?php echo $_SESSION['email']; ?>
                <a href="index.php?cible=admin&fonction=modifierEmail"><button><?php echo _MODIFIER; ?></button></a>
            </p>
            <p><span class="profil"><?php echo _NUMERO; ?> :</span> <?php echo $_SESSION['numero_telephone']; ?>
                <a href="index.php?cible=admin&fonction=modifierNumeroTelephone"><button><?php echo _MODIFIER; ?></button></a>
            </p>
            <p><a href="index.php?cible=admin&fonction=modifierMdp"><button id="button"><?php echo _MODIFIER_MDP_PERSONNEL; ?></button></a>
            </p>
        </div>
</div>
