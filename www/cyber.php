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
        // Fonction Notification
        function addNotification(color, text, text_color) {
            var div = document.createElement("div");
            div.classList.add("notifbut");
            div.style.backgroundColor = color;
            div.textContent = text;
            div.style.color = text_color;
            

            // Ajouter la notification à la fin de notififbox
            var parentdiv = document.getElementById("notifbox");
            parentdiv.appendChild(div);

            //Teint le passif de la couleur de la carte appuiée
            var passif = document.getElementById("passifbox");
            passif.style.backgroundColor = color

            // Récupérer toutes les notifications sauf le titre
            var notifications = Array.from(parentdiv.children).filter(child => child.id !== "notiftitle");

            // Supprimer la plus ancienne si plus de 3 notifications sont présentes
            if (notifications.length > 3) {
                parentdiv.removeChild(notifications[0]); // Supprime la première notification ajoutée
            }

            // Fonction pour supprimer la notification la plus récente après 10 secondes
            setTimeout(function() {
                if (notifications.length > 0) {
                    parentdiv.removeChild(notifications[notifications.length - 1]);
                }
            }, 5000);

        }
        
        document.getElementById("cardatt").addEventListener("click", function () {
            addNotification("#AF0000", "Attaque", "white"  );
        });

        document.getElementById("carddef").addEventListener("click", function () {
            addNotification("#07006C", "Défence", "white" );
        });

        document.getElementById("cardpassif").addEventListener("click", function () {
            addNotification("#DADADA", "Passif", "black" );
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