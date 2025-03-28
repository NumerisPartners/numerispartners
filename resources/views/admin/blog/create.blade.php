<x-app-layout>
    <x-breadcrumb title="Créer un nouvel article" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer un nouvel article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="bg-[#f8f9fc] dark:bg-[#150443] wow animated fadeInUp overflow-hidden p-8 rounded-lg shadow-sm">
                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="title" value="{{ __('Titre') }}" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error for="title" class="mt-2" />
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="slug" value="{{ __('Slug') }}" />
                            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required />
                            <x-input-error for="slug" class="mt-2" />
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Le slug est utilisé pour l'URL de l'article (ex: mon-article).</p>
                        </div>

                        <div>
                            <x-input-label for="category_id" value="{{ __('Catégorie') }}" />
                            <select id="category_id" name="category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                <option value="">Sélectionner une catégorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error for="category_id" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="featured_image" value="{{ __('Image mise en avant') }}" />
                            <input id="featured_image" type="file" name="featured_image" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                            <x-input-error for="featured_image" class="mt-2" />
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="excerpt" value="{{ __('Extrait') }}" />
                            <textarea id="excerpt-editor" name="excerpt" rows="3" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">{{ old('excerpt') }}</textarea>
                            <x-input-error for="excerpt" class="mt-2" />
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Un court résumé de l'article qui sera affiché dans les listes d'articles.</p>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="content" value="{{ __('Contenu') }}" />
                            <textarea id="content-editor" name="content" rows="10" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">{{ old('content') }}</textarea>
                            <x-input-error for="content" class="mt-2" />
                        </div>

                        <div>
                            <div class="flex items-center">
                                <input id="is_published" name="is_published" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" {{ old('is_published') ? 'checked' : '' }}>
                                <x-input-label for="is_published" class="ml-2" value="{{ __('Publier immédiatement') }}" />
                            </div>
                            <x-input-error for="is_published" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="published_at" value="{{ __('Date de publication') }}" />
                            <x-text-input id="published_at" class="block mt-1 w-full" type="datetime-local" name="published_at" :value="old('published_at')" />
                            <x-input-error for="published_at" class="mt-2" />
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Laisser vide pour publier immédiatement si "Publier immédiatement" est coché.</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('admin.blog.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-600 active:bg-gray-500 dark:active:bg-gray-600 focus:outline-none focus:border-gray-500 dark:focus:border-gray-600 focus:ring ring-gray-300 dark:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150 mr-3">
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
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Générer automatiquement le slug à partir du titre
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');
            
            titleInput.addEventListener('input', function() {
                slugInput.value = titleInput.value
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            });

            // Initialiser CKEditor pour l'extrait
            ClassicEditor
                .create(document.querySelector('#excerpt-editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
                })
                .catch(error => {
                    console.error(error);
                });

            // Initialiser CKEditor pour le contenu
            ClassicEditor
                .create(document.querySelector('#content-editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'mediaEmbed', '|', 'undo', 'redo']
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
    @endpush
</x-app-layout>