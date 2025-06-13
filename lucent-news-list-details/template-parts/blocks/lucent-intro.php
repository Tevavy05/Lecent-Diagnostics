<?php
/**
 * Block Name: Lucent Intro
 * Description: A block to display intro section with title, description and image.
 * Category: lucent
 * Icon: admin-customizer
 * Keywords: intro, banner, heading
 * Supports: { "align": true, "anchor": true }
 */

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-intro-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values
$className = 'lucent-intro';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults
$eyebrow = get_field('eyebrow') ?: 'EYEBROW LOREM';
$title = get_field('title') ?: 'Lorem ipsum dolor sit amet consectetur';
$description = get_field('description') ?: 'Lorem ipsum dolor sit amet consectetur. Interdum nam facilisi blandit tristique sed etiam non sem nam.';
$image = get_field('image');
$background_color = get_field('background_color') ?: '#0066CC';
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="lucent-intro__background" style="background-color: <?php echo esc_attr($background_color); ?>;">
        <div class="container">
            <div class="lucent-intro__content">
                <?php if ($eyebrow) : ?>
                    <div class="lucent-intro__eyebrow">
                        <?php echo esc_html($eyebrow); ?>
                    </div>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="lucent-intro__title">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="lucent-intro__description">
                        <?php echo esc_html($description); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ($image) : ?>
        <div class="lucent-intro__image-wrapper">
            <div class="lucent-intro__image">
                <img src="<?php echo esc_url($image['url']); ?>" 
                     alt="<?php echo esc_attr($image['alt']); ?>" 
                     class="lucent-intro__img" />
            </div>
        </div>
    <?php endif; ?>

    <style>
        .lucent-intro {
            margin: 20px 0;
            position: relative;
            padding: 0 25px;
        }

        .lucent-intro__background {
            padding: 80px 0 160px;
            color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: center;
        }

        .lucent-intro__content {
            max-width: 800px;
            text-align: left;
            padding-top: 40px;
            position: relative;
            z-index: 1;
            margin: 0;
        }

        .lucent-intro__eyebrow {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .lucent-intro__eyebrow:after {
            content: '';
            display: block;
            width: 24px;
            height: 2px;
            background: currentColor;
        }

        .lucent-intro__title {
            font-size: 48px;
            line-height: 1.2;
            margin-bottom: 24px;
            font-weight: 700;
        }

        .lucent-intro__description {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 40px;
            max-width: 600px;
        }

        .lucent-intro__image-wrapper {
            position: relative;
            margin-top: -120px;
            z-index: 2;
        }

        .lucent-intro__image {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .lucent-intro__img {
            width: 100%;
            height: auto;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .lucent-intro__background {
                padding: 60px 0 140px;
            }

            .lucent-intro__image-wrapper {
                margin-top: -80px;
            }

            .lucent-intro__title {
                font-size: 36px;
            }

            .lucent-intro__description {
                font-size: 16px;
            }

            .container {
                padding: 0 16px;
            }
        }
    </style>
</div> 