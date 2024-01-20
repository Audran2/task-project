@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-center">Création d'une catégorie</h1>

    {{-- appelle du composant formulaire avec aucune props --}}
    <x-category-form />
@endsection
