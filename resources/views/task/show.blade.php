@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4 text-center">{{ $title }}</h1>

        <ul class="mt-4 mb-10">
            <li class="mb-2">
                <strong class="text-lg">Titre :</strong> {{ $task->title }}
            </li>
            <li class="mb-2">
                <strong class="text-lg">Description :</strong> {{ $task->description }}
            </li>
            <li class="mb-2">
                <strong class="text-lg">Catégorie :</strong> <a href="{{ route('category.show', $task->category->slug) }}"
                    class="text-blue-500 hover:underline">{{ $task->category->name }}</a>
            </li>
            <li class="mb-2">
                <strong class="text-lg">Date d'échéance :</strong> {{ $task->date }}
            </li>
        </ul>

        <a href="{{ route('task.index') }}"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            Retour à la liste des tâches
        </a>
    </div>
@endsection
