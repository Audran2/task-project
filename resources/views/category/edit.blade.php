@extends('layouts.app')

@section('title', 'Modification d\'une catégorie')

@section('content')
    <form action="{{ route('category.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom de la catégorie</label>
            <input type="text" name="name" id="name" value="{{ old('name') ?? $category->name }}">
        </div>
        <div>
            <label for="color">Couleur de la catégorie</label>
            <input type="color" name="color" id="color" value="{{ old('color') ?? $category->color }}">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
@endsection