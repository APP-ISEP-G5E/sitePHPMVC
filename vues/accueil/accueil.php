<div class="accueil_contenu">
        <div id="Who">
            <h3> Qui sommes nous ?</h3>
            <a href="#QuiSommesNous"><img id="flèches" src="pictures/fleches.png" height="100px" width="auto"></a>
        </div>
</div>

<div id="QuiSommesNous">
    <div id="QSNplace"></div>
    <h1>Qui sommes-nous?</h1>
    <p> <?php
        foreach($donneesQSN as $element){
            if($element['idFixe']==5){     //idFixe = 5 correspond aux données Qui sommes-nous
                echo $element['donneeFixe'];
            }
        }
        ?> </p>
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
