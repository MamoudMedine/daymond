const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
                yuusei: ["Yusei Magic", "sans-serif"],
                fira: ["Fira Sans", "sans-serif"],
                merri: ["Merriweather", "serif"],
            },
            colors: {
                primary: {
                    DEFAULT: "#fadf38",
                    200: "#fceb83",
                    300: "#fbe76a",
                    400: "#fbe351",
                    500: "#fadf38",
                    600: "#f9db1f",
                    700: "#f9d706",
                    800: "#e0c206",
                },
                grey: "#282828",
                dark: "#383838",
                secondary: "#a4a8cd",
                accent: {
                    DEFAULT: "#3853fa",
                    200: "#8394fc",
                    300: "#6a7efb",
                    400: "#5169fb",
                    500: "#3853fa",
                    600: "#1f3df9",
                    700: "#0628f9",
                    800: "#0624e0",
                },
            },
            borderRadius: {
                large: "16px",
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ["active"],
        },
    },
    purge: {
        content: [
            "./app/**/*.php",
            "./resources/**/*.html",
            "./resources/**/*.js",
            "./resources/**/*.jsx",
            "./resources/**/*.ts",
            "./resources/**/*.tsx",
            "./resources/**/*.php",
            "./resources/**/*.vue",
            "./resources/**/*.twig",
        ],
        options: {
            defaultExtractor: (content) =>
                content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
