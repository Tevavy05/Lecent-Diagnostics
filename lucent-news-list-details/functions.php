<?php
/**
 * Lucent News List Details functions and definitions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Theme Setup
function lucent_news_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'lucent-news-list-details'),
        'footer'  => esc_html__('Footer Menu', 'lucent-news-list-details'),
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Add support for full and wide align images
    add_theme_support('align-wide');

    // Add support for editor styles
    add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'lucent_news_setup');

// Register Custom Post Type for News
function lucent_register_news_post_type() {
    $labels = array(
        'name'                  => _x('News', 'Post type general name', 'lucent-news-list-details'),
        'singular_name'         => _x('News', 'Post type singular name', 'lucent-news-list-details'),
        'menu_name'            => _x('News', 'Admin Menu text', 'lucent-news-list-details'),
        'add_new'              => __('Add New', 'lucent-news-list-details'),
        'add_new_item'         => __('Add New News', 'lucent-news-list-details'),
        'edit_item'            => __('Edit News', 'lucent-news-list-details'),
        'new_item'             => __('New News', 'lucent-news-list-details'),
        'view_item'            => __('View News', 'lucent-news-list-details'),
        'search_items'         => __('Search News', 'lucent-news-list-details'),
        'not_found'            => __('No news found', 'lucent-news-list-details'),
        'not_found_in_trash'   => __('No news found in Trash', 'lucent-news-list-details'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'news'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-media-text',
    );

    register_post_type('news', $args);
}
add_action('init', 'lucent_register_news_post_type');

// Register News Categories
function lucent_register_news_taxonomy() {
    $labels = array(
        'name'              => _x('News Categories', 'taxonomy general name', 'lucent-news-list-details'),
        'singular_name'     => _x('News Category', 'taxonomy singular name', 'lucent-news-list-details'),
        'search_items'      => __('Search News Categories', 'lucent-news-list-details'),
        'all_items'         => __('All News Categories', 'lucent-news-list-details'),
        'parent_item'       => __('Parent News Category', 'lucent-news-list-details'),
        'parent_item_colon' => __('Parent News Category:', 'lucent-news-list-details'),
        'edit_item'         => __('Edit News Category', 'lucent-news-list-details'),
        'update_item'       => __('Update News Category', 'lucent-news-list-details'),
        'add_new_item'      => __('Add New News Category', 'lucent-news-list-details'),
        'new_item_name'     => __('New News Category Name', 'lucent-news-list-details'),
        'menu_name'         => __('Categories', 'lucent-news-list-details'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'news-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('news_category', array('news'), $args);
}
add_action('init', 'lucent_register_news_taxonomy');

// Enqueue scripts and styles
function lucent_news_scripts() {
    wp_enqueue_style('lucent-news-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    // Add custom fonts if needed
    // wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Your+Font+Family&display=swap');
    
    // Add custom JavaScript
    wp_enqueue_script('lucent-news-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'lucent_news_scripts');

// Add ACF options page if ACF is installed
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => __('Theme Settings', 'lucent-news-list-details'),
        'menu_title'    => __('Theme Settings', 'lucent-news-list-details'),
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// Custom image sizes
add_image_size('news-thumbnail', 400, 300, true);
add_image_size('news-featured', 1200, 600, true);

// Excerpt length
function lucent_custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'lucent_custom_excerpt_length', 999);

// Excerpt "read more" text
function lucent_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'lucent_custom_excerpt_more');

// Register ACF Blocks
function lucent_register_acf_blocks() {
    if (function_exists('acf_register_block_type')) {
        // Intro Block
        acf_register_block_type(array(
            'name'              => 'lucent-intro',
            'title'             => __('Lucent Intro', 'lucent-news-list-details'),
            'description'       => __('A block to display intro section with title, description and image.', 'lucent-news-list-details'),
            'render_template'   => 'template-parts/blocks/lucent-intro.php',
            'category'          => 'lucent',
            'icon'              => 'admin-customizer',
            'keywords'          => array('intro', 'banner', 'heading'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
            ),
        ));

        // Contact Form Block
        acf_register_block_type(array(
            'name'              => 'lucent-contact-form',
            'title'             => __('Lucent Contact Form', 'lucent-news-list-details'),
            'description'       => __('A block to display contact form with custom styling.', 'lucent-news-list-details'),
            'render_template'   => 'template-parts/blocks/lucent-contact-form.php',
            'category'          => 'lucent',
            'icon'              => 'email',
            'keywords'          => array('contact', 'form', 'lucent'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
            ),
        ));

        // Featured Block
        acf_register_block_type(array(
            'name'              => 'lucent-featured',
            'title'             => __('Lucent Featured', 'lucent-news-list-details'),
            'description'       => __('A block to showcase featured content.', 'lucent-news-list-details'),
            'render_template'   => 'template-parts/blocks/lucent-featured.php',
            'category'          => 'lucent',
            'icon'              => 'star-filled',
            'keywords'          => array('featured', 'highlight', 'lucent'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
            ),
        ));

        // Header Block
        acf_register_block_type(array(
            'name'              => 'lucent-header',
            'title'             => __('Lucent Header', 'lucent-news-list-details'),
            'description'       => __('A block for custom header section.', 'lucent-news-list-details'),
            'render_template'   => 'template-parts/blocks/lucent-header.php',
            'category'          => 'lucent',
            'icon'              => 'align-center',
            'keywords'          => array('header', 'banner', 'lucent'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
            ),
        ));

        // Disclaimer Block
        acf_register_block_type(array(
            'name'              => 'lucent-disclaimer',
            'title'             => __('Lucent Disclaimer', 'lucent-news-list-details'),
            'description'       => __('A block to display disclaimer or legal information.', 'lucent-news-list-details'),
            'render_template'   => 'template-parts/blocks/lucent-disclaimer.php',
            'category'          => 'lucent',
            'icon'              => 'info',
            'keywords'          => array('disclaimer', 'legal', 'lucent'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
            ),
        ));

        // Footer Block
        acf_register_block_type(array(
            'name'              => 'lucent-footer',
            'title'             => __('Lucent Footer', 'lucent-news-list-details'),
            'description'       => __('A block for custom footer section.', 'lucent-news-list-details'),
            'render_template'   => 'template-parts/blocks/lucent-footer.php',
            'category'          => 'lucent',
            'icon'              => 'align-full-width',
            'keywords'          => array('footer', 'bottom', 'lucent'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
            ),
        ));

        // Register Lucent Resource Section block
        acf_register_block_type(array(
            'name'              => 'lucent-resource-section',
            'title'             => __('Lucent Resource Section', 'lucent-news-list-details'),
            'description'       => __('A block to display resource section with headline and content.', 'lucent-news-list-details'),
            'render_template'   => 'template-parts/blocks/lucent-resource-section.php',
            'category'          => 'lucent',
            'icon'              => 'text-page',
            'keywords'          => array('resource', 'content', 'section'),
            'supports'          => array(
                'align'           => false,
                'mode'           => false,
                'jsx'            => true,
                'multiple'       => true,
                'anchor'         => true
            ),
            'example'           => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'is_preview' => true
                    )
                )
            )
        ));

        // Register Lucent Testimonial block
        acf_register_block_type(array(
            'name'              => 'lucent-testimonial',
            'title'             => __('Lucent Testimonial', 'lucent-news-list-details'),
            'description'       => __('A block to display testimonial with quote and background image.', 'lucent-news-list-details'),
            'render_template'   => 'template-parts/blocks/lucent-testimonial.php',
            'category'          => 'lucent',
            'icon'              => 'format-quote',
            'keywords'          => array('testimonial', 'quote', 'review'),
            'supports'          => array(
                'align'           => false,
                'mode'           => false,
                'jsx'            => true,
                'multiple'       => true,
                'anchor'         => true
            ),
            'example'           => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'is_preview' => true
                    )
                )
            )
        ));
    }
}
add_action('acf/init', 'lucent_register_acf_blocks');

// Add custom block category
function lucent_block_categories($categories) {
    return array_merge(
        array(
            array(
                'slug'  => 'lucent',
                'title' => __('Lucent Blocks', 'lucent-news-list-details'),
                'icon'  => 'dashboard',
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'lucent_block_categories', 10, 2);

// Register ACF Blocks
add_action('acf/init', function() {
    // Check if function exists
    if (function_exists('acf_register_block_type')) {
        // Register Related News block
        acf_register_block_type([
            'name'              => 'lucent-related-news',
            'title'            => __('Lucent Related News'),
            'description'      => __('A block to display related news items in a grid'),
            'render_template'  => 'template-parts/blocks/lucent-related-news.php',
            'category'         => 'lucent',
            'icon'             => 'grid-view',
            'keywords'         => ['related', 'news', 'grid'],
            'supports'         => [
                'align' => true,
                'anchor' => true
            ],
        ]);
    }
});

// Remove menu and footer
function remove_menu_and_footer() {
    // Remove menu
    unregister_nav_menu('primary');
    unregister_nav_menu('footer');
    
    // Remove admin bar
    add_filter('show_admin_bar', '__return_false');
    
    // Remove footer
    remove_action('wp_footer', 'wp_footer');
}
add_action('after_setup_theme', 'remove_menu_and_footer');

// Add custom CSS to hide elements
function hide_elements_css() {
    ?>
    <style>
        .menu-toggle,
        #site-navigation,
        #colophon,
        .site-footer,
        .menu,
        .site-info {
            display: none !important;
        }
        body {
            margin: 0;
            padding: 0;
        }
        #content {
            padding-top: 0;
        }
        #wpadminbar {
            display: none;
        }
        html {
            margin-top: 0 !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'hide_elements_css'); 