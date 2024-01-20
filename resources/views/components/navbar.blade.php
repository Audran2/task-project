<nav class="flex items-center justify-between bg-gray-800 p-4">
    <div class="flex items-center">
        <span class="text-white font-bold text-lg">Projet laravel</span>
    </div>

    <ul class="flex space-x-4">
        <li>
            <a href="{{ route('home') }}"
                class="text-white hover:text-blue-300 {{ request()->routeIs('home') ? 'text-blue-300' : '' }}">
                Accueil
            </a>
        </li>
        <li>
            <a href="{{ route('task.index') }}"
                class="text-white hover:text-blue-300 {{ request()->routeIs('task.index') ? 'text-blue-300' : '' }}">
                Tâches
            </a>
        </li>
        <li>
            <a href="{{ route('category.index') }}"
                class="text-white hover:text-blue-300 {{ request()->routeIs('category.index') ? 'text-blue-300' : '' }}">
                Catégories
            </a>
        </li>
    </ul>
</nav>
