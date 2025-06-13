<?php
/**
 * Block Name: Lucent Featured Content
 * Description: Featured content block with title, description, and background image with navigation.
 */

// Get block values
$eyebrow = get_field('eyebrow');
$title = get_field('title');
$description = get_field('description');
$background = get_field('background');
$read_more_link = get_field('read_more_link');

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-featured-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className"
$class_name = 'lucent-featured';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Check if it's preview mode in the editor
$is_preview = isset($block['data']['is_preview']) ? $block['data']['is_preview'] : false;
if ($is_preview) {
    $eyebrow = 'FEATURED';
    $title = 'Lorem ipsum dolor sit amet consectetur. Mi proin sem condimentum.';
    $description = 'Lorem ipsum dolor sit amet consectetur. Nunc ac libero arcu pulvinar ipsum mauris nisi. In nullam diam scelerisque aliquet dictum retium ipsum.';
    $read_more_link = '#';
    $background = array(
        'url' => get_template_directory_uri() . '/assets/images/placeholder-bg.jpg',
        'alt' => 'Placeholder background'
    );
}

// Background style
$background_style = $background ? ' style="background-image: url(' . esc_url($background['url']) . ');"' : '';
?>

<div class="lucent-featured-wrapper">
    <button class="lucent-featured__nav lucent-featured__nav--prev" aria-label="Previous slide">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="currentColor">
            <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
        </svg>
    </button>

    <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
        <div class="lucent-featured__content">
            <?php if ($eyebrow) : ?>
                <div class="lucent-featured__eyebrow">
                    <?php echo esc_html($eyebrow); ?>
                </div>
            <?php endif; ?>

            <?php if ($title) : ?>
                <h2 class="lucent-featured__title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="lucent-featured__description">
                    <?php echo esc_html($description); ?>
                </div>
            <?php endif; ?>

            <?php if ($read_more_link) : ?>
                <a href="<?php echo esc_url($read_more_link); ?>" class="lucent-featured__read-more">
                    Read now
                </a>
            <?php endif; ?>
        </div>

        <div class="lucent-featured__image"<?php echo $background_style; ?>></div>
    </section>

    <button class="lucent-featured__nav lucent-featured__nav--next" aria-label="Next slide">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="currentColor">
            <path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/>
        </svg>
    </button>
</div>

<style>
.lucent-featured-wrapper {
    padding: 0 30px;
    margin: 32px auto;
    max-width: 1280px;
    position: relative;
    display: flex;
    align-items: center;
    gap: 24px;
}

.lucent-featured {
    position: relative;
    width: 100%;
    min-height: 480px;
    background: #F2F6FA;
    border-radius: 24px;
    overflow: hidden;
    display: flex;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.lucent-featured__content {
    width: 50%;
    padding: 64px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: #F2F6FA;
}

.lucent-featured__image {
    width: 50%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.lucent-featured__eyebrow {
    display: inline-flex;
    align-items: center;
    font-size: 17px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 24px;
    color: #01303F;
    padding: 0;
}

.lucent-featured__title {
    font-size: 43px;
    font-weight: 700;
    line-height: 1.2;
    margin: 0 0 24px;
    color: #0F172A;
    letter-spacing: -0.02em;
    word-break: break-word;
}

.lucent-featured__description {
    font-size: 19px;
    line-height: 1.6;
    color: #000000;
    margin-bottom: 32px;
    word-break: break-word;
}

.lucent-featured__read-more {
    display: inline-flex;
    align-items: center;
    padding: 0;
    color: #01303F;
    font-weight: 800;
    font-size: 16px;
    text-decoration: none;
    transition: color 0.3s ease;
    width: fit-content;
}

.lucent-featured__read-more:hover {
    color: #01303F;
}

.lucent-featured__nav {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #FFFFFF;
    border: 1px solid #E2E8F0;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1E293B;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    z-index: 2;
    flex-shrink: 0;
}

.lucent-featured__nav:hover {
    background: #F8FAFC;
    color: #1E293B;
    border-color: #CBD5E1;
}

@media (max-width: 1400px) {
    .lucent-featured-wrapper {
        max-width: 1080px;
    }

    .lucent-featured {
        min-height: 460px;
    }

    .lucent-featured__content {
        padding: 56px;
    }

    .lucent-featured__title {
        font-size: 38px;
    }
}

@media (max-width: 1024px) {
    .lucent-featured-wrapper {
        max-width: 900px;
    }

    .lucent-featured {
        min-height: 420px;
    }

    .lucent-featured__content {
        padding: 48px;
    }

    .lucent-featured__title {
        font-size: 34px;
    }

    .lucent-featured__description {
        font-size: 17px;
    }
}

@media (max-width: 768px) {
    .lucent-featured-wrapper {
        padding: 0 16px;
        gap: 16px;
    }

    .lucent-featured {
        flex-direction: column;
        min-height: auto;
    }

    .lucent-featured__content {
        width: 100%;
        padding: 40px 24px;
        order: 2;
    }

    .lucent-featured__image {
        width: 100%;
        height: 320px;
        order: 1;
    }

    .lucent-featured__title {
        font-size: 32px;
    }

    .lucent-featured__description {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .lucent-featured-wrapper {
        padding: 0 12px;
        gap: 12px;
    }

    .lucent-featured__content {
        padding: 32px 20px;
    }

    .lucent-featured__title {
        font-size: 28px;
    }

    .lucent-featured__image {
        height: 280px;
    }
}
</style> 