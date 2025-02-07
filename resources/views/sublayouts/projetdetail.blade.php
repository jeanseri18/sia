<div class="card text-white container" style="background:#033765;padding: 20px;">


    <font style="font-size :50px; color:white;"> {{ session('projet_nom') }}</font>


    <div class="row">
        <div class="col-md-3 " style="padding:20px">
            <a href="#" class="btn btn-sm"
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 250px; display: inline-block;">Detail
                projet</a>
        </div>
        <div class="col-md-3" style="padding:20px"> <a href="{{ route('stock.index') }}" class="btn btn-sm "
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 200px;">Stock</a>
        </div>
        <div class="col-md-3" style="padding:20px"> <a href="{{ route('contrats.index') }}" class="btn btn-sm "
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 200px;">Listes des contrats</a>
        </div>
        <div class="col-md-3" style="padding:20px"> <a href="{{ route('transferts.index') }}" class="btn btn-sm "
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 200px;">Transfert de stock</a>
        </div>
    </div>


</div>

<br>