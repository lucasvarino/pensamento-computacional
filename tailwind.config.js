import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    // darkMode: 'media',
    presets: [preset],
    content: [
    './app/Filament/**/*.php',        
    './resources/views/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {

                // ...defaultTheme.colors,

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
                
                'concentracao' : '#3970c7',
                'concentracao-200' : '#93c5fd',
                'concentracao-400' : '#60a5fa',
                'concentracao-600' : '#417CDF',
                // 'concentracao-800' : '#3e2188',
                'concentracao-txt' : '#082f49',
                
                'melhoria-conhecimento' : '#4370A3',
                'melhoria-conhecimento-200' : '#7C9CC6',
                'melhoria-conhecimento-400' : '#417CDF',
                'melhoria-conhecimento-600' : '#1B5FB8',
                // 'melhoria-conhecimento-800' : '#3e2188',
                'melhoria-conhecimento-txt' : '#262A31',
                
                'desafios' : '#b41212',
                'desafios-200' : '#dc2626',
                'desafios-400' : '#f87171',
                'desafios-600' : '#fca5a5',
                // 'desafios-800' : '#3e2188',
                'desafios-txt' : '#450a0a',
                
                'autonomia' : '#20828f',
                'autonomia-200' : '#85ffe5',
                'autonomia-400' : '#8fdfd8',
                'autonomia-600' : '#47aca8b6',
                // 'autonomia-800' : '#3e2188',
                'autonomia-txt' : '#083338',
                
                'objetivos' : '#a89026',
                'objetivos-200' : '#b6b83d',
                'objetivos-400' : '#949b3c',
                'objetivos-600' : '#777c2c',
                // 'objetivos-800' : '#3e2188',
                'objetivos-txt' : '#1a1c05',
                
                'feedback' : '#B17320',
                'feedback-200' : '#D49D55',
                'feedback-400' : '#C47918',
                'feedback-600' : '#805E33',
                // 'feedback-800' : '#3e2188',
                'feedback-txt' : '#302B24',
                
                'imersao' : '#602FA1',
                'imersao-200' : '#A084C4',
                'imersao-400' : '#5916B8',
                'imersao-600' : '#441780',
                // 'imersao-800' : '#3e2188',
                'imersao-txt' : '#27232E',
                
                'interacao-social' : '#B53B28',
                'interacao-social-200' : '#CF6151',
                'interacao-social-400' : '#C73D28',
                'interacao-social-600' : '#80453C',
                // 'interacao-social-800' : '#3e2188',
                'interacao-social-txt' : '#3B302E',
            },

            backgroundImage: {
                'filanto-semicircle': "radial-gradient(circle at left center, var(--tw-color-filantropo-800), var(--tw-color-filantropo-600) 40%, var(--tw-color-filantropo-400) 80%)",
            },
        },
    },

    plugins: [forms],
};
