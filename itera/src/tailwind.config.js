import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "color-primary": "#FFFFFF",
                "color-secondary": "#000000",
                "color-tertiary": "#DADAD3",
                "color-accent": "#F40429",
                "color-active": "#7FC1FF",
            },
        },
    },

    plugins: [forms],
};
