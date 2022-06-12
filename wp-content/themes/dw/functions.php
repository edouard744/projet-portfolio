<?php

// Charger les fichiers nécessaires
require_once(__DIR__ . '/acf.php');
/*require_once(__DIR__ . '/Menus/PrimaryMenuWalker.php');*/
require_once(__DIR__ . '/CustomSearchQuery.php');
require_once(__DIR__ . '/Menus/PrimaryMenuItem.php');
/*require_once(__DIR__ . '/Forms/BaseFormController.php');*/
/*require_once(__DIR__ . '/Forms/ContactFormController.php');
require_once(__DIR__ . '/Forms/Sanitizers/BaseSanitizer.php');*/
/*require_once(__DIR__ . '/Forms/Sanitizers/TextSanitizer.php');*/
/*require_once(__DIR__ . '/Forms/Sanitizers/EmailSanitizer.php');*/
/*require_once(__DIR__ . '/Forms/Validators/BaseValidator.php');*/
/*require_once(__DIR__ . '/Forms/Validators/RequiredValidator.php');*/
/*require_once(__DIR__ . '/Forms/Validators/EmailValidator.php');*/
/*require_once(__DIR__ . '/Forms/Validators/AcceptedValidator.php');*/

// Lancer la sessions PHP pour pouvoir passer des variables de page en page
add_action('init', 'dw_boot_theme', 1);

add_filter('wpcf7_autop_or_not', '__return_false');


function dw_boot_theme()
{
    load_theme_textdomain('dw', __DIR__ . '/locales');

    if (! session_id()) {
        session_start();
    }
}

// Désactiver l'éditeur "Gutenberg" de Wordpress
/*add_filter('use_block_editor_for_post', '__return_false');*/

// Activer les images sur les articles
add_theme_support('post-thumbnails');
// Enregistrer un custom post-type pour les messages de contact
register_post_type('message', [
    'label' => 'Messages de contact',
    'labels' => [
        'name' => 'Messages de contact',
        'singular_name' => 'Message de contact',
    ],
    'description' => 'Les messages envoyés par le formulaire de contact.',
    'public' => false,
    'show_ui' => true,
    'menu_position' => 15,
    'menu_icon' => 'dashicons-buddicons-pm',
    'supports' => ['title','editor','thumbnail'],
    'capabilities' => [
        'create_posts' => false,
        'read_post' => true,
        'read_private_posts' => true,
        'edit_posts' => true,
    ],
    'map_meta_cap' => true,
]);
// Enregistrer un custom post-type pour les messages valeurs de la page "Projet Antilope"
register_post_type('Valeurs', [
    'label' => 'Les valeurs du projet',
    'labels' => [
        'name' => 'Les valeurs du projet',
        'singular_name' => ' valeur du projet',
    ],
    'description' => 'Vous pouvez ajouter ou modifier une valeur dans la page projet Antilope.',
    'public' => true,
    'show_ui' => true,
    'menu_position' => 30,
    'menu_icon' => 'dashicons-heart',
    'supports' => ['title','editor','thumbnail'],
    'rewrite' => ['slug' => 'module'],
]);
// Enregistrer un seul custom post-type pour "nos modules"
register_post_type('module', [
    'label' => 'Modules',
    'labels' => [
        'name' => 'Modules',
        'singular_name' => 'Module',
    ],
    'description' => 'Tous les articles qui décrivent les modules',
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-open-folder',
    'supports' => ['title','editor','thumbnail'],
    'rewrite' => ['slug' => 'module'],
]);
register_post_type('actualité', [
    'label' => 'Actualités',
    'labels' => [
        'name' => 'Actualités',
        'singular_name' => 'Actualité',
    ],
    'description' => 'Tous les post concernant l’actualités.',
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-admin-comments',
    'supports' => ['title','editor','thumbnail'],
    'rewrite' => ['slug' => 'news'],
]);
// Récupérer les modules via une requête Wordpress
function dw_get_news($count, $search = null)
{
    // 1. on instancie l'objet WP_Query
    $news = new DW_CustomSearchQuery([
        'post_type' => 'actualité',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $count,
        's' => strlen($search) ? $search : null,
    ]);

    // 2. on retourne l'objet WP_Query
    return $news;
}
function dw_get_value($count, $search = null)
{
    // 1. on instancie l'objet WP_Query
    $value = new DW_CustomSearchQuery([
        'post_type' => 'Valeurs',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $count,
        's' => strlen($search) ? $search : null,
    ]);

    // 2. on retourne l'objet WP_Query
    return $value;
}
function dw_get_history($count=20, $search = null)
{
    // 1. on instancie l'objet WP_Query
    $history = new DW_CustomSearchQuery([
        'post_type' => 'module',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $count,
        's' => strlen($search) ? $search : null,
    ]);

    // 2. on retourne l'objet WP_Query
    return $history;
}
function dw_get_modules($count, $search = null)
{
    // 1. on instancie l'objet WP_Query
    $modules = new DW_CustomSearchQuery([
        'post_type' => 'module',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $count,
        's' => strlen($search) ? $search : null,
    ]);

    // 2. on retourne l'objet WP_Query
    return $modules;
}
// Enregistrer les zones de menus

register_nav_menu('primary', 'Navigation principale (haut de page)');
register_nav_menu('footer', 'Navigation de pied de page');

// Fonction pour récupérer les éléments d'un menu sous forme d'un tableau d'objets

function dw_get_menu_items($location)
{
    $items = [];

    // Récupérer le menu Wordpress pour $location
    $locations = get_nav_menu_locations();

    if(! ($locations[$location] ?? false)) {
        return $items;
    }

    $menu = $locations[$location];

    // Récupérer tous les éléments du menu récupéré
    $posts = wp_get_nav_menu_items($menu);

    // Formater chaque élément dans une instance de classe personnalisée
    // Boucler sur chaque $post
    foreach($posts as $post) {
        // Transformer le WP_Post en une instance de notre classe personnalisée
        $item = new PrimaryMenuItem($post);

        // Ajouter au tableau d'éléments de niveau 0.
        if(! $item->isSubItem()) {
            $items[] = $item;
            continue;
        }

        // Ajouter $item comme "enfant" de l'item parent.
        foreach($items as $parent) {
            if(! $parent->isParentFor($item)) continue;

            $parent->addSubItem($item);
        }
    }

    // Retourner un tableau d'éléments du menu formatés
    return $items;
}

// Gérer l'envoi de formulaire personnalisé

add_action('admin_post_submit_contact_form', 'dw_handle_submit_contact_form');

function dw_handle_submit_contact_form()
{
    // Instancier le controlleur du form
    $form = new ContactFormController($_POST);
}

function dw_get_contact_field_value($field)
{
    if(! isset($_SESSION['contact_form_feedback'])) {
        return '';
    }

    return $_SESSION['contact_form_feedback']['data'][$field] ?? '';
}

function dw_get_contact_field_error($field)
{
    if(! isset($_SESSION['contact_form_feedback'])) {
        return '';
    }

    if(! ($_SESSION['contact_form_feedback']['errors'][$field] ?? null)) {
        return '';
    }

    return '<p>Ce champ ne respecte pas : ' . $_SESSION['contact_form_feedback']['errors'][$field] . '</p>';
}

// Fonction qui charge les assets compilés et retourne leure chemin absolu

function dw_mix($path)
{
    $path = '/' . ltrim($path, '/');

    if(! realpath(__DIR__ .'/public' . $path)) {
        return;
    }

    if(! ($manifest = realpath(__DIR__ .'/public/mix-manifest.json'))) {
        return get_stylesheet_directory_uri() . '/public' . $path;
    }

    // Ouvrir le fichier mix-manifest.json
    $manifest = json_decode(file_get_contents($manifest), true);

    // Regarder si on a une clef qui correspond au fichier chargé dans $path
    if(! array_key_exists($path, $manifest)) {
        return get_stylesheet_directory_uri() . '/public' . $path;
    }

    // Récupérer & retourner le chemin versionné
    return get_stylesheet_directory_uri() . '/public' . $manifest[$path];
}

// Restreindre la requête de recherche "par défaut"
function dw_restrict_search_query($query) {
    if ($query->is_search && ! is_admin() && ! is_a($query, DW_CustomSearchQuery::class)) {
        $query->set('post_type', ['post']);
    }

    return $query;
}

add_filter('pre_get_posts','dw_restrict_search_query');

// Fonction permettant d'inclure des "partials" dans la vue et d'y injecter des variables "locales" (uniquement disponibles dans le scope de l'inclusion).

function dw_include(string $partial, array $variables = [])
{
    extract($variables);

    include(__DIR__ . '/partials/' . $partial . '.php');
}
function dw_get_template_page(string $template)
{
    // Créer une WP_Query
    $query = new WP_Query([
        'post_type' => 'page', // uniquement récupérer des pages
        'post_status' => 'publish', // uniquement les pages publiées
        'meta_query' => [
            [
                'key' => '_wp_page_template',
                'value' => $template . '.php', // Filtrer sur le template utilisé
            ]
        ]
    ]);

    // Retourner le premier Post en question
    return $query->posts[0] ?? null;
}

