@extends('layouts.app')

@section('title', 'Création d\'une tâche')

@section('content')
    <form action="{{ route('task.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titre de la tâche</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div>
            <label for="description">Description de la tâche</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="category_id">Catégorie</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
@endsection