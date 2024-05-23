<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:flex sm:my-auto sm:ms-10">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-lg font-bold text-yellow-500 dark:text-yellow-400">
                {{ __('Inicio') }}
            </x-nav-link>
        </div>

        <!-- User Info and Actions -->
        <div class="flex items-center space-x-4">
            <x-nav-link :href="route('profile.edit')" class="flex items-center">
                <svg class="h-5 w-5 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 12a4 4 0 100-8 4 4 0 000 8zM5 12a1 1 0 112 0 1 1 0 01-2 0zm10 0a1 1 0 112 0 1 1 0 01-2 0z" clip-rule="evenodd" />
                </svg>
                <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">{{ __('Perfil') }}</span>
            </x-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring-red active:bg-red-700 transition ease-in-out duration-150">
                    <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 12a4 4 0 100-8 4 4 0 000 8zM5 12a1 1 0 112 0 1 1 0 01-2 0zm10 0a1 1 0 112 0 1 1 0 01-2 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2">{{ __('Cerrar Sesión') }}</span>
                </button>
            </form>
        </div>
    </div>
</nav>
