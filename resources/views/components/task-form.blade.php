@props(['categories', 'task' => null])

<form method="POST" class="max-w-md mx-auto mt-8 p-8 bg-white rounded shadow-md">
    @csrf

    @if ($task)
        @method('PUT')
    @endif

    <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre de la tâche</label>
        <input type="text" name="title" id="title" value="{{ old('title') ?? optional($task)->title }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
        @error('title')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description de la tâche</label>
        <textarea name="description" id="description"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">{{ old('description') ?? optional($task)->description }}</textarea>
        @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Catégorie</label>
        <select name="category_id" id="category_id"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id') == $category->id || optional($task)->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
        <input type="datetime-local" name="date" id="date" value="{{ old('date') ?? optional($task)->date }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
        @error('date')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-center gap-5">
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Enregistrer
        </button>
        <a href="{{ route('category.index') }}"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Annuler
        </a>
    </div>
</form>
