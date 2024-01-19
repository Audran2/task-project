@extends('layouts.app')

@section('title', 'Liste d\'une catégorie')

@section('content')
    <h1>Liste des articles de la catégorie {{ $category->name }}</h1>
    <a href="{{ route('category.index') }}">Retour à la liste des catégories</a>
    <ul>
        @foreach ($category->tasks as $task)
            <li>
                <a href="{{ route('task.show', $task) }}">{{ $task->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection