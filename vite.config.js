import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/view/chapter/id.js',

                'resources/js/components/audioPlayer/player.js',
                'resources/js/components/audioPlayer/menu.js',
                'resources/js/components/rightSideBar.js',
                'resources/js/components/verse.js',

                'resources/js/translation.js',
                'resources/js/audio.js',
            ],
            refresh: true,
        }),
    ],
});
