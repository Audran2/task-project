@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-center">{{ $title }}</h1>

    {{-- appel du composant formulaire avec les catégories en props --}}
    <x-category-form :category="$category" />
@endsection
