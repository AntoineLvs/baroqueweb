const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
import forms from '@tailwindcss/forms';

module.exports = {
    presets: [
        require('./vendor/tallstackui/tallstackui/tailwind.config.js')
    ],

    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
        './resources/**/*.blade.php',
        './vendor/tallstackui/tallstackui/src/**/*.php',
        './app/Providers/MyCustomServiceProvider.php',
        './app/Providers/AppServiceProvider.php',
        './app/TallStackUi/**/*.php',
        './resources/css/custom-styles.css',
    ],

    theme: {
        fontWeight: {
            thin: '100',
            hairline: '100',
            extralight: '200',
            light: '300',
            normal: '400',
            medium: '401', // Dieser Wert kann problematisch sein, da er normalerweise 500 ist
            semibold: '600',
            bold: '700',
            extrabold: '800',
            black: '900',
        },

        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                black: colors.black,
                white: colors.white,
                gray: colors.gray,
                emerald: colors.emerald,
                indigo: colors.indigo,
                yellow: colors.yellow,
            },
            margin: {
                '18': '72px',  // Hinzufügen von mt-18 mit einer Wert von 72px
            },
        },
    },

    safelist: [
        'bg-red-200',
        'bg-blue-200',
        'bg-green-200',
        'bg-yellow-200',
        'bg-orange-200',
        // Füge hier weitere dynamische Klassen hinzu
    ],

    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
