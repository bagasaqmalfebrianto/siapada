/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            width: {

                500: "500px",
                600: "600px",
                800: "800px",
                1455: "1455px",
                1000: "1000px",
                1200: "1200px",
                300: "300px",
                150: "150px",
                100: "100px",
                200: "200px",
                250: "250px",
                230: "230px",
                50: "50px",
                270:"270px",
            },
            colors: {
                green_button : "#14BC39",
                green2: "#d2e2d7", // Custom warna green
            },
            height: {
                300: "300px",
                400: "400px",
                450: "450px",
                502: "502px",
                500: "500px",
                800: "800px",
                1455: "1455px",
                1000: "1000px",
                1200: "1200px",
                300: "300px",
                150: "150px",
                100: "100px",
                200: "200px",
                250: "250px",
                450:"450px",
            },
            py:{
                15:"20px",
                1000:"1000px",
            },
            px:{
                15:"20px",
            },
            fontSize: {
                '10': '10px',
                '14': '14px',
                '18': '18px',
                '24': '24px',
                '30': '30px',
                '50':'50px',
                '100' : '100px ',
              },
            left:{
                '13':'13px',
                '15':'15px',
            },
            bottom:{
                '13':'13px',
                '15':'15px',
            },
        },
    },
    plugins: [require("daisyui")],
};
