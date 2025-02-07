import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';  // Corrected import
import path from 'path';

export default defineConfig({
    resolve: {
        alias: {
            'ziggy-js':path.resolve('vendor/tightenco/ziggy'),
        }
    },
    plugins: [
        vue(), // Using the correct Vue plugin
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
