const plugin = require('tailwindcss/plugin');

module.exports = plugin(function({ addUtilities, matchUtilities, theme, addComponents, e }) {
  // Ajouter des utilitaires de base
  addUtilities({
    '.m-0': {
      margin: '0px !important',
    },
    '.p-0': {
      padding: '0px !important',
    },
    '.mr-0': {
      'margin-right': '0px !important',
    },
    '.pr-0': {
      'padding-right': '0px !important',
    },
    '.mb-0': {
      'margin-bottom': '0px !important',
    },
    '.mt-0': {
      'margin-top': '0px !important',
    },
    '.ml-0': {
      'margin-left': '0px !important',
    },
    '.pl-0': {
      'padding-left': '0px !important',
    },
    '.pt-0': {
      'padding-top': '0px !important',
    },
    '.pb-0': {
      'padding-bottom': '0px !important',
    },
    '.relative': {
      position: 'relative !important',
    },
    '.absolute': {
      position: 'absolute !important',
    },
    '.inline-block': {
      display: 'inline-block !important',
    },
    '.block': {
      display: 'block !important',
    },
    '.flex': {
      display: 'flex !important',
    },
    '.overflow-hidden': {
      overflow: 'hidden !important',
    },
    '.opacity-0': {
      opacity: '0 !important',
    },
    '.border-r': {
      'border-right-width': '1px !important',
    },
    '.border-solid': {
      'border-style': 'solid !important',
    },
    '.border': {
      'border-width': '1px !important',
    },
    '.transform': {
      'transform-style': 'preserve-3d !important',
    },
    '.transition-all': {
      'transition-property': 'all !important',
    },
    '.bg-white': {
      'background-color': '#ffffff !important',
    },
    '.text-center': {
      'text-align': 'center !important',
    },
    '.leading-initial': {
      'line-height': 'initial !important',
    },
    '.invisible': {
      'visibility': 'hidden !important',
    },
    '.z-2': {
      'z-index': '2 !important',
    },
    '.z-[2]': {
      'z-index': '2 !important',
    },
    '.py-15px': {
      'padding-top': '15px !important',
      'padding-bottom': '15px !important',
    },
    '.py-[15px]': {
      'padding-top': '15px !important',
      'padding-bottom': '15px !important',
    },
    '.mr-5px': {
      'margin-right': '5px !important',
    },
    '.mr-[5px]': {
      'margin-right': '5px !important',
    },
    '.mr-25px': {
      'margin-right': '25px !important',
    },
    '.mr-[25px]': {
      'margin-right': '25px !important',
    },
    '.duration-0.4s': {
      'transition-duration': '0.4s !important',
    },
    '.duration-[0.4s]': {
      'transition-duration': '0.4s !important',
    },
    '.ease-in-out': {
      'transition-timing-function': 'ease-in-out !important',
    },
    '.border-r-0': {
      'border-right-width': '0 !important',
    },
    '.leading-[initial]': {
      'line-height': 'initial !important',
    },
  });

  // Ajouter des utilitaires paramétrables
  matchUtilities(
    {
      'mr': (value) => ({
        'margin-right': value + ' !important',
      }),
      'ml': (value) => ({
        'margin-left': value + ' !important',
      }),
      'mt': (value) => ({
        'margin-top': value + ' !important',
      }),
      'mb': (value) => ({
        'margin-bottom': value + ' !important',
      }),
      'pr': (value) => ({
        'padding-right': value + ' !important',
      }),
      'pl': (value) => ({
        'padding-left': value + ' !important',
      }),
      'pt': (value) => ({
        'padding-top': value + ' !important',
      }),
      'pb': (value) => ({
        'padding-bottom': value + ' !important',
      }),
      'px': (value) => ({
        'padding-left': value + ' !important',
        'padding-right': value + ' !important',
      }),
      'py': (value) => ({
        'padding-top': value + ' !important',
        'padding-bottom': value + ' !important',
      }),
      'mx': (value) => ({
        'margin-left': value + ' !important',
        'margin-right': value + ' !important',
      }),
      'my': (value) => ({
        'margin-top': value + ' !important',
        'margin-bottom': value + ' !important',
      }),
      'rounded': (value) => ({
        'border-radius': value + ' !important',
      }),
      'h': (value) => ({
        'height': value + ' !important',
      }),
      'w': (value) => ({
        'width': value + ' !important',
      }),
      'text': (value) => ({
        'font-size': value + ' !important',
      }),
      'bottom': (value) => ({
        'bottom': value + ' !important',
      }),
      'top': (value) => ({
        'top': value + ' !important',
      }),
      'left': (value) => ({
        'left': value + ' !important',
      }),
      'right': (value) => ({
        'right': value + ' !important',
      }),
      'translate-x': (value) => ({
        'transform': `translateX(${value}) !important`,
      }),
      'translate-y': (value) => ({
        'transform': `translateY(${value}) !important`,
      }),
      'scale': (value) => ({
        'transform': `scale(${value}) !important`,
      }),
      'duration': (value) => ({
        'transition-duration': value + ' !important',
      }),
      'ease': (value) => ({
        'transition-timing-function': value + ' !important',
      }),
      'shadow': (value) => ({
        'box-shadow': value + ' !important',
      }),
      'z': (value) => ({
        'z-index': value + ' !important',
      }),
      'border': (value) => ({
        'border-color': value + ' !important',
      }),
    },
    { values: theme('spacing') }
  );
});
