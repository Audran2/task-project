@extends('layouts.app')

@section('title', 'Modification d\'une tâche')

@section('section')
    <form action="{{ route('task.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titre de la tâche</label>
            <input type="text" name="title" id="title" value="{{ old('title') ?? $task->title }}">
        </div>
        <div>
            <label for="description">Description de la tâche</label>
            <textarea name="description" id="description">{{ old('description') ?? $task->description }}</textarea>
        </div>
        <div>
            <label for="category_id">Catégorie</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id || $task->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{ old('date') ?? $task->date }}">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
@endsection
