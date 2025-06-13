<?php
// Theme Setup
function lucent_diagnostics_setup() {
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
}
add_action('after_setup_theme', 'lucent_diagnostics_setup');

// Ensure blocks are registered at the right time
function lucent_init_blocks() {
    // Check if ACF Pro is active
    if (!function_exists('acf_register_block_type')) {
        return;
    }

    // Register Lucent Header block
    acf_register_block_type(array(
        'name'              => 'lucent-header',
        'title'             => __('Lucent Header', 'lucent-diagnostics'),
        'description'       => __('Header block cho Lucent Diagnostics.', 'lucent-diagnostics'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/lucent-header.php',
        'category'          => 'lucent',
        'icon'              => 'admin-site',
        'keywords'          => array('header', 'lucent', 'menu'),
        'mode'              => 'edit',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
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

    // Register Lucent Hero block
    acf_register_block_type(array(
        'name'              => 'lucent-hero',
        'title'             => __('Lucent Hero', 'lucent-diagnostics'),
        'description'       => __('A custom hero block for Lucent Diagnostics'),
        'render_template'   => 'template-parts/blocks/lucent-hero.php',
        'category'          => 'design',
        'icon'              => 'cover-image',
        'keywords'          => array('hero', 'banner', 'header'),
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
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

    // Register Lucent Technology block
    acf_register_block_type(array(
        'name'              => 'lucent-technology',
        'title'             => __('Lucent Technology', 'lucent-diagnostics'),
        'description'       => __('A block showcasing Lucent Diagnostics technology'),
        'render_template'   => 'template-parts/blocks/lucent-technology.php',
        'category'          => 'design',
        'icon'              => 'admin-generic',
        'keywords'          => array('technology', 'simoa', 'feature'),
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
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

    // Register Lucent Features block
    acf_register_block_type(array(
        'name'              => 'lucent-features',
        'title'             => __('Lucent Features'),
        'description'       => __('A custom block for displaying features with icons.'),
        'render_template'   => 'template-parts/blocks/lucent-features.php',
        'category'          => 'formatting',
        'icon'              => 'grid-view',
        'keywords'          => array('features', 'icons', 'grid'),
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
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

    // Register Lucent Intro block
    acf_register_block_type(array(
        'name'              => 'lucent-intro',
        'title'             => __('Lucent Intro', 'lucent-diagnostics'),
        'description'       => __('A custom intro block for Lucent Diagnostics'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/lucent-intro.php',
        'category'          => 'lucent',
        'icon'              => 'text',
        'keywords'          => array('intro', 'text', 'content'),
        'mode'              => 'edit',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
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

    // Register Lucent Products block
    acf_register_block_type(array(
        'name'              => 'lucent-products',
        'title'             => __('Lucent Products', 'lucent-diagnostics'),
        'description'       => __('A custom block for displaying Lucent Diagnostics products'),
        'render_template'   => get_template_directory() . '/template-parts/blocks/lucent-products.php',
        'category'          => 'lucent',
        'icon'              => 'products',
        'keywords'          => array('products', 'grid', 'cards'),
        'mode'              => 'edit',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
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

    // Register Lucent About block
    acf_register_block_type(array(
        'name'              => 'lucent-about',
        'title'             => __('Lucent About'),
        'description'       => __('A custom block for displaying about us section with video'),
        'render_template'   => 'template-parts/blocks/lucent-about.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('about', 'video', 'lucent'),
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
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

    // Register Lucent Contact block
    acf_register_block_type(array(
        'name'              => 'lucent-contact',
        'title'             => __('Lucent Contact'),
        'description'       => __('A custom block for displaying contact section with background pattern'),
        'render_template'   => 'template-parts/blocks/lucent-contact.php',
        'category'          => 'formatting',
        'icon'              => 'email',
        'keywords'          => array('contact', 'get in touch', 'lucent'),
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
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
        'title'             => __('Lucent Disclaimer'),
        'description'       => __('A custom block for displaying disclaimer text'),
        'render_template'   => 'template-parts/blocks/lucent-disclaimer.php',
        'category'          => 'formatting',
        'icon'              => 'info',
        'keywords'          => array('disclaimer', 'notice', 'lucent'),
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
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

    // Register Lucent Footer block
    acf_register_block_type(array(
        'name'              => 'lucent-footer',
        'title'             => __('Lucent Footer'),
        'description'       => __('A custom block for displaying the site footer'),
        'render_template'   => 'template-parts/blocks/lucent-footer.php',
        'category'          => 'formatting',
        'icon'              => 'align-wide',
        'keywords'          => array('footer', 'menu', 'lucent'),
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
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
add_action('acf/init', 'lucent_init_blocks');

// Register custom block category
function lucent_block_categories($categories) {
    return array_merge(
        array(
            array(
                'slug'  => 'lucent',
                'title' => __('Lucent Blocks', 'lucent-diagnostics'),
                'icon'  => 'admin-site',
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'lucent_block_categories', 10, 1);

// Register ACF Fields for Lucent Header
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_lucent_header',
        'title' => 'Lucent Header Settings',
        'fields' => array(
            array(
                'key' => 'field_logo',
                'label' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
                'instructions' => 'Upload logo cho header',
                'required' => 1,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_menu_items',
                'label' => 'Menu Items',
                'name' => 'menu_items',
                'type' => 'repeater',
                'instructions' => 'Thêm các mục menu',
                'required' => 0,
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_menu_item_text',
                        'label' => 'Menu Text',
                        'name' => 'text',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_menu_item_link',
                        'label' => 'Menu Link',
                        'name' => 'link',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_menu_item_has_dropdown',
                        'label' => 'Has Dropdown',
                        'name' => 'has_dropdown',
                        'type' => 'true_false',
                        'instructions' => 'Check nếu menu item này có dropdown',
                        'required' => 0,
                        'default_value' => 0,
                        'ui' => 1,
                    ),
                ),
            ),
            array(
                'key' => 'field_portal_text',
                'label' => 'Portal Button Text',
                'name' => 'portal_text',
                'type' => 'text',
                'instructions' => 'Văn bản cho nút Provider Portal',
                'required' => 1,
                'default_value' => 'Provider Portal',
            ),
            array(
                'key' => 'field_portal_link',
                'label' => 'Portal Button Link',
                'name' => 'portal_link',
                'type' => 'url',
                'instructions' => 'Link cho nút Provider Portal',
                'required' => 1,
            ),
            array(
                'key' => 'field_contact_text',
                'label' => 'Contact Button Text',
                'name' => 'contact_text',
                'type' => 'text',
                'instructions' => 'Văn bản cho nút Contact Us',
                'required' => 1,
                'default_value' => 'Contact Us',
            ),
            array(
                'key' => 'field_contact_link',
                'label' => 'Contact Button Link',
                'name' => 'contact_link',
                'type' => 'url',
                'instructions' => 'Link cho nút Contact Us',
                'required' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/lucent-header',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

endif; 

// Register ACF Fields for Lucent Intro
if (function_exists('acf_add_local_field_group')):
    acf_add_local_field_group(array(
        'key' => 'group_lucent_intro',
        'title' => 'Lucent Intro Settings',
        'fields' => array(
            array(
                'key' => 'field_lucent_intro_text',
                'label' => 'Intro Text',
                'name' => 'intro_text',
                'type' => 'textarea',
                'instructions' => 'Enter the main text for the intro section',
                'required' => 1,
                'default_value' => 'Using ultra-sensitive, multi-plex technology, Lucent Diagnostics delivers easily accessible, industry-leading products, like no other, giving clinicians non-invasive diagnostic tools that they can rely on.',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 4,
                'new_lines' => 'br'
            ),
            array(
                'key' => 'field_lucent_intro_background',
                'label' => 'Background Color',
                'name' => 'background_color',
                'type' => 'color_picker',
                'instructions' => 'Choose the background color for the intro section',
                'required' => 1,
                'default_value' => '#1e73be'
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/lucent-intro'
                )
            )
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => ''
    ));
endif;

// Ensure ACF and blocks are properly loaded
function lucent_check_acf_dependencies() {
    if (!function_exists('acf_register_block_type')) {
        add_action('admin_notices', function() {
            ?>
            <div class="notice notice-error">
                <p><?php _e('Advanced Custom Fields Pro plugin is required for this theme to function properly. Please install and activate ACF Pro.', 'lucent-diagnostics'); ?></p>
            </div>
            <?php
        });
        return;
    }
}
add_action('admin_init', 'lucent_check_acf_dependencies');

// Force load ACF field configurations from JSON
function lucent_load_acf_json($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'lucent_load_acf_json');

// Save ACF field configurations to JSON
function lucent_save_acf_json($path) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}
add_filter('acf/settings/save_json', 'lucent_save_acf_json');

// Debug ACF and Blocks registration
function lucent_debug_acf_blocks() {
    if (current_user_can('manage_options')) { // Only for administrators
        // Check if ACF Pro is active
        if (function_exists('acf_register_block_type')) {
            error_log('ACF Pro is active and working');
            
            // Log registered blocks
            if (function_exists('acf_get_block_types')) {
                $registered_blocks = acf_get_block_types();
                error_log('Registered ACF Blocks: ' . print_r($registered_blocks, true));
            }
        } else {
            error_log('ACF Pro is not working properly');
        }
    }
}
add_action('init', 'lucent_debug_acf_blocks', 20); 