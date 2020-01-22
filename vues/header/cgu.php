<div id="vide"></div>
<h1>Conditions Génerales d'utilisation</h1>

<div class="blocCGU">
    <p>
        <?php
        foreach ($donneesCGU as $element) { ?>

            <?php if ($element['idFixe'] == 1) {     //1 correspond à l'id des CGU
                echo nl2br($element['donneeFixe']);
            } ?>

        <?php } ?>
    </p>
</div>


<script>
    //non utilisé
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
