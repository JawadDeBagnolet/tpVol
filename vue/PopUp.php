<?php
class PopUp {
    public function showPopup($message) {
        echo '
        <style>
            /* Style pour l\'overlay */
            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Couleur semi-transparente pour l\'effet */
                z-index: 1000;
                display: block;
            }

            /* Style pour le pop-up */
            .popup {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%); /* Centre le pop-up */
                background-color: #fff; /* Couleur de fond */
                padding: 20px; /* Espacement intérieur */
                border-radius: 10px; /* Coins arrondis */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombre autour du pop-up */
                z-index: 1100; /* Au-dessus de l\'overlay */
                width: 300px; /* Largeur fixe (modifiable selon le besoin) */
                text-align: center; /* Centrage du texte et des boutons */
            }

            /* Style du bouton de fermeture */
            #closePopup {
                margin-top: 15px;
                padding: 10px 20px;
                background-color: #28a745; /* Vert */
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 14px;
                transition: background-color 0.3s ease;
            }

            #closePopup:hover {
                background-color: #218838; /* Vert foncé au survol */
            }
        </style>

        <div class="overlay" id="overlay"></div>
        <div class="popup" id="popup">
            <h2>' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</h2>
            <button id="closePopup">Fermer</button>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const popup = document.getElementById("popup");
                const overlay = document.getElementById("overlay");
                const closePopup = document.getElementById("closePopup");

                // Fermer le popup en cliquant sur le bouton
                closePopup.addEventListener("click", () => {
                    popup.style.display = "none";
                    overlay.style.display = "none";
                });
            });
        </script>
        ';
    }
}