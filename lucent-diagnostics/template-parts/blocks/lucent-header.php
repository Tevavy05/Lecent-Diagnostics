<?php
/**
 * Block Name: Lucent Header
 */

// Create SVG icon for dropdown
$dropdown_icon = '<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>';

// Create SVG icon for search
$search_icon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>';

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-header-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values
$class_name = 'lucent-header';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Get fields
$logo = get_field('logo');
$menu_items = get_field('menu_items');
$portal_text = get_field('portal_text');
$portal_link = get_field('portal_link');
$contact_text = get_field('contact_text');
$contact_link = get_field('contact_link');

// For preview
$is_preview = isset($block['data']['is_preview']) ? $block['data']['is_preview'] : false;
if ($is_preview) {
    $logo = array(
        'url' => get_template_directory_uri() . '/assets/images/placeholder-logo.png',
        'alt' => 'Logo'
    );
    $menu_items = array(
        array(
            'text' => 'Products',
            'link' => '#',
            'has_dropdown' => true
        ),
        array(
            'text' => 'Technology',
            'link' => '#',
            'has_dropdown' => false
        ),
        array(
            'text' => 'Partners',
            'link' => '#',
            'has_dropdown' => false
        ),
        array(
            'text' => 'News',
            'link' => '#',
            'has_dropdown' => false
        ),
        array(
            'text' => 'About',
            'link' => '#',
            'has_dropdown' => false
        )
    );
    $portal_text = 'Provider Portal';
    $portal_link = '#';
    $contact_text = 'Contact Us';
    $contact_link = '#';
}
?>

<header id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="lucent-header__container">
            <?php if ($logo) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="lucent-header__logo">
                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                </a>
            <?php endif; ?>

            <div class="lucent-header__center">
                <?php if ($menu_items) : ?>
                    <nav class="lucent-header__nav">
                        <ul class="lucent-header__menu">
                            <?php foreach ($menu_items as $item) : ?>
                                <li class="lucent-header__menu-item<?php echo $item['has_dropdown'] ? ' has-dropdown' : ''; ?>">
                                    <a href="<?php echo esc_url($item['link']); ?>" class="lucent-header__menu-link">
                                        <?php echo esc_html($item['text']); ?>
                                        <?php if ($item['has_dropdown']) : ?>
                                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                <?php endif; ?>

                <div class="lucent-header__separator"></div>

                <?php if ($portal_text && $portal_link) : ?>
                    <a href="<?php echo esc_url($portal_link); ?>" class="lucent-header__portal">
                        <?php echo esc_html($portal_text); ?>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>

            <div class="lucent-header__actions">
                <?php if ($contact_text && $contact_link) : ?>
                    <a href="<?php echo esc_url($contact_link); ?>" class="lucent-header__contact">
                        <?php echo esc_html($contact_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<style>
.lucent-header {
    padding: 24px 0;
    background: #fff;
    position: sticky;
    top: 0;
    z-index: 100;
}

.container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 32px;
    width: 100%;
}

.lucent-header__container {
    display: flex;
    align-items: center;
    gap: 16px;
}

.lucent-header__logo {
    display: block;
    max-width: 320px;
}

.lucent-header__logo img {
    width: 100%;
    height: auto;
}

.lucent-header__center {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 24px;
}

.lucent-header__nav {
    display: flex;
    align-items: center;
}

.lucent-header__menu {
    display: flex;
    align-items: center;
    gap: 24px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.lucent-header__menu-item {
    position: relative;
}

.lucent-header__menu-link {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #00263A;
    text-decoration: none;
    font-size: 19px;
    font-weight: 500;
    transition: color 0.2s ease;
}

.lucent-header__menu-link:hover {
    color: #1976E6;
}

.lucent-header__actions {
    display: flex;
    align-items: center;
    gap: 24px;
}

.lucent-header__separator {
    width: 2px;
    height: 24px;
    background-color: #D1D5DB;
    margin: 0 24px;
}

.lucent-header__portal {
    color: #6B7280;
    text-decoration: none;
    font-size: 19px;
    font-weight: 500;
    transition: color 0.2s ease;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 8px;
}

.lucent-header__portal:hover {
    color: #1976E6;
}

.lucent-header__portal svg {
    width: 16px;
    height: 16px;
}

.lucent-header__contact {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 32px;
    background-color: #1976E6;
    color: #fff;
    text-decoration: none;
    font-size: 19px;
    font-weight: 600;
    border-radius: 32px;
    transition: background-color 0.2s ease;
    white-space: nowrap;
}

.lucent-header__contact:hover {
    background-color: #125bb5;
}

@media (max-width: 1024px) {
    .container {
        padding: 0 24px;
    }

    .lucent-header__menu {
        gap: 24px;
    }

    .lucent-header__actions {
        gap: 16px;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 16px;
    }

    .lucent-header__container {
        flex-wrap: wrap;
    }

    .lucent-header__nav {
        order: 3;
        width: 100%;
        margin-top: 16px;
    }

    .lucent-header__menu {
        flex-wrap: wrap;
        justify-content: center;
        gap: 16px;
    }

    .lucent-header__actions {
        flex-wrap: wrap;
        justify-content: center;
    }
}

/* Editor and Preview Styles */
.block-editor-block-list__layout .lucent-header,
.lucent-header {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}
</style> 