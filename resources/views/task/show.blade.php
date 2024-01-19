@extends('layouts.app')

@section('title', 'Information d\'une tâche')

@section('content')
    <h1>Information de la tâche {{ $task->title }}</h1>
    <a href="{{ route('task.index') }}">Retour à la liste des tâches</a>
    <ul>
        <li>
            <strong>Titre</strong> : {{ $task->title }}
        </li>
        <li>
            <strong>Description</strong> : {{ $task->description }}
        </li>
        <li>
            <strong>Catégorie</strong> : <a href="{{ route('category.show', $task->category) }}">{{ $task->category->name }}</a>
        </li>
        <li>
            <strong>Date de création</strong> : {{ $task->created_at }}
        </li>
        <li>
            <strong>Date de modification</strong> : {{ $task->updated_at }}
        </li>
    </ul>
@endsection