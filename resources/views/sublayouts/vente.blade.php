<div class="card text-white container" style="background:#033765;padding: 20px;">
    <br>

    <font style="font-size :50px;">Gestion des Ventes</font>

    <div class="row">
        <div class="col-md-3 " style="padding:20px">
            <a href="{{ route('ventes.index') }}" class="btn btn-sm"
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 200px;">Listes des ventes</a>
        </div>
        <div class="col-md-3" style="padding:20px"> <a href="{{ route('ventes.create') }}" class="btn btn-sm"
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 200px;">Formulaire</a>
        </div>
        <div class="col-md-3" style="padding:20px"> <a href="{{ route('ventes.report.form') }}" class="btn btn-sm"
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 200px;">Rapport des ventes</a>
        </div>
    </div>
</div>

<br>