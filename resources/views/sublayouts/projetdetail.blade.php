<div class="card text-white container" style="background:#033765;padding: 20px;">


    <font style="font-size :50px; color:white;"> Projets : {{ session('projet_nom') }}</font>


    <div class="row">
        <div class="col-md-3 " style="padding:10px">
            <a href="#" class="btn btn-sm"
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 250px; display: inline-block;">Detail
                projet</a>
        </div>
        <div class="col-md-3" style="padding:10px"> <a href="{{ route('contrats.index') }}" class="btn btn-sm "
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 200px;">Listes des contrats</a>
        </div>
        <div class="col-md-3" style="padding:10px"> <a href="{{ route('documents.index') }}" class="btn btn-sm "
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 200px;">Listes des documents</a>
        </div>
        <div class="col-md-3" style="padding:10px"> <a href="{{ route('stock.index') }}" class="btn btn-sm "
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 200px;">Stock</a>
        </div>
   
        <div class="col-md-3" style="padding:10px"> <a href="{{ route('transferts.index') }}" class="btn btn-sm "
                style="background:#0A8CFF; padding: 5px 10px; color:white;width: 200px;">Transfert de stock</a>
        </div>
    </div>


</div>

<br>


<!-- Modal -->
<div class="modal fade" id="transfertModal" tabindex="-1" aria-labelledby="transfertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transfertModalLabel">Transférer du stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('transferts.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Projet Source</label>
                        <select name="id_projet_source" class="form-control" required>
                            @foreach($projets as $projet)
                                <option value="{{ $projet->id }}">{{ $projet->nom_projet }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Projet Destination</label>
                        <select name="id_projet_destination" class="form-control" required>
                            @foreach($projets as $projet)
                                <option value="{{ $projet->id }}">{{ $projet->nom_projet }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
    <label>Article</label>
    <select name="article_id" class="form-control" required>
        @foreach($articles as $article)
            <option value="{{ $article->id }}">{{ $article->nom }}</option>
        @endforeach
    </select>
  </div>


                    <div class="mb-3">
                        <label>Quantité</label>
                        <input type="number" name="quantite" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Date de transfert</label>
                        <input type="date" name="date_transfert" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Transférer</button>
                </form>
            </div>
        </div>
    </div>
</div>