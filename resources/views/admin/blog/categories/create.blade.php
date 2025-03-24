<x-app-layout>
    <x-breadcrumb title="Créer une nouvelle catégorie" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer une nouvelle catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('admin.blog.categories.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <x-input-label for="name" value="{{ __('Nom') }}" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error for="name" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="slug" value="{{ __('Slug') }}" />
                            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required />
                            <x-input-error for="slug" class="mt-2" />
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Le slug est utilisé pour l'URL de la catégorie (ex: ma-categorie).</p>
                        </div>

                        <div>
                            <x-input-label for="description" value="{{ __('Description') }}" />
                            <textarea id="description" name="description" rows="3" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">{{ old('description') }}</textarea>
                            <x-input-error for="description" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('admin.blog.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-600 active:bg-gray-500 dark:active:bg-gray-600 focus:outline-none focus:border-gray-500 dark:focus:border-gray-600 focus:ring ring-gray-300 dark:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150 mr-3">
                            {{ __('Annuler') }}
                        </a>
                        <x-primary-button>
                            {{ __('Créer') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Générer automatiquement le slug à partir du nom
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');
            
            nameInput.addEventListener('input', function() {
                slugInput.value = nameInput.value
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            });
        });
    </script>
    @endpush
</x-app-layout>
