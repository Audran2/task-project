@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-center">{{ $title }}</h1>

        <table class="min-w-full border mb-8">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-r text-center">ID</th>
                    <th class="py-2 px-4 border-b border-r text-center">Nom</th>
                    <th class="py-2 px-4 border-b border-r text-center">Couleur</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td class="py-2 px-4 border-b border-r text-center">{{ $category->id }}</td>
                        <td class="py-2 px-4 border-b border-r text-center">{{ $category->name }}</td>
                        <td class="py-2 px-4 border-b border-r text-center">
                            <span class="inline-block h-4 w-8 rounded border border-black mx-auto"
                                style="background-color: {{ $category->color }}"
                                title="couleur: {{ $category->color }}"></span>
                        </td>
                        <td class="py-2 px-4 border-b text-center">
                            <div class="flex justify-center gap-4">
                                <a href="{{ route('category.show', $category->slug) }}" class="text-blue-500">
                                    <i class="fas fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('category.edit', $category->slug) }}" class="text-green-500">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('category.destroy', $category->slug) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-2 px-4 border-b border-r text-center" colspan="4">Aucune catégorie disponible.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
        <a href="{{ route('category.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Créer une
            catégorie
        </a>
    </div>
@endsection
