<?php
/**
 * Lucent List News & Events functions and definitions
 */

// Theme Setup
function lucent_list_news_events_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for responsive embeds.
    add_theme_support('responsive-embeds');

    // Add support for custom line height controls.
    add_theme_support('custom-line-height');

    // Add support for experimental link color control.
    add_theme_support('experimental-link-color');

    // Add support for experimental cover block spacing.
    add_theme_support('custom-spacing');

    // Add support for custom units.
    add_theme_support('custom-units');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'lucent-list-news-events'),
        'footer'  => __('Footer Menu', 'lucent-list-news-events'),
    ));
}
add_action('after_setup_theme', 'lucent_list_news_events_setup');

// Register ACF Blocks
function lucent_list_news_events_register_blocks() {
    // Check if ACF Pro is active
    if (!function_exists('acf_register_block_type')) {
        return;
    }

    // Register Lucent Hero block
    acf_register_block_type(array(
        'name'              => 'lucent-hero',
        'title'             => __('Lucent Hero', 'lucent-list-news-events'),
        'description'       => __('Hero section với background, eyebrow text, title và description.', 'lucent-list-news-events'),
        'render_template'   => 'template-parts/blocks/lucent-hero.php',
        'category'          => 'lucent',
        'icon'              => 'cover-image',
        'keywords'          => array('hero', 'banner', 'lucent'),
        'mode'              => 'preview',
        'supports'          => array(
            'align'           => false,
            'mode'           => true,
            'jsx'            => true,
            'multiple'       => false,
            'anchor'         => true,
            '__experimental_jsx' => true,
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

    // Register Lucent Header block
    acf_register_block_type(array(
        'name'              => 'lucent-header',
        'title'             => __('Lucent Header', 'lucent-list-news-events'),
        'description'       => __('Header block cho Lucent List News & Events.', 'lucent-list-news-events'),
        'render_template'   => 'template-parts/blocks/lucent-header.php',
        'category'          => 'lucent',
        'icon'              => 'admin-site',
        'keywords'          => array('header', 'lucent', 'menu'),
        'mode'              => 'preview',
        'supports'          => array(
            'align'           => false,
            'mode'           => true,
            'jsx'            => true,
            'multiple'       => false,
            'anchor'         => true,
            '__experimental_jsx' => true,
        ),
        'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true
                )
            )
        ),
        'enqueue_assets'    => function() {
            wp_enqueue_style(
                'lucent-header-style',
                get_template_directory_uri() . '/assets/css/blocks/header.css',
                array(),
                '1.0.0'
            );
            wp_enqueue_script(
                'lucent-header-script',
                get_template_directory_uri() . '/assets/js/blocks/header.js',
                array('jquery'),
                '1.0.0',
                true
            );
        }
    ));

    // Register Lucent Footer block
    acf_register_block_type(array(
        'name'              => 'lucent-footer',
        'title'             => __('Lucent Footer', 'lucent-list-news-events'),
        'description'       => __('Footer block cho Lucent List News & Events.', 'lucent-list-news-events'),
        'render_template'   => 'template-parts/blocks/lucent-footer.php',
        'category'          => 'lucent',
        'icon'              => 'admin-site',
        'keywords'          => array('footer', 'lucent'),
        'mode'              => 'preview',
        'supports'          => array(
            'align'           => false,
            'mode'           => true,
            'jsx'            => true,
            'multiple'       => false,
            'anchor'         => true,
            '__experimental_jsx' => true,
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

    // Register Lucent Disclaimer block
    acf_register_block_type(array(
        'name'              => 'lucent-disclaimer',
        'title'             => __('Lucent Disclaimer', 'lucent-list-news-events'),
        'description'       => __('Block hiển thị thông tin disclaimer', 'lucent-list-news-events'),
        'render_template'   => 'template-parts/blocks/lucent-disclaimer.php',
        'category'          => 'lucent',
        'icon'              => 'info',
        'keywords'          => array('disclaimer', 'notice', 'lucent'),
        'mode'              => 'preview',
        'supports'          => array(
            'align'           => false,
            'mode'           => true,
            'jsx'            => true,
            'multiple'       => false,
            'anchor'         => true,
            '__experimental_jsx' => true,
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

    // Register Lucent Featured Content block
    acf_register_block_type(array(
        'name'              => 'lucent-featured',
        'title'             => __('Lucent Featured Content', 'lucent-list-news-events'),
        'description'       => __('Featured content block with title, description, and background image with navigation.', 'lucent-list-news-events'),
        'render_template'   => 'template-parts/blocks/lucent-featured.php',
        'category'          => 'lucent',
        'icon'              => 'star-filled',
        'keywords'          => array('featured', 'content', 'lucent'),
        'mode'              => 'preview',
        'supports'          => array(
            'align'           => false,
            'mode'           => true,
            'jsx'            => true,
            'multiple'       => true,
            'anchor'         => true,
            '__experimental_jsx' => true,
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

    // Register Lucent News Grid block
    acf_register_block_type(array(
        'name'              => 'lucent-news-grid',
        'title'             => __('Lucent News Grid', 'lucent-list-news-events'),
        'description'       => __('Display news items in a responsive grid layout.', 'lucent-list-news-events'),
        'render_template'   => 'template-parts/blocks/lucent-news-grid.php',
        'category'          => 'lucent',
        'icon'              => 'grid-view',
        'keywords'          => array('news', 'grid', 'lucent'),
        'mode'              => 'edit',
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

    // Register Lucent Pagination block
    acf_register_block_type(array(
        'name'              => 'lucent-pagination',
        'title'             => __('Lucent Pagination', 'lucent-list-news-events'),
        'description'       => __('A custom pagination block for navigation', 'lucent-list-news-events'),
        'render_template'   => 'template-parts/blocks/lucent-pagination.php',
        'category'          => 'lucent',
        'icon'              => 'menu',
        'keywords'          => array('pagination', 'navigation', 'pages'),
        'mode'              => 'edit',
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

    // Register Lucent Contact Form block
    acf_register_block_type(array(
        'name'              => 'lucent-contact-form',
        'title'             => __('Lucent Contact Form', 'lucent-list-news-events'),
        'description'       => __('A contact form block with background pattern', 'lucent-list-news-events'),
        'render_template'   => 'template-parts/blocks/lucent-contact-form.php',
        'category'          => 'lucent',
        'icon'              => 'email',
        'keywords'          => array('contact', 'form', 'subscribe'),
        'mode'              => 'edit',
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
add_action('acf/init', 'lucent_list_news_events_register_blocks');

// Prevent duplicate blocks
function lucent_list_news_events_filter_blocks($pre, $block) {
    static $rendered_blocks = array();
    
    // Check if this is a header or footer block
    if (in_array($block['blockName'], array('acf/lucent-header', 'acf/lucent-footer'))) {
        $block_id = $block['attrs']['id'] ?? $block['blockName'];
        
        // If we've already rendered this block type, skip it
        if (isset($rendered_blocks[$block_id])) {
            return '';
        }
        
        // Mark this block type as rendered
        $rendered_blocks[$block_id] = true;
    }
    
    return $pre;
}
add_filter('pre_render_block', 'lucent_list_news_events_filter_blocks', 10, 2);

// Register custom block category
function lucent_list_news_events_block_categories($categories) {
    return array_merge(
        array(
            array(
                'slug'  => 'lucent',
                'title' => __('Lucent Blocks', 'lucent-list-news-events'),
                'icon'  => 'admin-site',
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'lucent_list_news_events_block_categories', 10, 1);

// Enqueue scripts and styles
function lucent_list_news_events_scripts() {
    wp_enqueue_style('lucent-list-news-events-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'lucent_list_news_events_scripts');

// Ensure ACF and blocks are properly loaded
function lucent_list_news_events_check_dependencies() {
    if (!function_exists('acf_register_block_type')) {
        add_action('admin_notices', function() {
            ?>
            <div class="notice notice-error">
                <p><?php _e('Advanced Custom Fields Pro plugin is required for this theme to function properly. Please install and activate ACF Pro.', 'lucent-list-news-events'); ?></p>
            </div>
            <?php
        });
        return;
    }
}
add_action('admin_init', 'lucent_list_news_events_check_dependencies');

// Force load ACF field configurations from JSON
function lucent_list_news_events_load_acf_json($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'lucent_list_news_events_load_acf_json');

// Save ACF field configurations to JSON
function lucent_list_news_events_save_acf_json($path) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}
add_filter('acf/settings/save_json', 'lucent_list_news_events_save_acf_json'); 