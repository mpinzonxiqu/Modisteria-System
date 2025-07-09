import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',  // Aquí estás diciendo que Vite debe compilar tu archivo Sass
                'resources/js/app.js',      // Aquí estás diciendo que Vite debe compilar tu archivo JavaScript
            ],
            refresh: true,  // Esto hará que Vite recargue la página cuando detecte cambios en los archivos
        }),
    ],
});
