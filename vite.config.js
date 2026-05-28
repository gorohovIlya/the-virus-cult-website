import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/css/links-style.css',
                    'resources/css/authorization.css',
                    'resources/css/main.css',
                    'resources/css/personal-account.css',
                    'resources/css/registration.css',
                    'resources/css/plans.css',
                    'resources/css/download.css',
                    'resources/css/feedback.css',
                    'resources/css/support-us.css',
                    'resources/css/about-us.css',
                    'resources/css/verify-email.css',
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
