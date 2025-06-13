<?php
/**
 * Block Name: Lucent Related News
 * Description: A block to display related news items in a grid
 * Category: lucent
 * Icon: grid-view
 * Keywords: related, news, grid
 * Supports: { "align": true, "anchor": true }
 */

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-related-news-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values
$className = 'lucent-related-news';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults
$title = get_field('title') ?: 'Related news';
$news_items = get_field('news_items');

// Set default news items for preview
if (empty($news_items) && !empty($block['data']['is_preview'])) {
    $news_items = array(
        array(
            'title' => 'Quanterix Launches High Accuracy p-Tau 217 Blood Biomarker Test to Aid Physician Diagnosis of Alzheimer\'s Disease',
            'link' => '#'
        ),
        array(
            'title' => 'Quanterix Launches High Accuracy p-Tau 217 Blood Biomarker Test to Aid Physician Diagnosis of Alzheimer\'s Disease',
            'link' => '#'
        ),
        array(
            'title' => 'Quanterix Launches High Accuracy p-Tau 217 Blood Biomarker Test to Aid Physician Diagnosis of Alzheimer\'s Disease',
            'link' => '#'
        )
    );
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="lucent-related-news__container">
        <?php if ($title) : ?>
            <div class="lucent-related-news__header">
                <div class="lucent-related-news__title-line"></div>
                <h2 class="lucent-related-news__title">
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>

        <?php if ($news_items) : ?>
            <div class="lucent-related-news__grid">
                <?php foreach ($news_items as $item) : ?>
                    <div class="lucent-related-news__item">
                        <h3 class="lucent-related-news__item-title">
                            <?php echo esc_html($item['title']); ?>
                        </h3>
                        <a href="<?php echo esc_url($item['link']); ?>" class="lucent-related-news__read-more">
                            Read now
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <style>
        .lucent-related-news {
            margin: 60px 0;
        }

        .lucent-related-news__container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .lucent-related-news__header {
            margin-bottom: 40px;
        }

        .lucent-related-news__title {
            font-size: 32px;
            font-weight: 400;
            color: #000;
            margin: 16px 0 0 0;
        }

        .lucent-related-news__title-line {
            width: 75px;
            height: 2px;
            background-color: #0066CC;
            margin: 0;
        }

        .lucent-related-news__grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .lucent-related-news__item {
            background: #F8F9FA;
            border-radius: 12px;
            padding: 32px;
            display: flex;
            flex-direction: column;
            min-height: 240px;
        }

        .lucent-related-news__item-title {
            font-size: 20px;
            line-height: 1.4;
            font-weight: 600;
            color: #000;
            margin: 0 0 auto 0;
        }

        .lucent-related-news__read-more {
            display: inline-block;
            margin-top: 24px;
            color: #000000;
            font-weight: 900;
            text-decoration: none;
            font-size: 16px;
        }

        .lucent-related-news__read-more:hover {
            text-decoration: underline;
        }

        @media (max-width: 991px) {
            .lucent-related-news__grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 767px) {
            .lucent-related-news {
                margin: 40px 0;
            }

            .lucent-related-news__grid {
                grid-template-columns: 1fr;
            }

            .lucent-related-news__item {
                padding: 24px;
                min-height: auto;
            }

            .lucent-related-news__title {
                font-size: 28px;
            }

            .lucent-related-news__item-title {
                font-size: 18px;
            }
        }
    </style>
</div> 