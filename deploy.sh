#!/bin/bash

echo "===== DÉBUT DU DÉPLOIEMENT DE NUMERISPARTNERS ====="
echo "$(date)"
echo "=================================================="

# Mettre le site en mode maintenance
echo "Mise en mode maintenance..."
php artisan down --message="Le site est en cours de maintenance. Nous serons de retour dans quelques minutes." || true

# Installation des dépendances Composer
echo "Installation des dépendances Composer..."
php ~/composer.phar install --no-dev --prefer-dist --optimize-autoloader || {
    echo "Erreur lors de l'installation des dépendances Composer"
    php artisan up
    exit 1
}

# Copier le fichier .env.example vers .env s'il n'existe pas
if [ ! -f .env ]; then 
    echo "Création du fichier .env..."
    cp .env.example .env
    # Générer la clé d'application
    echo "Génération de la clé d'application..."
    php artisan key:generate --force
fi

# Vérifier les permissions des dossiers
echo "Vérification et correction des permissions..."
chmod -R 755 storage bootstrap/cache || true
chmod -R o+w storage bootstrap/cache || true

# Migrations de base de données
echo "Exécution des migrations de base de données..."
php artisan migrate --force || {
    echo "Erreur lors des migrations"
    php artisan up
    exit 1
}

# Optimisations pour la production
echo "Optimisation de l'application pour la production..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Effacer les caches d'optimisation si en développement
# Décommentez ces lignes si vous êtes en environnement de développement
# php artisan config:clear
# php artisan route:clear
# php artisan view:clear

# Nettoyage des sessions expirées et autres tâches de maintenance
echo "Nettoyage des sessions expirées..."
php artisan auth:clear-resets || true

# Publication des assets si nécessaire
echo "Publication des assets..."
php artisan storage:link || true

# Compilation des assets (si vous utilisez npm/yarn)
# Décommentez ces lignes si vous avez besoin de compiler des assets
# echo "Compilation des assets..."
# npm ci
# npm run build

# Sortir du mode maintenance
echo "Sortie du mode maintenance..."
php artisan up

echo "=================================================="
echo "===== DÉPLOIEMENT TERMINÉ AVEC SUCCÈS ====="
echo "$(date)"
echo "=================================================="
