import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',

                // surah pages
                'resources/js/view/surah/id.js',
                'resources/js/view/surah/progress.js',
                // history page
                'resources/js/view/history/index.js',

                // helper components
                'resources/js/components.js',
                'resources/js/axiosWrapper.js',

                // html components
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
