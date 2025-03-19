/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.scss",
  ],
  safelist: [
    'bg-white',
    'font-sans',
    'text-white',
    'text-black',
    'flex',
    'items-center',
    'justify-center',
    'flex-col',
    'p-0',
    'm-0',
    'py-[15px]',
    'mr-[25px]',
    'mr-[5px]',
    'mr-0',
    'border-r-0',
    'pr-0',
    'm-[0px]',
    'text-[14px]',
    'mx-[3px]',
    'mr-[10px]',
    'invisible',
    'mr-[-30px]',
    'opacity-0',
    'transition-all',
    'duration-[0.4s]',
    'ease-in-out',
    'pt-0',
  ],
  theme: {
    extend: {
      fontFamily: {
        "body-font": ["Plus Jakarta Sans", "sans-serif"],
        "sans": ["ui-sans-serif", "system-ui", "-apple-system", "BlinkMacSystemFont", "Segoe UI", "Roboto", "Helvetica Neue", "Arial", "Noto Sans", "sans-serif", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"],
        awesome: "Font Awesome 5 Free",
      },
      fontWeight: {
        inherit: "inherit",
      },
      colors: {
        "main-color": "var(--main-color)",
        "heading-color": "#101A29",
        "paragraph-color": "#737588",
        "border-color": "#bdbecc",
        "white": "#ffffff",
      },
      spacing: {
        '0': '0px',
        '-1px': '-1px',
        '[-1px]': '-1px',
        '5px': '5px',
        '10px': '10px',
        '11px': '11px',
        '15px': '15px',
        '25px': '25px',
        '30px': '30px',
        '50px': '50px',
      },
      margin: {
        '0': '0px',
        '-1px': '-1px',
        '[-1px]': '-1px',
      },
      borderRadius: {
        '22px': '22px',
        '50px': '50px',
      },
      borderColor: {
        'E3E3E3': '#E3E3E3',
      },
      keyframes: {
        topImageBounce: {
          "0%": { transform: "translateY(-8px)" },
          "50%": { transform: "translateY(12px)" },
          "100%": { transform: "translateY(-8px)" },
        },
        leftImageBounce: {
          "0%": { transform: "translateX(-5px)" },
          "50%": { transform: "translateX(10px)" },
          "100%": { transform: "translateX(-5px)" },
        },
        ripple: {
          "0%": { width: "0px", height: "0px", opacity: "0.5" },
          "100%": { width: "500px", height: "500px", opacity: "0" },
        },
      },
      animation: {
        "top-image-bounce": "topImageBounce 3s linear infinite",
        "left-image-bounce": "leftImageBounce 3s linear infinite",
        ripple: "ripple 3s infinite",
      },
      backgroundImage: {
        "grd-one":
          "linear-gradient(180deg, rgba(24, 26, 32, 0) 0%, #181a20 100%)",
        "grd-two":
          "linear-gradient(180deg, #181a20 0%, rgba(24, 26, 32, 0) 100%)",
      },
      boxShadow: {
        sm: "0px 3px 20px rgba(0, 33, 71, 0.06)",
        md: "0px 10px 30px rgba(0, 33, 71, 0.08)",
        lg: "0px 10px 60px rgba(0, 0, 0, 0.07)",
        xl: "0 0 5px rgba(0, 0, 0, 0.1)",
      },
    },
  },
  plugins: [
    require('./tailwind-plugin.js'),
  ],
};
