import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/tailwind.css', 'resources/styles/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss({
            config: './tailwind.config.js',
        }),
    ],
});
