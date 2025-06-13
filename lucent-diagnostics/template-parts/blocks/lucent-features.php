<?php
/**
 * Block Name: Lucent Features
 */

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-features-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values
$class_name = 'lucent-features';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Get fields
$features = get_field('features');

// For preview
$is_preview = isset($block['data']['is_preview']) ? $block['data']['is_preview'] : false;
if ($is_preview) {
    $features = array(
        array(
            'icon' => '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 36C30.6274 36 36 30.6274 36 24C36 17.3726 30.6274 12 24 12C17.3726 12 12 17.3726 12 24C12 30.6274 17.3726 36 24 36Z" stroke="#1976E6" stroke-width="2"/>
                <path d="M24 20V28M20 24H28" stroke="#1976E6" stroke-width="2" stroke-linecap="round"/>
                <path d="M32 8L36 4M16 40L12 44M40 32L44 36M8 16L4 12M36 32L32 36M12 12L8 8M44 12L40 16M16 8L20 4" stroke="#1976E6" stroke-width="2" stroke-linecap="round"/>
            </svg>',
            'title' => 'Earlier disease detection & diagnosis',
            'description' => ''
        ),
        array(
            'icon' => '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28 12H12C10.8954 12 10 12.8954 10 14V38C10 39.1046 10.8954 40 12 40H36C37.1046 40 38 39.1046 38 38V22" stroke="#1976E6" stroke-width="2" stroke-linecap="round"/>
                <path d="M36 8L40 12L28 24H24V20L36 8Z" stroke="#1976E6" stroke-width="2" stroke-linejoin="round"/>
                <path d="M16 28H32M16 34H24" stroke="#1976E6" stroke-width="2" stroke-linecap="round"/>
            </svg>',
            'title' => 'Treatment planning',
            'description' => ''
        ),
        array(
            'icon' => '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 44C35.0457 44 44 35.0457 44 24C44 12.9543 35.0457 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44Z" stroke="#1976E6" stroke-width="2"/>
                <path d="M24 12V24L32 28" stroke="#1976E6" stroke-width="2" stroke-linecap="round"/>
            </svg>',
            'title' => 'Improved patient outcomes',
            'description' => ''
        )
    );
}
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <?php if ($features) : ?>
            <div class="lucent-features__grid">
                <?php foreach ($features as $feature) : ?>
                    <div class="lucent-features__item">
                        <?php if ($feature['icon']) : ?>
                            <div class="lucent-features__icon">
                                <?php 
                                if (is_array($feature['icon'])) {
                                    echo wp_get_attachment_image($feature['icon']['ID'], 'full');
                                } else {
                                    echo str_replace('width="80" height="80"', 'width="160" height="160"', $feature['icon']); 
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                        <div class="lucent-features__line"></div>

                        <?php if ($feature['title']) : ?>
                            <h3 class="lucent-features__title"><?php echo esc_html($feature['title']); ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($feature['description'])) : ?>
                            <div class="lucent-features__description"><?php echo esc_html($feature['description']); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.lucent-features {
    padding: 80px 0;
    background-color: #fff;
}

.container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 32px;
    width: 100%;
}

.lucent-features__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 80px;
    max-width: 1200px;
    margin: 0 auto;
}

.lucent-features__item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.lucent-features__icon {
    margin-bottom: 15px;
    width: 160px;
    height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.lucent-features__icon svg {
    width: 100%;
    height: 100%;
    stroke: #1976E6;
}

.lucent-features__icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.lucent-features__line {
    width: 40px;
    height: 1px;
    background-color: #D9D9D9;
    margin: 0 0 15px;
}

.lucent-features__title {
    color: #000000;
    font-size: 24px;
    font-weight: 600;
    line-height: 1.3;
    margin: 0;
    max-width: 280px;
}

.lucent-features__description {
    color: #1F2937;
    font-size: 16px;
    line-height: 1.6;
    margin-top: 16px;
    font-weight: 700;
}

@media (max-width: 1024px) {
    .lucent-features__grid {
        gap: 40px;
    }

    .lucent-features__icon {
        width: 140px;
        height: 140px;
        margin-bottom: 15px;
    }

    .lucent-features__title {
        font-size: 22px;
    }

    .lucent-features__description {
        font-size: 16px;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 16px;
    }

    .lucent-features__grid {
        grid-template-columns: 1fr;
        gap: 48px;
    }

    .lucent-features__item {
        max-width: 400px;
        margin: 0 auto;
    }

    .lucent-features__icon {
        width: 120px;
        height: 120px;
        margin-bottom: 15px;
    }

    .lucent-features__title {
        font-size: 20px;
    }

    .lucent-features__description {
        font-size: 16px;
    }
}

/* Editor and Preview Styles */
.block-editor-block-list__layout .lucent-features,
.lucent-features {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}
</style> 