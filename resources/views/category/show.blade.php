@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-center">Liste des tâches de la catégorie
            <span class="inline-block h-4 w-4 rounded-full border border-black mx-auto"
                style="background-color: {{ $category->color }}" title="couleur: {{ $category->color }}"></span>
            {{ $category->name }}
        </h1>

        {{-- appel du composant tableau avec les tâches en props --}}
        <x-tasks-table :tasks="$tasks" />

        <a href="{{ route('category.index') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Retour à la liste des catégories
        </a>
    </div>
@endsection
