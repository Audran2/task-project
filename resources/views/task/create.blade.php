@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-center">{{ $title }}</h1>

    @if ($categories->isEmpty())
        <div class="flex items-center justify-center h-screen">
            <div class="text-center">
                <p class="mb-5">
                    <b>Aucune catégorie n'est disponible.</b> <br>
                    Veuillez créer au moins une catégorie avant de créer une tâche.
                </p>
                <div class="flex justify-center gap-5">
                    <a href="{{ route('category.create') }}"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Créer une catégorie
                    </a>
                    <a href="{{ route('task.index') }}"
                        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                        Retour
                    </a>
                </div>
            </div>
        </div>
    @else
        {{-- appelle du component formulaire avec les catégories en props --}}
        <x-task-form :categories="$categories" />
    @endif
@endsection
