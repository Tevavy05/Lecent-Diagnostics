<?php
/**
 * Block Name: Lucent Contact
 * Description: A custom block for displaying contact section with background pattern
 */

// Get field values
$subtitle = get_field('subtitle');
$title = get_field('title');
$description = get_field('description');
$button_text = get_field('button_text');
$button_link = get_field('button_link');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'lucent-contact';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Preview mode
if (!empty($block['data']['is_preview'])) {
    $subtitle = "LET'S TALK";
    $title = "Get in touch";
    $description = "Delivering diagnostic advancements, powered by research and technology excellence";
    $button_text = "Contact us";
    $button_link = "#";
}

// Render block
?>
<div class="<?php echo esc_attr($class_name); ?>">
    <div class="lucent-contact__container">
        <div class="lucent-contact__content">
            <div class="lucent-contact__text">
                <?php if ($subtitle) : ?>
                    <div class="lucent-contact__subtitle">
                        <span class="lucent-contact__subtitle-line"></span>
                        <?php echo esc_html($subtitle); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($title) : ?>
                    <h2 class="lucent-contact__title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <p class="lucent-contact__description"><?php echo esc_html($description); ?></p>
                <?php endif; ?>

                <?php if ($button_text && $button_link) : ?>
                    <a href="<?php echo esc_url($button_link); ?>" class="lucent-contact__button">
                        <?php echo esc_html($button_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="lucent-contact__pattern"></div>
    </div>
</div>

<style>
/* Editor and Preview Styles */
.block-editor-block-list__layout .lucent-contact,
.lucent-contact {
    background-color: #0066CC;
    color: #ffffff;
    padding: 120px 20px;
    position: relative;
    overflow: hidden;
    border-radius: 24px;
    margin: 40px auto;
    max-width: 1440px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}

.lucent-contact__container {
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.lucent-contact__content {
    max-width: 600px;
    padding-left: 80px;
}

.lucent-contact__subtitle {
    display: flex;
    align-items: center;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 20px;
}

.lucent-contact__subtitle-line {
    width: 40px;
    height: 2px;
    background-color: #ffffff;
    margin-right: 15px;
}

.lucent-contact__title {
    font-size: 48px;
    font-weight: 600;
    margin: 0 0 24px;
    line-height: 1.2;
}

.lucent-contact__description {
    font-size: 20px;
    line-height: 1.6;
    margin: 0 0 32px;
    opacity: 0.9;
}

.lucent-contact__button {
    display: inline-block;
    padding: 16px 32px;
    background-color: #ffffff;
    color: #0066CC;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
}

.lucent-contact__button:hover {
    background-color: rgba(255, 255, 255, 0.9);
    transform: translateY(-2px);
}

.lucent-contact__pattern {
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background-image: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 100%);
    background-size: 40px 40px;
    opacity: 0.3;
    pointer-events: none;
}

@media (max-width: 768px) {
    .lucent-contact {
        padding: 80px 20px;
        margin: 20px auto;
        border-radius: 16px;
    }

    .lucent-contact__content {
        padding-left: 20px;
    }

    .lucent-contact__title {
        font-size: 36px;
    }

    .lucent-contact__description {
        font-size: 18px;
    }

    .lucent-contact__pattern {
        width: 100%;
        opacity: 0.2;
    }
}
</style> 