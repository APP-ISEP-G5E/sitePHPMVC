<body>
<div class="conteneur">
    <h1><?php echo _PROFIL ?></h1>
    <div class="informations">
        <p>
            <span class="profil"><?php echo _NOM_PRENOM; ?> :</span> <?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom']; ?>
        </p>

        <p><span class="profil"><?php echo _ADRESSE_EMAIL; ?> :</span> <?php echo $_SESSION['email']; ?>
            <a class="pencil" href="index.php?cible=utilisateurs&fonction=changementEmail"
               title='Update Record'><img class="stylo" src="pictures/pencil.png" height="25" width="25"
                                          alt="modifier"></a></p>

        <p><span class="profil"><?php echo _NUMERO; ?> :</span> <?php echo $_SESSION['numero_telephone']; ?>
            <a class="pencil" href="index.php?cible=utilisateurs&fonction=changementNumero"
               title='Update Record'><img class="stylo" src="pictures/pencil.png" height="25" width="25"
                                          alt="modifier"></a></p>
        <a class="styleBTN" href="index.php?cible=utilisateurs&fonction=changementMdp">Modifier mon mot de passe</a>

    </div>
</div>
