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
    ],


    theme: {

        fontWeight: {
            thin: '100',
            hairline: '100',
            extralight: '200',
            light: '300',
            normal: '400',
            medium: '401',
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


        },
    },


    options: {
        defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
        whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
    },


    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),

    ],


};
