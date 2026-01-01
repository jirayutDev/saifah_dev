import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: 'test-saifah-dev',
        port: 5173,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
    plugins: [
        laravel({
            input: ['resources/sass/auth.scss', 'resources/js/auth.js'],
            refresh: true,
        }),
    ],
});
