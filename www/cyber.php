<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cyber-style.css">
    <title>CyberGame</title>
    
</head>

<?php
    $nb = 0; 
?>


<body>
    <main>
        <!-- Map-->
        <div id="map">
            <button class="point" id="point-supermarche" style="top: 32%; left: 7.5%;" data-info="Supermarché"></button>
            <button class="point" id="point-boutique" style="top: 51.5%; left: 57.5%;" data-info="Boutique"></button>
            <button class="point" id="point-vetement" style="top: 32.5%; left: 53%;" data-info="Vetement"></button>
            <button class="point" id="point-resto" style="top: 37%; left: 82%;" data-info="Resto"></button>
            <button class="point" id="point-eglise" style="top: 33%; left: 79%;" data-info="Eglise"></button>
            <button class="point" id="point-maison" style="top: 2.5%; left: 39.5%;" data-info="Maison"></button>
            <button class="point" id="point-sport" style="top: 74%; left: 13%;" data-info="Sport"></button>
        </div>
            <div class="baction">
                <div id="bbandeau">
                    <button class="cardbut" id="cardatt"></button>
                    <button class="cardbut" id="carddef"></button>
                    <button class="cardbut" id="cardpassif"></button>
                    <div class="cardbut" id="binfo"><div id="binfo2"></div></div>
                </div>
                
            </div> 
        </div>
    </main>

    <script>
        function addNotification(color, text) {
            var div = document.createElement("div");
            div.classList.add("notifbut");
            div.style.backgroundColor = color;
            div.textContent = text;

            var parentdiv = document.getElementById("notifbox");
            parentdiv.appendChild(div);

            // Récupérer toutes les notifications sauf le titre
            var notifications = Array.from(parentdiv.children).filter(child => child.id !== "notiftitle");

            // Supprimer la plus ancienne si plus de 5 notifications sont présentes
            if (notifications.length > 3) {
                parentdiv.removeChild(notifications[0]); // Supprime la première notification ajoutée
            }
        }

        document.getElementById("cardatt").addEventListener("click", function () {
            addNotification("red", "Rouge");
        });

        document.getElementById("carddef").addEventListener("click", function () {
            addNotification("blue", "Bleu");
        });

    </script>
    
    <aside>
        <!-- Téléphone-->
        <div class="notif">
            <div id="notifbox">
                <div class="notifbut" id="notiftitle"><b><p>NOTIFICATION</p></b></div>
                <div class="notifbut" id="notifdef">DEFENCE<br><p><?php echo $nb; ?></p></div>
                <div class="notifbut" id="notifatt">ATTAQUE<br><p> 1000</p> </div>
                <div class="notifbut" id="notifarg">ARGENT<br><p> 10 </p></div>
            </div>
        </div>
        
        <!-- Passif-->
        <div id="passif">
            <div id="passifbox">

            </div>
        </div>
    </aside>
</body>


</html>