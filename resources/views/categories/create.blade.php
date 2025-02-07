@extends('layouts.app')

@section('content')
@include('sublayouts.until')
<div class="container card" style="background:#F3F6F9 ;padding:20px;">
<h3 style="color:#033765">Creer une categorie</h3>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Category Name</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form></div>
@endsection
