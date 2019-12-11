<div id="vide"></div>
<h1>Mentions Légales</h1>


<?php
foreach ($donneesML as $element) { ?>
    <div class="blocML">
            <?php if($element['idFixe'] ==2){     //2 correspond à l'id des Mentions Légales
                echo $element['donneeFixe'];
            } ?>
    </div>
<?php } ?>

<script>

    function Cobtn() {
        document.getElementById("coDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
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
