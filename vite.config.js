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
        rollupOptions: {
            output: {
                assetFileNames: 'assets/[name]-[hash][extname]',
                chunkFileNames: 'assets/[name].[hash].js',
                entryFileNames: 'assets/[name].[hash].js',
            },
        },
        cssCodeSplit: true,
    },
    resolve: {
        alias: {
            '~': 'resources/assets/admin',
            '@': 'resources/assets/frontend',
        },
    },
    optimizeDeps: {
        include: [
            'axios',
            'd3',
        ],
    },
    server: {
        hmr: {
            overlay: true,
        },
    },
});
