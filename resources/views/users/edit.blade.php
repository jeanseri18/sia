@extends('layouts.app')

@section('content')
@include('sublayouts.user')

<div class=" container" >
<form action="{{ route('users.update', $user->id) }}" method="POST">

<div class="row " >
    <div class="col-md-6">
        <div class="card" style="background:#F3F6F9; padding:20px;">
            <h3 style="color:#033765">Modifier un utilisateur</h3><hr/>
                @csrf
                @method('PUT')

                <div class="form-group mt-3">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="form-group mt-3">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="utilisateur" {{ $user->role == 'utilisateur' ? 'selected' : '' }}>Utilisateur</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="actif" {{ $user->status == 'actif' ? 'selected' : '' }}>Actif</option>
                        <option value="inactif" {{ $user->status == 'inactif' ? 'selected' : '' }}>Inactif</option>
                    </select>
                </div><br>

                <button type="submit" class="btn btn-primary">Modifier</button>
           
        </div>
    </div>

    <div class="col-md-6">
        <div class="card" style="background:#F3F6F9; padding:20px;">
            <h3 style="color:#033765">Assignation des Bus</h3><hr/>
            <div class="form-group mt-3">
                <label for="buses">Assign Buses</label><br>
                @foreach($buses as $bus)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="buses[]" value="{{ $bus->id }}" 
                            id="bus{{ $bus->id }}" 
                            {{ in_array($bus->id, $assignedBuses) ? 'checked' : '' }}>
                        <label class="form-check-label" for="bus{{ $bus->id }}">
                            {{ $bus->nom }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </form>
</div>

@endsection
