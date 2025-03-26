#!/bin/bash

echo "===== DÉBUT DU DÉPLOIEMENT DE NUMERISPARTNERS ====="
echo "$(date)"
echo "=================================================="

# Vérifier l'existence du fichier .env
if [ ! -f .env ]; then 
    echo "Création du fichier .env..."
    cp .env.example .env
    echo "ATTENTION: Le fichier .env a été créé à partir de .env.example."
    echo "Vous devez configurer manuellement les informations de connexion à la base de données."
fi

# Vérifier la connexion à la base de données
echo "Vérification de la connexion à la base de données..."
DB_CONNECTION_TEST=$(php -r "
    \$env = file_get_contents('.env');
    preg_match('/DB_HOST=(.*)/', \$env, \$matches);
    \$host = trim(\$matches[1]);
    preg_match('/DB_PORT=(.*)/', \$env, \$matches);
    \$port = trim(\$matches[1]);
    preg_match('/DB_DATABASE=(.*)/', \$env, \$matches);
    \$database = trim(\$matches[1]);
    preg_match('/DB_USERNAME=(.*)/', \$env, \$matches);
    \$username = trim(\$matches[1]);
    preg_match('/DB_PASSWORD=(.*)/', \$env, \$matches);
    \$password = trim(\$matches[1]);
    
    \$conn = @mysqli_connect(\$host, \$username, \$password, \$database, \$port);
    if (!\$conn) {
        echo 'ERROR: ' . mysqli_connect_error();
    } else {
        echo 'SUCCESS';
        mysqli_close(\$conn);
    }
")

if [[ $DB_CONNECTION_TEST != *"SUCCESS"* ]]; then
    echo "ERREUR: Impossible de se connecter à la base de données:"
    echo $DB_CONNECTION_TEST
    echo "Veuillez vérifier les informations de connexion dans le fichier .env"
    exit 1
fi

# Mettre le site en mode maintenance
echo "Mise en mode maintenance..."
php artisan down --message="Le site est en cours de maintenance. Nous serons de retour dans quelques minutes." || true

# Installation des dépendances Composer
echo "Installation des dépendances Composer..."
php ~/composer.phar install --no-dev --prefer-dist --optimize-autoloader || {
    echo "Tentative d'installation avec composer global..."
    composer install --no-dev --prefer-dist --optimize-autoloader || {
        echo "ERREUR lors de l'installation des dépendances Composer"
        php artisan up
        exit 1
    }
}

# Générer la clé d'application si elle n'existe pas
php artisan key:generate --force || {
    echo "ERREUR lors de la génération de la clé d'application"
    echo "Vérifiez les permissions et la configuration"
}

# Vérifier les permissions des dossiers
echo "Vérification et correction des permissions..."
chmod -R 755 storage bootstrap/cache || true
chmod -R o+w storage bootstrap/cache || true

# Migrations de base de données avec debug
echo "Exécution des migrations de base de données..."
php artisan migrate --force -v || {
    echo "ERREUR lors des migrations de base de données"
    echo "Tentative de diagnostic..."
    
    # Vérifier si les tables existent déjà
    TABLE_COUNT=$(php -r "
        \$env = file_get_contents('.env');
        preg_match('/DB_HOST=(.*)/', \$env, \$matches);
        \$host = trim(\$matches[1]);
        preg_match('/DB_PORT=(.*)/', \$env, \$matches);
        \$port = trim(\$matches[1]);
        preg_match('/DB_DATABASE=(.*)/', \$env, \$matches);
        \$database = trim(\$matches[1]);
        preg_match('/DB_USERNAME=(.*)/', \$env, \$matches);
        \$username = trim(\$matches[1]);
        preg_match('/DB_PASSWORD=(.*)/', \$env, \$matches);
        \$password = trim(\$matches[1]);
        
        \$conn = @mysqli_connect(\$host, \$username, \$password, \$database, \$port);
        if (\$conn) {
            \$result = mysqli_query(\$conn, 'SHOW TABLES');
            echo mysqli_num_rows(\$result);
            mysqli_close(\$conn);
        } else {
            echo '0';
        }
    ")
    
    if [ "$TABLE_COUNT" -eq "0" ]; then
        echo "La base de données est vide. Tentative de création manuelle des tables de migration..."
        php artisan migrate:install -v || true
        php artisan migrate --force -v || true
    else
        echo "Il y a déjà $TABLE_COUNT tables dans la base de données."
        echo "Tentative de réinitialisation et de migration..."
        php artisan migrate:fresh --force -v || true
    fi
}

# Optimisations pour la production
echo "Optimisation de l'application pour la production..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Nettoyage des sessions expirées et autres tâches de maintenance
echo "Nettoyage des sessions expirées..."
php artisan auth:clear-resets || true

# Publication des assets si nécessaire
echo "Publication des assets..."
php artisan storage:link || true

# Sortir du mode maintenance
echo "Sortie du mode maintenance..."
php artisan up

echo "=================================================="
echo "===== DÉPLOIEMENT TERMINÉ ====="
echo "$(date)"
echo "=================================================="
