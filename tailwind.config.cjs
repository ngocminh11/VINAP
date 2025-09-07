/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                brand: { DEFAULT: '#118A7E', 50: '#ecf9f7', 600: '#0c6a62' },
                accent: { DEFAULT: '#F59E0B', 600: '#D97706' },
            },
            boxShadow: {
                soft: '0 10px 30px rgba(0,0,0,.06)',
                glow: '0 10px 40px rgba(17,138,126,.25)',
            },
        },
    },
    plugins: [],
};
