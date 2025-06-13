<?php
/**
 * Block Name: Lucent News Grid
 * Description: Display news items in a responsive grid layout.
 */

// Debug information
if (WP_DEBUG) {
    error_log('Lucent News Grid Block - Debug Info:');
    error_log('Block data: ' . print_r($block, true));
    error_log('ACF fields: ' . print_r(get_fields(), true));
}

// Get block values
$news_items = get_field('news_items');

// Debug news items
if (WP_DEBUG) {
    error_log('News Items: ' . print_r($news_items, true));
}

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-news-grid-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className"
$class_name = 'lucent-news-grid';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Check if it's preview mode in the editor
$is_preview = isset($block['data']['is_preview']) ? $block['data']['is_preview'] : false;

// Always show preview content if no items are set
if ($is_preview || empty($news_items)) {
    $news_items = array(
        array(
            'title' => "Quanterix Launches High Accuracy p-Tau 217 Blood Biomarker Test to Aid Physician Diagnosis of Alzheimer's Disease",
            'link' => '#'
        ),
        array(
            'title' => "Quanterix Launches High Accuracy p-Tau 217 Blood Biomarker Test to Aid Physician Diagnosis of Alzheimer's Disease",
            'link' => '#'
        ),
        array(
            'title' => "Quanterix Launches High Accuracy p-Tau 217 Blood Biomarker Test to Aid Physician Diagnosis of Alzheimer's Disease",
            'link' => '#'
        )
    );
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <?php if ($news_items) : ?>
        <div class="lucent-news-grid__container">
            <?php foreach ($news_items as $item) : ?>
                <div class="lucent-news-grid__item">
                    <h3 class="lucent-news-grid__title">
                        <?php echo esc_html($item['title']); ?>
                    </h3>
                    <a href="<?php echo esc_url($item['link']); ?>" class="lucent-news-grid__read-more">
                        Read now
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="lucent-news-grid__empty">
            <p>Please add some news items to display.</p>
        </div>
    <?php endif; ?>
</div>

<style>
.lucent-news-grid {
    margin: 32px 0;
    width: 100%;
    padding: 0;
}

.lucent-news-grid__container {
    max-width: 1920px;
    margin: 0 auto;
    padding: 0 95px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.lucent-news-grid__item {
    background: #F8FAFC;
    border-radius: 24px;
    padding: 32px;
    display: flex;
    flex-direction: column;
    min-height: 280px;
    justify-content: flex-start;
    gap: 16px;
    transition: transform 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.lucent-news-grid__item:hover {
    transform: translateY(-4px);
}

.lucent-news-grid__title {
    font-size: 25px;
    font-weight: 400;
    line-height: 1.2;
    margin: 0 0 2px;
    color: #0F172A;
    letter-spacing: -0.02em;
    word-break: break-word;
}

.lucent-news-grid__read-more {
    display: inline-flex;
    align-items: center;
    padding: 0;
    color: #01303F;
    font-weight: 900;
    font-size: 14px;
    text-decoration: none;
    transition: color 0.3s ease;
    width: fit-content;
    margin-top: 0;
}

.lucent-news-grid__read-more:hover {
    color: #01303F;
}

.lucent-news-grid__empty {
    text-align: center;
    padding: 40px;
    background: #F8FAFC;
    border-radius: 16px;
}

@media (max-width: 1400px) {
    .lucent-news-grid {
        margin: 24px 0;
    }

    .lucent-news-grid__container {
        max-width: 100%;
    }

    .lucent-news-grid__item {
        min-height: 260px;
        padding: 28px;
    }

    .lucent-news-grid__title {
        font-size: 21px;
    }
}

@media (max-width: 1024px) {
    .lucent-news-grid {
        max-width: 900px;
    }

    .lucent-news-grid__container {
        grid-template-columns: repeat(2, 1fr);
    }

    .lucent-news-grid__item {
        min-height: 240px;
        padding: 24px;
    }

    .lucent-news-grid__title {
        font-size: 17px;
    }
}

@media (max-width: 768px) {
    .lucent-news-grid__container {
        padding: 0 65px;
        grid-template-columns: 1fr;
    }

    .lucent-news-grid__item {
        padding: 20px;
        min-height: 200px;
    }

    .lucent-news-grid__title {
        font-size: 21px;
    }
}
</style> 