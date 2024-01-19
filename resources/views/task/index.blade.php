@extends('layouts.app')

@section('title', 'Liste des tâches')

@section('content')
    <h1>Liste des tâches</h1>
    <a href="{{ route('task.create') }}">Créer une tâche</a>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('task.show', $task) }}">{{ $task->title }}</a>
                <a href="{{ route('task.edit', $task) }}">Modifier</a>
                <form action="{{ route('task.destroy', $task) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection