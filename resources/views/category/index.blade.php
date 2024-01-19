@extends('layouts.app')

@section('title', 'Liste des catégories')

@section('content')
    <h1>Liste des catégories</h1>
    <a href="{{ route('category.create') }}">Créer une catégorie</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('category.show', $category) }}">{{ $category->name }}</a>
                <a href="{{ route('category.edit', $category) }}">Modifier</a>
                <form action="{{ route('category.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection