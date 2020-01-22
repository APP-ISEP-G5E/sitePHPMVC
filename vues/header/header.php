<html>
<head>
    <link rel="stylesheet" type="text/css" href="vues/<?php echo $css ?>.css">
    <link rel="stylesheet" type="text/css" href="vues/header/CSSheader.css">
    <link rel="stylesheet" type="text/css" href="vues/accueil/CSSnav.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#dialog").dialog();
        });
    </script>
    <title><?php echo $title; ?></title>
</head>
<body>
<header>
    <img class="logo" src="pictures/logo-reduit.png" alt="logo" height="44px">
    <label id="burger" for="switch">&#9776;</label>
    <input type="checkbox" id="switch">
    <nav id="navheader" role="navigation">
        <ul>
            <li><a class="MenuP" href="index.php?cible=visiteur&fonction=faq"><?php echo _FAQH; ?></a></li>
            <li><a class="MenuP" href="index.php"><?php echo _ACCUEIL; ?></a></li>
            <?php if(isset($_COOKIE['connecter']) && $_COOKIE['connecter'] == "true"){?>
            <li><a class="MenuP" href="index.php?cible=utilisateurs&fonction=profil"><?php echo _MON_PROFIL; ?></a></li>
            <?php }?>
            <li><a class="MenuP"
                   href="index.php?cible=visiteur&fonction=connexion"><?php if(isset($_COOKIE['connecter']) && $_COOKIE['connecter']=="true"){
                        echo _DECONNEXION;
                    }else{
                        echo _CONNEXION;
                    } ?></a></li>
            <li><a class="MenuP" href="index.php?cible=visiteur&fonction=langue"><img class="drapeau"
                                                                                          src=<?php echo $drapeau; ?>
                                                                                          height="30" width="auto"
                                                                                          alt="drapeau"></a></li>
        </ul>
    </nav>
</header>
<?php if ($alerte) { ?>
    <?php echo '<div id="dialog" title="Information">
    <p>' . $alerte . '</p>
</div>';
} ?>





