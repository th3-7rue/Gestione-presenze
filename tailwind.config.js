import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "selector",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var"],
            },
            colors: {
                primary: "#00AFF0",
                footer: "#27272B",
                "black-light": "#434345",
                "primary-light": "#50C5F0",
                "primary-extra-light": "#50C5F0",
                "half-black": "#7a7a7a",
                work: "#2F8FFF",
                pause: "#B75CFF",
                straordinari: "#FF00D6",
            },
        },
    },

    plugins: [forms],
};
