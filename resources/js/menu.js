/**
 * Menu mobile en JavaScript pur
 * Remplace les fonctionnalités jQuery précédentes
 */
document.addEventListener('DOMContentLoaded', function() {
    // Toggle menu pour mobile
    const menuToggle = document.querySelector('.menu.toggle-btn');
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            this.classList.toggle('open');
            const navbarCollapse = document.querySelector('.navbar-area .navbar-collapse');
            if (navbarCollapse) {
                navbarCollapse.classList.toggle('sopen');
            }
            
            const mainMenu = document.querySelector('.navbar-nav');
            if (mainMenu) {
                if (this.classList.contains('is-active')) {
                    mainMenu.classList.remove('menu-open');
                } else {
                    mainMenu.classList.add('menu-open');
                }
            }
        });
    }

    // Fonctionnalités spécifiques pour mobile
    if (window.innerWidth < 992) {
        // Clone des éléments pour le menu mobile
        const mobileElements = document.querySelectorAll('.in-mobile');
        mobileElements.forEach(function(element) {
            const clone = element.cloneNode(true);
            const sidebarInner = document.querySelector('.sidebar-inner');
            if (sidebarInner) {
                sidebarInner.appendChild(clone);
            }
        });

        // Ajouter des icônes aux éléments avec sous-menus
        const menuItemsWithChildren = document.querySelectorAll('.in-mobile ul li.menu-item-has-children');
        menuItemsWithChildren.forEach(function(item) {
            const icon = document.createElement('i');
            icon.className = 'fas fa-chevron-right';
            item.appendChild(icon);
        });

        // Gestion des clics sur les éléments avec sous-menus
        const menuItemLinks = document.querySelectorAll('.menu-item-has-children a');
        menuItemLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const subMenu = this.nextElementSibling;
                if (subMenu && subMenu.classList.contains('sub-menu')) {
                    e.preventDefault();
                    
                    // Toggle de la hauteur du sous-menu (animation)
                    if (subMenu.style.display === 'none' || !subMenu.style.display) {
                        subMenu.style.display = 'block';
                        subMenu.style.height = '0px';
                        const height = subMenu.scrollHeight;
                        
                        // Animation d'ouverture
                        let start = null;
                        function animate(timestamp) {
                            if (!start) start = timestamp;
                            const progress = timestamp - start;
                            const percent = Math.min(progress / 300, 1);
                            subMenu.style.height = (height * percent) + 'px';
                            
                            if (progress < 300) {
                                window.requestAnimationFrame(animate);
                            } else {
                                subMenu.style.height = 'auto';
                            }
                        }
                        window.requestAnimationFrame(animate);
                    } else {
                        // Animation de fermeture
                        const height = subMenu.scrollHeight;
                        subMenu.style.height = height + 'px';
                        
                        let start = null;
                        function animate(timestamp) {
                            if (!start) start = timestamp;
                            const progress = timestamp - start;
                            const percent = 1 - Math.min(progress / 300, 1);
                            subMenu.style.height = (height * percent) + 'px';
                            
                            if (progress < 300) {
                                window.requestAnimationFrame(animate);
                            } else {
                                subMenu.style.display = 'none';
                            }
                        }
                        window.requestAnimationFrame(animate);
                    }
                }
            });
        });
    }

    // Gestion du redimensionnement de la fenêtre
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 992) {
            // Réinitialiser les styles pour la version desktop
            const openMenus = document.querySelectorAll('.sub-menu');
            openMenus.forEach(function(menu) {
                menu.style.height = '';
                menu.style.display = '';
            });
        }
    });
});
