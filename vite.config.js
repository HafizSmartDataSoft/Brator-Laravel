import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/js/components/sidebar.js', // Add this line
                'resources/js/components/dropdown.js', // Add this line
                'resources/js/components/datepicker.js', // Add this line

            ],
            refresh: true,
        }),
    ],
});
