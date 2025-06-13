<?php
/**
 * Block Name: Lucent Products
 * Description: A custom block for displaying Lucent Diagnostics products
 */

// Get field values
$products = get_field('products');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'lucent-products';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Preview mode
if (!empty($block['data']['is_preview'])) {
    $products = array(
        array(
            'title' => 'LucentAD Complete™',
            'description' => 'Interdum nam facilisi bland tristique sed etiam non sem nam.',
            'image' => get_template_directory_uri() . '/assets/images/placeholder-product.jpg',
            'link' => '#'
        ),
        array(
            'title' => 'LucentAD p-Tau 217™',
            'description' => 'Interdum nam facilisi bland tristique sed etiam non sem nam.',
            'image' => get_template_directory_uri() . '/assets/images/placeholder-product.jpg',
            'link' => '#'
        )
    );
}

// Render block
?>
<div class="<?php echo esc_attr($class_name); ?>">
    <div class="lucent-products__container">
        <div class="lucent-products__grid">
            <?php if ($products) : ?>
                <?php foreach ($products as $product) : ?>
                    <a href="<?php echo esc_url($product['link']); ?>" class="lucent-products__item">
                        <div class="lucent-products__content">
                            <h3 class="lucent-products__title">
                                <?php echo esc_html($product['title']); ?>
                                <span class="lucent-products__arrow">›</span>
                            </h3>
                            <p class="lucent-products__description"><?php echo esc_html($product['description']); ?></p>
                        </div>
                        <?php if ($product['image']) : ?>
                            <div class="lucent-products__image">
                                <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['title']); ?>">
                            </div>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
/* Editor and Preview Styles */
.block-editor-block-list__layout .lucent-products,
.lucent-products {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}

.lucent-products {
    padding: 40px 20px;
}

.lucent-products__container {
    max-width: 1400px;
    margin: 0 auto;
}

.lucent-products__grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}

.lucent-products__item {
    background: #F8F9FC;
    border-radius: 16px;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
}

.lucent-products__item:hover {
    transform: translateY(-4px);
}

.lucent-products__content {
    padding: 32px;
}

.lucent-products__title {
    font-size: 24px;
    font-weight: 600;
    color: #1e73be;
    margin: 0 0 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.lucent-products__arrow {
    font-size: 28px;
    color: #1e73be;
}

.lucent-products__description {
    font-size: 16px;
    line-height: 1.5;
    margin: 0;
    color: #000000;
    font-weight: 700;
}

.lucent-products__image {
    width: 100%;
    height: 280px;
    overflow: hidden;
}

.lucent-products__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

@media (max-width: 768px) {
    .lucent-products {
        padding: 20px;
    }

    .lucent-products__grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .lucent-products__content {
        padding: 24px;
    }

    .lucent-products__title {
        font-size: 20px;
    }

    .lucent-products__image {
        height: 200px;
    }
}
</style> 