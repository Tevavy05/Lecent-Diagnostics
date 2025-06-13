<?php
/**
 * Block Name: Lucent Disclaimer
 * Description: A custom block for displaying disclaimer text
 */

// Get field values
$title = get_field('title');
$content = get_field('content');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'lucent-disclaimer';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Preview mode
if (!empty($block['data']['is_preview'])) {
    $title = "Disclaimer";
    $content = "The information provided on this website is for educational purposes only and should not be considered as medical advice. Please consult with your healthcare provider for personalized guidance and treatment options.";
}

// Render block
?>
<div class="<?php echo esc_attr($class_name); ?>">
    <div class="lucent-disclaimer__container">
        <div class="lucent-disclaimer__inner">
            <?php if ($title) : ?>
                <h3 class="lucent-disclaimer__title"><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
            
            <?php if ($content) : ?>
                <div class="lucent-disclaimer__content">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
/* Editor and Preview Styles */
.block-editor-block-list__layout .lucent-disclaimer,
.lucent-disclaimer {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}

.lucent-disclaimer__container {
    padding: 0;
    display: flex;
    justify-content: center;
}

.lucent-disclaimer__inner {
    max-width: 800px;
    width: 100%;
    text-align: left;
}

.lucent-disclaimer__title {
    color: #000000;
    font-size: 18px;
    font-weight: 700;
    margin: 0 0 8px;
    line-height: 1.4;
}

.lucent-disclaimer__content {
    color: #1F2937;
    font-size: 15px;
    line-height: 1.6;
    margin: 0;
    font-weight: 700;
}

.lucent-disclaimer__content p:last-child {
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .lucent-disclaimer__title {
        font-size: 16px;
        margin: 0 0 6px;
    }

    .lucent-disclaimer__content {
        font-size: 14px;
    }
}
</style> 