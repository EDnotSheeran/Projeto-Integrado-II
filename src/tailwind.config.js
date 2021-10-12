const plugin = require("tailwindcss/plugin");

module.exports = {
    mode: "jit",
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        plugin(function ({ addUtilities, addComponents, e, prefix, config }) {
            addComponents({
                ".circle": {
                    borderRadius: "50%",
                },
            });
        }),
    ],
};
