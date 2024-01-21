@props(['tasks'])

<table class="min-w-full border mb-8">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b border-r text-center">Titre</th>
            <th class="py-2 px-4 border-b border-r text-center">Description</th>
            <th class="py-2 px-4 border-b border-r text-center">Catégorie</th>
            <th class="py-2 px-4 border-b border-r text-center">Date</th>
            <th class="py-2 px-4 border-b text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tasks as $task)
            <tr>
                <td class="py-2 px-4 border-b border-r text-center">{{ $task->title }}</td>
                <td class="py-2 px-4 border-b border-r text-center">{{ $task->description }}</td>
                <td class="py-2 px-4 border-b border-r text-center">{{ $task->category->name }}</td>
                <td class="py-2 px-4 border-b border-r text-center">
                    {{ $task->date->locale('fr_FR')->isoFormat('dddd D MMMM YYYY à HH[h]mm') }}
                </td>
                <td class="py-2 px-4 border-b text-center">
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('task.show', $task->slug) }}" class="text-blue-500">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('task.edit', $task->slug) }}" class="text-green-500">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('task.destroy', $task->slug) }}" method="POST" class="inline-block">
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
                <td class="py-2 px-4 border-b border-r text-center" colspan="6">Aucune tâche disponible.</td>
            </tr>
        @endforelse
    </tbody>
</table>
{{ $tasks->links() }}
