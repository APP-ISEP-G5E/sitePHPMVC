<?php
if($vue=='accueilAdmin' or $vue=='accueilGestionnaire'){
    echo "</div>";
}
?>
<?php
/**
 * Vue : pied de page
 */
?>
<footer id="notFixed">
    <div class="Fin">
        <a class="MenuP2" href="index.php?cible=utilisateurs&fonction=contacter"><?php echo _NOUS_CONTACTER; ?></a>
        <a class="MenuP2" href="index.php?cible=utilisateurs&fonction=cgu"><?php echo _CGU; ?></a>
        <a class="MenuP2" href="index.php?cible=utilisateurs&fonction=mentionLegale"><?php echo _MENTIONS_LEGALES; ?></a>
    </div>
</footer>
</body>
</html>

