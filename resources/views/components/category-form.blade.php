@props(['category' => null])

<form method="POST" class="max-w-md mx-auto mt-8 p-8 bg-white rounded shadow-md">
    @csrf

    @if ($category)
        @method('PUT')
    @endif

    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom de la catégorie</label>
        <input type="text" name="name" id="name" value="{{ old('name') ?? optional($category)->name }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Couleur de la catégorie</label>
        <input type="color" name="color" id="color" value="{{ old('color') ?? optional($category)->color }}"
            class="p-1 h-10 w-14 block bg-white border border-gray-200 cursor-pointer w-10 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700">
        @error('color')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex justify-center gap-5">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Enregistrer
        </button>
        <a href="{{ route('category.index') }}"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Annuler
        </a>
    </div>
</form>
