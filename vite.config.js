import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                '~/sass/app.scss',
                '~/css/app.css',
                '@/css/app.css',
                '~/js/app.js',
                '@/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        minify: 'esbuild',
        sourcemap: false,
    },
    resolve: {
        alias: {
            '~': 'resources/assets/admin',
            '@': 'resources/assets/frontend',
        },
    },
    optimizeDeps: {
        include: ['axios'], // Pre-bundle dependencies to improve performance
    },
});
