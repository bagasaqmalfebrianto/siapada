import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/bootstrap.js',   
                'resources/js/dashboard.js',   // File JavaScript utama
                'resources/css/app.css',     // Jika ada
                'resources/css/dashboard.css', // Tambahkan CSS dashboard
                'resources/css/style.css',
                'resources/css/sb-admin-2.min.css' ,
                'resources/js/sb-admin-2.min.js',   
                'resources/vendor/jquery/jquery.min.js', // jQuery
                'resources/vendor/bootstrap/js/bootstrap.bundle.min.js', // Bootstrap
                'resources/vendor/jquery-easing/jquery.easing.min.js' // jQuery Easing 
            ],
            output: 'public/build',
        }),
    ],
});
