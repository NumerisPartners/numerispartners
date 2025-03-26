-- Script pour supprimer toutes les tables WordPress
-- ATTENTION : Ce script supprimera définitivement toutes les tables WordPress
-- Faites une sauvegarde avant de l'exécuter si vous avez besoin de conserver des données

-- Désactiver les contraintes de clé étrangère temporairement
SET FOREIGN_KEY_CHECKS = 0;

-- Supprimer les tables WordPress standard (avec préfixe wp_)
DROP TABLE IF EXISTS wp_commentmeta;
DROP TABLE IF EXISTS wp_comments;
DROP TABLE IF EXISTS wp_links;
DROP TABLE IF EXISTS wp_options;
DROP TABLE IF EXISTS wp_postmeta;
DROP TABLE IF EXISTS wp_posts;
DROP TABLE IF EXISTS wp_termmeta;
DROP TABLE IF EXISTS wp_terms;
DROP TABLE IF EXISTS wp_term_relationships;
DROP TABLE IF EXISTS wp_term_taxonomy;
DROP TABLE IF EXISTS wp_usermeta;
DROP TABLE IF EXISTS wp_users;

-- Tables supplémentaires souvent présentes avec des plugins
DROP TABLE IF EXISTS wp_woocommerce_order_items;
DROP TABLE IF EXISTS wp_woocommerce_order_itemmeta;
DROP TABLE IF EXISTS wp_woocommerce_tax_rates;
DROP TABLE IF EXISTS wp_woocommerce_tax_rate_locations;
DROP TABLE IF EXISTS wp_woocommerce_shipping_zones;
DROP TABLE IF EXISTS wp_woocommerce_shipping_zone_methods;
DROP TABLE IF EXISTS wp_woocommerce_shipping_zone_locations;
DROP TABLE IF EXISTS wp_woocommerce_payment_tokenmeta;
DROP TABLE IF EXISTS wp_woocommerce_payment_tokens;
DROP TABLE IF EXISTS wp_woocommerce_log;
DROP TABLE IF EXISTS wp_woocommerce_downloadable_product_permissions;
DROP TABLE IF EXISTS wp_woocommerce_attribute_taxonomies;
DROP TABLE IF EXISTS wp_woocommerce_sessions;
DROP TABLE IF EXISTS wp_woocommerce_api_keys;
DROP TABLE IF EXISTS wp_woocommerce_webhook_deliveries;
DROP TABLE IF EXISTS wp_woocommerce_webhooks;

-- Tables de cache et d'optimisation
DROP TABLE IF EXISTS wp_cache;
DROP TABLE IF EXISTS wp_yoast_seo_links;
DROP TABLE IF EXISTS wp_yoast_seo_meta;
DROP TABLE IF EXISTS wp_redirection_404;
DROP TABLE IF EXISTS wp_redirection_groups;
DROP TABLE IF EXISTS wp_redirection_items;
DROP TABLE IF EXISTS wp_redirection_logs;

-- Réactiver les contraintes de clé étrangère
SET FOREIGN_KEY_CHECKS = 1;

-- Si vous avez un préfixe personnalisé, vous pouvez utiliser cette requête pour trouver toutes les tables WordPress
-- et générer des instructions DROP TABLE pour chacune d'elles.
-- Décommentez et modifiez le préfixe si nécessaire :

/*
SELECT CONCAT('DROP TABLE IF EXISTS ', table_name, ';')
FROM information_schema.tables
WHERE table_schema = DATABASE()
AND table_name LIKE 'wp_%';
*/

-- Version alternative pour un préfixe personnalisé (remplacez 'custom_' par votre préfixe) :
/*
SELECT CONCAT('DROP TABLE IF EXISTS ', table_name, ';')
FROM information_schema.tables
WHERE table_schema = DATABASE()
AND table_name LIKE 'custom_%';
*/
