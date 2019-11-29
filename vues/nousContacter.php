<div id="vide"></div>
<h1>Nous Contacter</h1>
<div class="contact">
    <div id="mail">
        <img src="pictures/mail.png" height="100px" width="auto">
        <p> Guillaume.Phillipe@gmail.com</p>
    </div>

    <div id="telephone">
        <img src="pictures/phone.png" height="100px" width="auto">
        <p> +33 06 05 04 85</p>
    </div>

</div>

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