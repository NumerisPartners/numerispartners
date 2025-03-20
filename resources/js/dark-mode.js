/**
 * Dark mode functionality
 * 
 * Note: La plupart de la logique a été déplacée directement dans les templates
 * Ce fichier est conservé pour référence et pour d'éventuelles fonctionnalités supplémentaires
 */

// Écoute des changements de préférence système
document.addEventListener('DOMContentLoaded', function() {
    // Écouter les changements de préférence système
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        // Ne mettre à jour que si l'utilisateur n'a pas de préférence explicite
        if (localStorage.getItem('darkMode') === null) {
            if (e.matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    });
});
