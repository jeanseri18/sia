<div class="card text-white container" style="background:#033765; padding: 20px;">
 
    <font style="font-size :50px;">Gestion des finances</font>

    <div class="row">
        <div class="col-md-3" style="padding:20px">
            <a href="{{ route('caisse.brouillard') }}" class="btn btn-sm" style="background:#0A8CFF; padding: 5px ; color:white;width: 200px;">Brouillard de caisse</a>
        </div>
        <div class="col-md-3" style="padding:20px">
            <a href="{{ route('caisse.demande-liste') }}" class="btn btn-sm" style="background:#0A8CFF; padding: 5px ; color:white;width: 200px;">Nos demande de depense</a>
        </div>
        <div class="col-md-3" style="padding:20px">
            <button id="btnSaisirDepense" class="btn btn-sm" onclick="openModal('saisirDepenseModal')" style="background:#0A8CFF; padding:5px ; color:white; width: 200px;">Saisir Dépense</button>
        </div>
        <div class="col-md-3" style="padding:20px">
            <button id="btnApprovisionner" class="btn btn-sm" onclick="openModal('approvisionnerModal')" style="background:#0A8CFF; padding:5px ; color:white; width: 200px;">Approvisionner Caisse</button>
        </div>
        <div class="col-md-3" style="padding:20px">
            <button id="btnDemanderDepense" class="btn btn-sm" onclick="openModal('demanderDepenseModal')" style="background:#0A8CFF; padding:5px ; color:white; width: 200px;">faire une demande Dépense</button>
        </div>

       
    </div>
</div>

    <!-- Modal pour saisir une dépense -->
    <div id="saisirDepenseModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('saisirDepenseModal')">&times;</span>
            <h2>Saisir Dépense</h2>
            <form action="{{ route('caisse.saisirDepense', $bus->id) }}" method="POST">
                @csrf
                <input type="number" name="montant" placeholder="Montant" required>
                <input type="text" name="motif" placeholder="Motif" required>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>

    <!-- Modal pour approvisionner la caisse -->
    <div id="approvisionnerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('approvisionnerModal')">&times;</span>
            <h2>Approvisionner Caisse</h2>
            <form action="{{ route('caisse.approvisionnerCaisse', $bus->id) }}" method="POST">
                @csrf
                <input type="number" name="montant" placeholder="Montant" required>
                <input type="text" name="motif" placeholder="Motif" required>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>

    <!-- Modal pour demander une dépense -->
    <div id="demanderDepenseModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('demanderDepenseModal')">&times;</span>
            <h2>Demander Dépense</h2>
            <form action="{{ route('caisse.demandeDepense', $bus->id) }}" method="POST">
                @csrf
                <input type="number" name="montant" placeholder="Montant" required>
                <input type="text" name="motif" placeholder="Motif" required>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>

    <!-- Script JavaScript pour ouvrir et fermer les modals -->
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        // Fermer le modal si l'utilisateur clique en dehors de celui-ci
        window.onclick = function(event) {
            var modals = document.querySelectorAll('.modal');
            modals.forEach(function(modal) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        }
    </script>

    <!-- Styles CSS pour les modals -->
    <style>
        /* Le style général pour les modals */
        .modal {
            display: none; 
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4); 
        }

        /* Le contenu du modal */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        /* Le bouton de fermeture */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Améliorer la lisibilité des formulaires */
        form input, form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
        }

    
    </style>
