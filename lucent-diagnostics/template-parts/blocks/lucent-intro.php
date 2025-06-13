<?php
/**
 * Block Name: Lucent Intro
 * Description: A custom block for displaying intro section with text content
 */

// Get field values
$intro_text = get_field('intro_text');
$background_color = get_field('background_color');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'lucent-intro';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Preview mode
if (!empty($block['data']['is_preview'])) {
    $intro_text = "Using ultra-sensitive, multi-plex technology, Lucent Diagnostics delivers easily accessible, industry-leading products, like no other, giving clinicians non-invasive diagnostic tools that they can rely on.";
    $background_color = "#1e73be";
}

// Render block
?>
<div class="<?php echo esc_attr($class_name); ?>" style="background-color: <?php echo esc_attr($background_color); ?>">
    <div class="lucent-intro__container">
        <div class="lucent-intro__content">
            <p class="lucent-intro__text"><?php echo esc_html($intro_text); ?></p>
        </div>
    </div>
</div>

<style>
.lucent-intro {
    padding: 80px 20px;
    color: #ffffff;
    border-radius: 16px;
    margin: 40px auto;
    max-width: 1400px;
}

.lucent-intro__container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 40px;
}

.lucent-intro__content {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.lucent-intro__text {
    font-size: 28px;
    line-height: 1.5;
    margin: 0;
    font-weight: 700;
}

@media (max-width: 768px) {
    .lucent-intro {
        padding: 60px 20px;
        margin: 20px auto;
        border-radius: 12px;
    }
    
    .lucent-intro__container {
        padding: 0 20px;
    }
    
    .lucent-intro__text {
        font-size: 22px;
    }
}

/* Editor and Preview Styles */
.block-editor-block-list__layout .lucent-intro,
.lucent-intro {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}
</style> 