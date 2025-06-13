<?php
/**
 * Block Name: Lucent Testimonial
 * Description: A block to display testimonial with quote, author info and background image
 * Category: lucent
 * Icon: format-quote
 * Keywords: testimonial, quote, review
 * Supports: { "align": true, "anchor": true }
 */

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-testimonial-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values
$className = 'lucent-testimonial';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults
$quote = get_field('quote') ?: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam est odio, molestie sit amet elementum quis, consectetur sit amet nibh.';
$first_last_name = get_field('first_last_name') ?: 'First Last';
$title_company = get_field('title_company') ?: 'Title, Company Name';
$background_image = get_field('background_image');

// Get background image URL
$background_url = $background_image ? $background_image['url'] : '';

// Set default background for preview
if (empty($background_url) && !empty($block['data']['is_preview'])) {
    $background_url = get_template_directory_uri() . '/assets/images/placeholder-bg.jpg';
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="lucent-testimonial__container">
        <div class="lucent-testimonial__content">
            <?php if ($quote) : ?>
                <div class="lucent-testimonial__quote">
                    "<?php echo esc_html($quote); ?>"
                </div>
            <?php endif; ?>

            <div class="lucent-testimonial__author">
                <?php if ($first_last_name) : ?>
                    <div class="lucent-testimonial__name">
                        <?php echo esc_html($first_last_name); ?>
                    </div>
                <?php endif; ?>

                <?php if ($title_company) : ?>
                    <div class="lucent-testimonial__title">
                        <?php echo esc_html($title_company); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($background_url) : ?>
            <div class="lucent-testimonial__image">
                <img src="<?php echo esc_url($background_url); ?>" 
                     alt="<?php echo esc_attr($first_last_name); ?> testimonial background" 
                     class="lucent-testimonial__img" />
            </div>
        <?php endif; ?>
    </div>

    <style>
        .lucent-testimonial {
            margin: 40px auto;
            overflow: hidden;
            border-radius: 16px;
            max-width: 1200px;
        }

        .lucent-testimonial__container {
            display: flex;
            background: #0066CC;
            position: relative;
            min-height: 400px;
            width: 100%;
        }

        .lucent-testimonial__content {
            width: 50%;
            padding: 60px;
            color: #ffffff;
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-sizing: border-box;
        }

        .lucent-testimonial__quote {
            font-size: 24px;
            line-height: 1.4;
            font-weight: 500;
            margin-bottom: 32px;
            max-width: 480px;
        }

        .lucent-testimonial__author {
            margin-top: auto;
        }

        .lucent-testimonial__name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .lucent-testimonial__title {
            font-size: 14px;
            opacity: 0.8;
        }

        .lucent-testimonial__image {
            width: 50%;
            position: relative;
            overflow: hidden;
        }

        .lucent-testimonial__img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        @media (max-width: 768px) {
            .lucent-testimonial {
                margin: 20px 15px;
            }

            .lucent-testimonial__container {
                flex-direction: column;
                min-height: auto;
            }

            .lucent-testimonial__content {
                width: 100%;
                padding: 40px 24px;
            }

            .lucent-testimonial__image {
                width: 100%;
                height: 300px;
                order: -1;
            }

            .lucent-testimonial__quote {
                font-size: 20px;
                margin-bottom: 24px;
            }
        }
    </style>
</div> 