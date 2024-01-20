@php
    use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-center">{{ $title }}</h1>

        {{-- appelle du composant tableau avec les tâches en props --}}
        <x-tasks-table :tasks="$tasks" />

        <a href="{{ route('task.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Créer une tâche
        </a>
    </div>
@endsection
