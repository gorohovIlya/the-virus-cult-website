import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/css/links-styles.css',
                    'resources/css/authorization.css',
                    'resources/css/main.css',
                    'resources/css/personal-account.css',
                    'resources/css/registration.css',
                    'resources/css/plans.css',
                    'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
