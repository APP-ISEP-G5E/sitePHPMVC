</div>
    <div>
        <div id="Who">
            <div id="top">
                <div class="scroll_boutons">
                    <h2>Résultats</h2>
                    <a href="index.php?cible=utilisateurs&fonction=resultats"><img id="flèches" src="pictures/fleches_link.png" height="100px" width="auto"></a>
                </div>

                <div class="scroll_boutons">
                    <h2>Forum</h2>
                    <a href="#"><img id="flèches" src="pictures/fleches_link.png" height="100px" width="auto"></a>
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
    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer scelerisque feugiat vestibulum. Duis vitae cursus risus, eu aliquam lectus. Nullam mattis accumsan lorem, eu mollis risus vulputate et. Nunc ut magna vitae nisl rhoncus tincidunt a non augue. Proin posuere nunc et aliquet hendrerit. Nulla sollicitudin felis arcu, a suscipit est facilisis pellentesque. Nunc lacinia lectus est, in tristique orci ullamcorper vel. Praesent eget mauris non nunc posuere tincidunt eget eu nisi. Pellentesque tristique a turpis vitae ullamcorper. Mauris gravida faucibus cursus. Nullam suscipit tellus eu mi sagittis, id porttitor orci ornare. Aenean nisi ligula, malesuada vitae odio sit amet, lacinia molestie lorem. Praesent pharetra gravida felis a luctus.

        Curabitur interdum interdum leo at malesuada. Donec nec venenatis odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas tempus tortor at pharetra egestas. Donec blandit nulla sed enim egestas tempor. Mauris condimentum bibendum tincidunt. Vestibulum lorem quam, pulvinar vitae volutpat ut, tincidunt non lectus. Phasellus ac sollicitudin risus, sed dictum tortor.

        Donec porttitor neque quis felis accumsan, ac volutpat erat facilisis. Nullam imperdiet, velit malesuada suscipit suscipit, magna tortor aliquet neque, auctor molestie arcu elit et ex. Phasellus aliquam augue felis, ut placerat tellus dignissim vitae. Pellentesque suscipit bibendum neque congue volutpat. Nulla nisi urna, sodales convallis mattis quis, mollis eu mi. Donec tempus, nunc et viverra accumsan, eros lacus sodales nisi, eget malesuada velit mi tincidunt mi. Maecenas tempus pellentesque ante et vehicula. Aliquam ultricies lobortis nulla at auctor. Vivamus pharetra ipsum sit amet neque gravida porta. Pellentesque rhoncus massa lectus, in euismod metus egestas ac. Phasellus convallis, ex non convallis consequat, enim libero auctor ex, eu posuere ante orci at tellus. Nam placerat viverra orci. Nam vulputate lorem a justo laoreet varius.
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
