/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                md: "2rem",
            },
        },
        aspectRatio: {
            auto: "auto",
            square: "1 / 1",
            video: "16 / 9",
        },
        extend: {
            colors: {
                Gelap: "#0B0C10", // Warna teks untuk tema gelap (Navy blue)
                Cerah: "#66FCF1", // Warna teks untuk tema terang (Light cream)
            },
            screens: {
                xs: "480px",
            },
        },
    },
    plugins: [],
};
