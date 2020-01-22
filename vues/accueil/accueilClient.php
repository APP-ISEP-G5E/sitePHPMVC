</div>
<div>
    <div id="Who">
        <div id="top">
            <div class="scroll_boutons">
                <h2>Résultats</h2>
                <a href="index.php?cible=utilisateurs&fonction=resultats"><img id="flèches"
                                                                               src="pictures/fleches_link.png"
                                                                               height="100px" width="auto"></a>
            </div>

            <div class="scroll_boutons">
                <h2>FAQ</h2>
                <a href="index.php?cible=visiteur&fonction=faq"><img id="flèches" src="pictures/fleches_link.png"
                                                                         height="100px" width="auto"></a>
            </div>
        </div>

        <div id="bottom" style="background: linear-gradient(217deg, rgba(255, 0, 0, .8), rgba(255, 0, 0, 0) 70.71%),
	linear-gradient(127deg, rgba(0, 0, 255, 0.8), rgba(0, 0, 255, 0) 70.71%),
	linear-gradient(336deg, rgba(0, 0, 255, .8), rgba(0, 0, 255, 0) 70.71%) fixed;">
            <div class="scroll_boutons_who">
                <h3> Qui sommes nous ?</h3>
                <a href="#QuiSommesNous"><img id="flèches" src="pictures/fleches.png" height="100px" width="auto"></a>
            </div>
        </div>
    </div>
</div>
<div id="QuiSommesNous">
    <div id="QSNplace"></div>
    <h1>Qui sommes-nous?</h1>
    <p>
        <?php
        foreach ($donneesQSN as $element) {
            if ($element['idFixe'] == 5) {     //idFixe = 5 correspond aux données Qui sommes-nous
                echo nl2br($element['donneeFixe']);
            }
        }
        ?>
    </p>
</div>
<div id="Fplace"></div>

<script>

    function Cobtn() {
        document.getElementById("coDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

</script>
