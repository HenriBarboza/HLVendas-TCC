import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/scss/global.scss',
                'resources/scss/home.scss',
                'resources/scss/cliente.scss',
                'resources/scss/header.scss',
                'resources/scss/footer.scss',
                'resources/js/app.js',
                'resources/js/calculoCusto.js',
                'resources/js/inputValidation.js',
                'resources/js/buttonSelect.js',
                'resources/js/selectPagamento.js',
                'resources/js/loadingPage.js',
                'resources/js/alert.js',
                'resources/js/printPdf.js',
                'resources/js/deleteAlert.js'
            ],
            refresh: true,
        }),
    ],
});
