<?php
if ($vue == 'accueil/accueilAdmin' or $vue == 'accueil/accueilGestionnaire') {
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
        <a class="MenuP2" href="index.php?cible=visiteur&fonction=contacter"><?php echo _NOUS_CONTACTER; ?></a>
        <a class="MenuP2" href="index.php?cible=visiteur&fonction=cgu"><?php echo _CGU; ?></a>
        <a class="MenuP2" href="index.php?cible=visiteur&fonction=mentionLegale"><?php echo _MENTIONS_LEGALES; ?></a>
    </div>
</footer>
</body>
</html>

