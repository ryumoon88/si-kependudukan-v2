import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/admin/main.js',
                'resources/js/user/main.js',
            ],
            refresh: true,
        }),
    ],
});
