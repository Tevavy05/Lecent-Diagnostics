<?php
/**
 * Block Name: Lucent Resource Section
 * Description: A block to display resource section with headline and content
 * Category: lucent
 * Icon: text-page
 * Keywords: resource, content, section
 * Supports: { "align": true, "anchor": true }
 */

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-resource-section-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values
$className = 'lucent-resource-section';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults
$headline = get_field('headline') ?: 'Resource Section Headline';
$content_lines = get_field('content_lines');

// Set default content lines for preview
if (empty($content_lines) && !empty($block['data']['is_preview'])) {
    $content_lines = array(
        array('line' => 'Lorem ipsum dolor sit amet consectetur. Sit bibendum volutpat at eget nec quam nisi ut magnis.'),
        array('line' => 'Ac libero tristique dolor arcu odio. Tellus faucibus amet aliquet leo lobortis malesuada pulvinar.'),
        array('line' => 'Vitae mauris nunc hendrerit convallis pellentesque eget ut netus.')
    );
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="lucent-resource-section__container">
        <div class="lucent-resource-section__share">
            <button class="lucent-resource-section__share-button">
                <span>Share</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#0066CC">
                    <path d="M18 8C19.6569 8 21 6.65685 21 5C21 3.34315 19.6569 2 18 2C16.3431 2 15 3.34315 15 5C15 6.65685 16.3431 8 18 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 15C7.65685 15 9 13.6569 9 12C9 10.3431 7.65685 9 6 9C4.34315 9 3 10.3431 3 12C3 13.6569 4.34315 15 6 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18 22C19.6569 22 21 20.6569 21 19C21 17.3431 19.6569 16 18 16C16.3431 16 15 17.3431 15 19C15 20.6569 16.3431 22 18 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.59 13.51L15.42 17.49" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15.41 6.51L8.59 10.49" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>

        <div class="lucent-resource-section__content">
            <?php if ($headline) : ?>
                <h2 class="lucent-resource-section__headline">
                    <?php echo esc_html($headline); ?>
                </h2>
            <?php endif; ?>

            <?php if ($content_lines) : ?>
                <div class="lucent-resource-section__text">
                    <?php foreach ($content_lines as $line) : ?>
                        <p><?php echo esc_html($line['line']); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <style>
        .lucent-resource-section {
            margin: 40px auto;
            width: 100%;
        }

        .lucent-resource-section__container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
        }

        .lucent-resource-section__share {
            position: absolute;
            left: 160px;
            top: 8px;
        }

        .lucent-resource-section__share-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            padding: 12px;
            background: none;
            border: 1px solid #E5E7EB;
            border-radius: 4px;
            cursor: pointer;
            color: #666;
            font-size: 14px;
            transition: all 0.3s ease;
            min-width: 80px;
        }

        .lucent-resource-section__share-button:hover {
            color: #000;
            border-color: #000;
        }

        .lucent-resource-section__share-button svg {
            width: 20px;
            height: 35px;
        }

        .lucent-resource-section__content {
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            padding-left: 100px;
        }

        .lucent-resource-section__headline {
            font-size: 32px;
            line-height: 1.2;
            font-weight: 700;
            color: #000;
            margin: 0 0 24px 0;
            text-align: left;
        }

        .lucent-resource-section__text {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        .lucent-resource-section__text p {
            margin-bottom: 16px;
        }

        .lucent-resource-section__text p:last-child {
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .lucent-resource-section__container {
                padding: 0 16px;
            }

            .lucent-resource-section__share {
                position: static;
                margin-bottom: 16px;
            }

            .lucent-resource-section__content {
                padding-left: 0;
            }

            .lucent-resource-section__headline {
                font-size: 28px;
            }
        }
    </style>
</div> 
</div> 