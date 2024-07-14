import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resouces/scss/global.scss',
                'resouces/scss/home.scss',
                'resouces/scss/header.scss',
                'resouces/scss/footer.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
