@extends('layouts.app')

@section('title', 'Créaion d\'une catégorie')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom de la catégorie</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="color">Couleur de la catégorie</label>
            <input type="color" name="color" id="color" value="{{ old('color') }}">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
@endsection