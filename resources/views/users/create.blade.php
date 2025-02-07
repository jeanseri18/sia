@extends('layouts.app')

@section('content')
@include('sublayouts.user')

<div class=" container" >
<form action="{{ route('users.store') }}" method="POST">

<div class="row " >
    <div class="col-md-6">
        <div class="card" style="background:#F3F6F9; padding:20px;">
          <h3 style="color:#033765">Creer un utilisateur</h3><hr/>
        @csrf
        <div class="form-group mt-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="utilisateur">Utilisateur</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="actif">Actif</option>
                <option value="inactif">Inactif</option>
            </select>
        </div><br>
        <button type="submit" class="btn btn-primary">Creer</button>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card" style="background:#F3F6F9; padding:20px;">
        
        <div class="form-group ">
        <h3 style="color:#033765">Assign Buses</h3><hr/>
            @foreach($buses as $bus)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="buses[]" value="{{ $bus->id }}" id="bus{{ $bus->id }}">
                    <label class="form-check-label" for="bus{{ $bus->id }}">
                        {{ $bus->nom }}
                    </label>
                </div>
            @endforeach
        </div>
        @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    </div>
    </div>
    </form></div>
@endsection
