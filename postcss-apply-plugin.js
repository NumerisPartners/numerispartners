/**
 * Plugin PostCSS personnalisé pour traiter les directives @apply
 * Ce plugin transforme les directives @apply en propriétés CSS standard
 */
module.exports = () => {
  return {
    postcssPlugin: 'postcss-apply-processor',
    Once(root) {
      // Définition des classes Tailwind communes
      const tailwindClasses = {
        'font-sans': 'font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
        'bg-white': 'background-color: white',
        'text-white': 'color: white',
        'text-black': 'color: black',
        'flex': 'display: flex',
        'items-center': 'align-items: center',
        'justify-center': 'justify-content: center',
        'flex-col': 'flex-direction: column',
        'p-0': 'padding: 0',
        'm-0': 'margin: 0',
        'text-base': 'font-size: 1rem; line-height: 1.5rem',
        'font-normal': 'font-weight: 400',
        'leading-normal': 'line-height: 1.5',
        'transition-all': 'transition-property: all',
        'ease-in-out': 'transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1)',
        'invisible': 'visibility: hidden',
        'opacity-0': 'opacity: 0',
        'border-r-0': 'border-right-width: 0',
        'pt-0': 'padding-top: 0',
        'pr-0': 'padding-right: 0',
        'mr-0': 'margin-right: 0',
      };

      // Traitement des règles @apply
      root.walkAtRules('apply', rule => {
        const parent = rule.parent;
        const classes = rule.params.trim().split(/\s+/);
        
        classes.forEach(className => {
          if (tailwindClasses[className]) {
            // Ajouter les propriétés CSS correspondantes
            const properties = tailwindClasses[className].split(';');
            properties.forEach(prop => {
              if (prop.trim()) {
                const [name, value] = prop.split(':');
                if (name && value) {
                  parent.append({ 
                    prop: name.trim(), 
                    value: value.trim() 
                  });
                }
              }
            });
          } else {
            // Pour les classes non définies, ajouter un commentaire
            parent.append({ 
              text: `/* Classe non définie: ${className} */`,
              type: 'comment'
            });
          }
        });
        
        // Supprimer la règle @apply
        rule.remove();
      });
    }
  };
};

module.exports.postcss = true;
