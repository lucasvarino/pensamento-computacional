import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'media',
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'bg': '#18181b',

                'dark-bg-grad-l': '#09090b',
                'dark-bg-grad-r': '#3f0054',
                'bg-grad-l'     : '#bea6cc',
                'bg-grad-r'     : '#9663ba',
                'container-200' : '#b58cd9',
                'container-400' : '#9711c9',
                'container-600' : '#760099',
                'container-800' : '#590074',
                
                'filantropo'     : '#25bb48',
                'filantropo-200' : '#9af097',
                'filantropo-400' : '#4ad277',
                'filantropo-600' : '#0fa156',
                'filantropo-800' : '#1f7d35',
                'filantropo-txt' : '#00331d',
                //'dark-filantropo-txt' : '#9af097',
                
                'socializador' : '#378ecc',
                'socializador-200' : '#0098e1',
                'socializador-400' : '#0085c2',
                'socializador-600' : '#0074a1',
                //'socializador-800' : '#72a3c6',
                'socializador-txt' : '#002a3a',
                
                'espirito-livre' : '#83e5c4',
                'espirito-livre-200' : '#98ffdc',
                'espirito-livre-400' : '#7df2ca',
                'espirito-livre-600' : '#1bcba3',
                'espirito-livre-800' : '#088675',
                'espirito-livre-txt' : '#003f2a',
                
                'conquistador' : '#ffdd29',
                'conquistador-200' : '#ffca17',
                'conquistador-400' : '#ffc500',
                'conquistador-600' : '#e8b107',
                'conquistador-800' : '#d4a30b',
                'conquistador-txt' : '#5c4700',
                
                'disruptor' : '#8d3153',
                'disruptor-200' : '#ce599b',
                'disruptor-400' : '#bd4984',
                'disruptor-600' : '#a23967',
                'disruptor-800' : '#973459',
                'disruptor-txt' : '#26000b',
                
                'jogador' : '#6d49b5',
                'jogador-200' : '#6242b4',
                'jogador-400' : '#5335a4',
                'jogador-600' : '#472997',
                'jogador-800' : '#3e2188',
                'jogador-txt' : '#1b0036',
                
                'explorador' : '#ce733c',
                'explorador-200' : '#fea163',
                'explorador-400' : '#f0731f',
                'explorador-600' : '#c15c5c',
                // 'explorador-800' : '#',
                'explorador-txt' : '#481112',
                
                'assassino' : '#c73d3d',
                'assassino-200' : '#c73d3d',
                'assassino-400' : '#b73838',
                'assassino-600' : '#982f3e',
                // 'assassino-800' : '#3e2188',
                'assassino-txt' : '#36050d',
            },
            backgroundImage: {
                'filanto-semicircle': "radial-gradient(circle at left center, var(--tw-color-filantropo-800), var(--tw-color-filantropo-600) 40%, var(--tw-color-filantropo-400) 80%)",
            },
        },
    },

    plugins: [forms],
};
