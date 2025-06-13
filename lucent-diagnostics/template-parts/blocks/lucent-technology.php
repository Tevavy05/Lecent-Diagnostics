<?php
/**
 * Block Name: Lucent Technology
 */

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-technology-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values
$class_name = 'lucent-technology';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Get fields
$eyebrow = get_field('eyebrow');
$heading = get_field('heading');
$description = get_field('description');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
$image = get_field('image');
$badge = get_field('badge');

// For preview
$is_preview = isset($block['data']['is_preview']) ? $block['data']['is_preview'] : false;
if ($is_preview) {
    $eyebrow = '';
    $heading = 'Powered by ultra-sensitive Simoa technology';
    $description = 'With more than a decade of proven success within the neurology research space, supported by thousands of publications and partnerships, Lucent Diagnostics directly impacts the landscape of cognitive disease.';
    $button_text = 'How it works';
    $button_link = '#';
    $image = array(
        'url' => get_template_directory_uri() . '/assets/images/technology-placeholder.jpg',
        'alt' => 'Technology Image'
    );
    $badge = array(
        'url' => get_template_directory_uri() . '/assets/images/simoa-badge.png',
        'alt' => 'Simoa Technology Badge'
    );
}
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="lucent-technology__container">
            <div class="lucent-technology__image-wrapper">
                <?php if ($image) : ?>
                    <div class="lucent-technology__image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                <?php endif; ?>
                
                <?php if ($badge) : ?>
                    <div class="lucent-technology__badge">
                        <img src="<?php echo esc_url($badge['url']); ?>" alt="<?php echo esc_attr($badge['alt']); ?>">
                    </div>
                <?php endif; ?>
            </div>

            <div class="lucent-technology__content">
                <?php if ($eyebrow) : ?>
                    <div class="lucent-technology__eyebrow">
                        <?php echo esc_html($eyebrow); ?>
                        <span class="lucent-technology__eyebrow-line"></span>
                    </div>
                <?php endif; ?>

                <?php if ($heading) : ?>
                    <h2 class="lucent-technology__heading"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="lucent-technology__description"><?php echo esc_html($description); ?></div>
                <?php endif; ?>

                <?php if ($button_text && $button_link) : ?>
                    <div class="lucent-technology__button-wrapper">
                        <a href="<?php echo esc_url($button_link); ?>" class="lucent-technology__button">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<style>
.lucent-technology {
    padding: 80px 0;
    background-color: rgba(242,246,250,255);
}

.container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 32px;
    width: 100%;
}

.lucent-technology__container {
    display: flex;
    align-items: center;
    gap: 80px;
}

.lucent-technology__image-wrapper {
    flex: 1;
    position: relative;
}

.lucent-technology__image {
    width: 100%;
    border-radius: 24px;
    overflow: hidden;
}

.lucent-technology__image img {
    width: 100%;
    height: auto;
    display: block;
}

.lucent-technology__badge {
    position: absolute;
    bottom: -30px;
    left: -30px;
    width: 120px;
    height: 120px;
    z-index: 2;
}

.lucent-technology__badge img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.lucent-technology__content {
    flex: 1;
    max-width: 600px;
}

.lucent-technology__eyebrow {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 24px;
    color: #00263A;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    position: relative;
    padding-top: 8px;
}

.lucent-technology__eyebrow-line {
    position: absolute;
    top: 0;
    left: 0;
    width: 80px;
    height: 2px;
    background-color: #7FFFD4;
}

.lucent-technology__heading {
    font-size: 40px;
    font-weight: 600;
    line-height: 1.2;
    color: #00263A;
    margin: 0 0 24px;
}

.lucent-technology__description {
    font-size: 18px;
    line-height: 1.6;
    color: #000000;
    margin-bottom: 32px;
    font-weight: 700;
}

.lucent-technology__button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 32px;
    background-color: #1976E6;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
    border-radius: 32px;
    transition: background-color 0.2s ease;
}

.lucent-technology__button:hover {
    background-color: #125bb5;
}

@media (max-width: 1024px) {
    .lucent-technology {
        padding: 60px 0;
    }

    .lucent-technology__container {
        gap: 40px;
    }

    .lucent-technology__heading {
        font-size: 36px;
    }

    .lucent-technology__badge {
        width: 100px;
        height: 100px;
        bottom: -20px;
        left: -20px;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 16px;
    }

    .lucent-technology__container {
        flex-direction: column;
        text-align: center;
    }

    .lucent-technology__content {
        max-width: 100%;
    }

    .lucent-technology__heading {
        font-size: 32px;
    }

    .lucent-technology__description {
        font-size: 16px;
    }

    .lucent-technology__badge {
        width: 80px;
        height: 80px;
        bottom: -15px;
        left: -15px;
    }

    .lucent-technology__eyebrow-line {
        display: none;
    }
}

/* Editor and Preview Styles */
.block-editor-block-list__layout .lucent-technology,
.lucent-technology {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}
</style> 