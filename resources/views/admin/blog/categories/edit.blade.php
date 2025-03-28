<x-app-layout>
    <x-breadcrumb title="Modifier la catégorie" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier la catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="bg-white bg-[#f8f9fc] dark:bg-[#150443] wow animated fadeInUp overflow-hidden p-8 rounded-lg shadow-sm">
                <form action="{{ route('admin.blog.categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <x-input-label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1" value="{{ __('Nom') }}" />
                            <x-text-input id="name" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 " type="text" name="name" :value="old('name', $category->name)" required autofocus />
                            <x-input-error for="name" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1" value="{{ __('Slug') }}" />
                            <x-text-input id="slug" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 " type="text" name="slug" :value="old('slug', $category->slug)" required />
                            <x-input-error for="slug" class="mt-2" />
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Le slug est utilisé pour l'URL de la catégorie (ex: ma-categorie).</p>
                        </div>

                        <div>
                            <x-input-label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1" value="{{ __('Description') }}" />
                            <textarea id="description" name="description" rows="3" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 ">{{ old('description', $category->description) }}</textarea>
                            <x-input-error for="description" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('admin.blog.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-600 active:bg-gray-500 dark:active:bg-gray-600 focus:outline-none focus:border-gray-500 dark:focus:border-gray-600 focus:ring ring-gray-300 dark:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150 mr-3">
                            {{ __('Annuler') }}
                        </a>
                        <x-primary-button>
                            {{ __('Mettre à jour') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
