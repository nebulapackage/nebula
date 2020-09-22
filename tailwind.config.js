const { fontFamily } = require('tailwindcss/defaultTheme')

module.exports = {
  purge: {
    content: ['./resources/views/**/*.blade.php'],
    options: {
      whitelist: [
        'col-span-1',
        'col-span-2',
        'col-span-3',
        'col-span-4',
        'col-span-5',
        'col-span-6',
        'col-span-7',
        'col-span-8',
        'col-span-9',
        'col-span-10',
        'col-span-11',
        'col-span-12',
      ],
    },
  },
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  // Yes, living on the edge 🤘
  experimental: {
    extendedSpacingScale: true,
    uniformColorPalette: true,
    defaultLineHeights: true,
    applyComplexClasses: true,
  },
  theme: {
    extend: {
      fontFamily: {
        display: ['DM Sans', ...fontFamily.sans],
        sans: ['Inter', ...fontFamily.sans],
        mono: ['DM mono', ...fontFamily.mono],
      },
      colors: {
        primary: {
          50: '#ebf5ff',
          100: '#e1effe',
          200: '#c3ddfd',
          300: '#a4cafe',
          400: '#76a9fa',
          500: '#3f83f8',
          600: '#1c64f2',
          700: '#1a56db',
          800: '#1e429f',
          900: '#233876',
        },
        success: {
          50: '#f3faf7',
          100: '#def7ec',
          200: '#bcf0da',
          300: '#84e1bc',
          400: '#31c48d',
          500: '#0e9f6e',
          600: '#057a55',
          700: '#046c4e',
          800: '#03543f',
          900: '#014737',
        },
        danger: {
          50: '#fdf2f2',
          100: '#fde8e8',
          200: '#fbd5d5',
          300: '#f8b4b4',
          400: '#f98080',
          500: '#f05252',
          600: '#e02424',
          700: '#c81e1e',
          800: '#9b1c1c',
          900: '#771d1d',
        },
      },
      boxShadow: {
        default: [
          '0 1px 1px 0 rgba(0, 0, 0, 0.12)',
          '0 2px 4px 0 rgba(0, 0, 0, 0.04)',
          '0 2px 8px 0 rgba(0, 0, 0, 0.02)',
        ].join(', '),
        sm: [
          '0 1px 1px 0 rgba(0, 0, 0, 0.08)',
          '0 2px 3px 0 rgba(0, 0, 0, 0.02)',
          '0 3px 6px 0 rgba(0, 0, 0, 0.01)',
        ].join(', '),
      },
    },
  },
  plugins: [require('@tailwindcss/custom-forms')],
}
