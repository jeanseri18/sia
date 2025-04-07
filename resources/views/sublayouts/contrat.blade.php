<div class="card text-white " style="background:#033765;padding: 20px;">


    <font style="font-size :50px; color:white;">Contrat |  {{ session('contrat_nom') }}|{{ session('ref_contrat') }}</font>
    <br>
<br>
<br>

   </div>



<div class="liens-contrat">
    <a href="#">Détails</a>
    <a href="{{ route('bpu.contrat') }}">BPU</a>
    <a href="#">DQE</a>
    <a href="#">Déboursé</a>
    <a href="{{ route('stock_contrat.index') }}">Stock</a>
    <a href="#">Frais de Chantier</a>
    <a href="#">Demande de Ravitaillement</a>
    <a href="{{ route('factures.index') }}">Facturation</a>
    <a href="{{ route('document_contrat.index') }}">Document</a>
    <a href="{{ route('prestations.index') }}">Artisan</a>
</div>
<style>
    .liens-contrat {
    display: flex;
    gap: 10px;
    color:#033765;
}

<!-- CSS amélioré -->
<style>

    .liens-contrat {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        font-size: 18px;
        font-weight: bold;
    }

    .liens-contrat a {
        text-decoration: none;
        color: #033765;
        padding: 10px;
        transition: color 0.3s ease;
    }

    .liens-contrat a:hover {
        color: #0A8CFF;
        text-decoration: underline;
    }

    .divider {
        border: none;
        height: 2px;
        background-color: #033765;
        margin-top: 5px;
    }
</style>


<hr class="divider"/>