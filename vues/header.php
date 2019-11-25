<html>
<head>
    <link rel="stylesheet" type="text/css" href="vues/<?php echo $css?>.css">
    <link rel="stylesheet" type="text/css" href="vues/CSSheader.css">
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
</head>
<body>
<header>
    <img class="logo" src="pictures/logo-reduit.png" alt="logo" height="44px">
    <label id="burger" for="switch">&#9776;</label>
    <input type="checkbox" id="switch">
    <nav role="navigation">
        <ul>
            <li><a class="MenuP"><?php echo _FAQH; ?></a></li>
            <li><a class="MenuP" href="index.php?"><?php echo _ACCUEIL; ?></a></li>
            <li><a class="MenuP" href="index.php?cible=utilisateurs&fonction=profil"><?php echo _MON_PROFIL; ?></a></li>
            <li><a class="MenuP" href="index.php?cible=utilisateurs&fonction=connexion"><?php echo $_SESSION['connecter']; ?></a></li>
            <li><a class="MenuP" href="index.php?cible=utilisateurs&fonction=langue"><img class="drapeau" src=<?php echo $drapeau;?>
                                                                                          height="30" width="auto" alt="drapeau"></a></li>
        </ul>
    </nav>
</header>
<div id="Hplace"></div>