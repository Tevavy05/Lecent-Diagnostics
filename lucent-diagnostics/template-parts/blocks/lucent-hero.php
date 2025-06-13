<?php
/**
 * Block Name: Lucent Hero
 */

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-hero-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values
$class_name = 'lucent-hero';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Tạo placeholder data cho preview mode
$is_preview = isset($block['data']['is_preview']) ? $block['data']['is_preview'] : false;

if ($is_preview) {
    // Data mẫu cho preview mode
    $eyebrow = 'EYEBROW LOREM';
    $heading = 'Changing the landscape of Cognitive Disease';
    $description = 'Delivering diagnostic advancements, powered by research and technology excellence';
    $primary_button = array(
        'title' => 'Our Technology',
        'url' => '#'
    );
    $secondary_button = array(
        'title' => 'Contact us',
        'url' => '#'
    );
    $hero_image = array(
        'url' => get_template_directory_uri() . '/assets/images/hero-placeholder.jpg',
        'alt' => 'Hero image'
    );
} else {
    // Get real data from ACF fields
    $eyebrow = get_field('eyebrow');
    $heading = get_field('heading');
    $description = get_field('description');
    $primary_button = get_field('primary_button');
    $secondary_button = get_field('secondary_button');
    $hero_image = get_field('hero_image');
}
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="lucent-hero__container">
            <div class="lucent-hero__content">
                <?php if ($eyebrow) : ?>
                    <div class="lucent-hero__eyebrow">
                        <?php echo esc_html($eyebrow); ?>
                        <span class="lucent-hero__eyebrow-line"></span>
                    </div>
                <?php endif; ?>

                <?php if ($heading) : ?>
                    <h1 class="lucent-hero__heading"><?php echo esc_html($heading); ?></h1>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="lucent-hero__description"><?php echo esc_html($description); ?></div>
                <?php endif; ?>

                <div class="lucent-hero__buttons">
                    <?php if ($primary_button) : ?>
                        <a href="<?php echo esc_url($primary_button['url']); ?>" class="lucent-hero__button lucent-hero__button--primary">
                            <?php echo esc_html($primary_button['title']); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($secondary_button) : ?>
                        <a href="<?php echo esc_url($secondary_button['url']); ?>" class="lucent-hero__button lucent-hero__button--secondary">
                            <?php echo esc_html($secondary_button['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="lucent-hero__image">
                <?php if ($hero_image) : ?>
                    <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
                <?php endif; ?>
                <div class="lucent-hero__image-border"></div>
            </div>
        </div>
    </div>
</section>

<style>
.lucent-hero {
    padding: 80px 0;
    background-color: #fff;
    overflow: hidden;
}

.container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 32px;
    width: 100%;
}

.lucent-hero__container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 60px;
}

.lucent-hero__content {
    flex: 1;
    max-width: 600px;
}

.lucent-hero__eyebrow {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 24px;
    color: #000000;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.lucent-hero__eyebrow-line {
    display: block;
    width: 40px;
    height: 2px;
    background-color: #1976E6;
}

.lucent-hero__heading {
    color: #00263A;
    font-size: 48px;
    font-weight: 600;
    line-height: 1.2;
    margin: 0 0 24px;
}

.lucent-hero__description {
    color: #000000;
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 32px;
    font-weight: 700;
}

.lucent-hero__buttons {
    display: flex;
    gap: 16px;
}

.lucent-hero__button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 32px;
    border-radius: 32px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
}

.lucent-hero__button--primary {
    background-color: #1976E6;
    color: #fff;
}

.lucent-hero__button--primary:hover {
    background-color: #125bb5;
}

.lucent-hero__button--secondary {
    background-color: transparent;
    color: #00263A;
    border: 2px solid #E0E0E0;
}

.lucent-hero__button--secondary:hover {
    border-color: #1976E6;
}

.lucent-hero__image {
    flex: 1;
    max-width: 720px;
    position: relative;
}

.lucent-hero__image img {
    width: 100%;
    height: auto;
    border-radius: 300px 300px 0 300px;
    object-fit: cover;
}

.lucent-hero__image-border {
    position: absolute;
    top: -20px;
    right: -20px;
    bottom: 20px;
    left: 20px;
    border: 2px solid #7FFFD4;
    border-radius: 300px 300px 0 300px;
    z-index: -1;
}

@media (max-width: 1024px) {
    .lucent-hero__container {
        flex-direction: column;
        text-align: center;
    }

    .lucent-hero__content {
        max-width: 100%;
    }

    .lucent-hero__eyebrow {
        justify-content: center;
    }

    .lucent-hero__buttons {
        justify-content: center;
    }

    .lucent-hero__image {
        max-width: 100%;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 16px;
    }

    .lucent-hero {
        padding: 60px 0;
    }

    .lucent-hero__heading {
        font-size: 36px;
    }

    .lucent-hero__description {
        font-size: 16px;
    }

    .lucent-hero__buttons {
        flex-direction: column;
        gap: 12px;
    }

    .lucent-hero__button {
        width: 100%;
    }
}

/* Editor and Preview Styles */
.block-editor-block-list__layout .lucent-hero,
.lucent-hero {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}
</style> 