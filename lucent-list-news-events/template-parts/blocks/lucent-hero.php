<?php
/**
 * Block Name: Lucent Hero
 * Description: Hero section block with background image, eyebrow text, title and description.
 */

// Get block values
$eyebrow = get_field('eyebrow');
$title = get_field('title');
$description = get_field('description');
$background = get_field('background');

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-hero-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className"
$class_name = 'lucent-hero';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Check if it's preview mode in the editor
$is_preview = isset($block['data']['is_preview']) ? $block['data']['is_preview'] : false;
if ($is_preview) {
    $eyebrow = 'EYEBROW LOREM';
    $title = 'New';
    $description = 'Lorem ipsum dolor sit amet consectetur. Interdum nam facilisi blandit tristique sed etiam non sem nam.';
    $background = array(
        'url' => get_template_directory_uri() . '/assets/images/placeholder-bg.jpg',
        'alt' => 'Placeholder background'
    );
}

// Background style
$background_style = $background ? ' style="background-image: url(' . esc_url($background['url']) . ');"' : '';
?>

<div class="lucent-hero-wrapper">
    <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>"<?php echo $background_style; ?>>
        <div class="lucent-hero__overlay"></div>
        <div class="lucent-hero__container">
            <div class="lucent-hero__content">
                <?php if ($eyebrow) : ?>
                    <div class="lucent-hero__eyebrow">
                        <?php echo esc_html($eyebrow); ?> <span class="lucent-hero__eyebrow-line"></span>
                    </div>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h1 class="lucent-hero__title">
                        <?php echo esc_html($title); ?>
                    </h1>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="lucent-hero__description">
                        <?php echo esc_html($description); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<style>
.lucent-hero-wrapper {
    padding: 0 30px;
    margin: 32px 0;
}

.lucent-hero {
    position: relative;
    width: 100%;
    min-height: 400px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 24px;
    overflow: hidden;
}

.lucent-hero__overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(29, 78, 216, 0.95) 0%, rgba(29, 78, 216, 0.85) 100%);
}

.lucent-hero__container {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 64px 48px;
    height: 100%;
    display: flex;
    align-items: center;
}

.lucent-hero__content {
    max-width: 700px;
    color: #fff;
}

.lucent-hero__eyebrow {
    display: flex;
    align-items: center;
    gap: 16px;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 24px;
    color: #fff;
}

.lucent-hero__eyebrow-line {
    display: inline-block;
    width: 32px;
    height: 2px;
    background-color: #fff;
}

.lucent-hero__title {
    font-size: 64px;
    font-weight: 700;
    line-height: 1.1;
    margin: 0 0 24px;
    color: #fff;
}

.lucent-hero__description {
    font-size: 20px;
    line-height: 1.6;
    color: #fff;
    opacity: 0.95;
    max-width: 600px;
}

@media (max-width: 768px) {
    .lucent-hero {
        min-height: 350px;
        border-radius: 16px;
        margin: 24px 0;
    }

    .lucent-hero__container {
        padding: 48px 24px;
    }

    .lucent-hero__eyebrow {
        font-size: 12px;
        margin-bottom: 16px;
    }

    .lucent-hero__eyebrow-line {
        width: 24px;
    }

    .lucent-hero__title {
        font-size: 48px;
        margin-bottom: 16px;
    }

    .lucent-hero__description {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .lucent-hero-wrapper {
        padding: 0 16px;
    }

    .lucent-hero__container {
        padding: 32px 20px;
    }

    .lucent-hero__title {
        font-size: 36px;
    }
}
</style> 