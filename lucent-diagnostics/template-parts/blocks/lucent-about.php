<?php
/**
 * Block Name: Lucent About
 * Description: A custom block for displaying about us section with video
 */

// Get field values
$headline = get_field('headline');
$description = get_field('description');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
$video_thumbnail = get_field('video_thumbnail');
$video_url = get_field('video_url');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'lucent-about';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Preview mode
if (!empty($block['data']['is_preview'])) {
    $headline = "About Us Headline";
    $description = "With more than a decade of proven success within the neurology research space, supported by thousands of publications and partnerships, Lucent Diagnostics directly impacts the landscape of cognitive disease.";
    $button_text = "Learn more";
    $button_link = "#";
    $video_thumbnail = get_template_directory_uri() . '/assets/images/placeholder-video.jpg';
    $video_url = "#";
}

// Render block
?>
<div class="<?php echo esc_attr($class_name); ?>">
    <div class="lucent-about__container">
        <div class="lucent-about__content">
            <div class="lucent-about__text">
                <div class="lucent-about__line"></div>
                <h2 class="lucent-about__headline"><?php echo esc_html($headline); ?></h2>
                <p class="lucent-about__description"><?php echo esc_html($description); ?></p>
                <?php if ($button_text && $button_link) : ?>
                    <a href="<?php echo esc_url($button_link); ?>" class="lucent-about__button">
                        <?php echo esc_html($button_text); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="lucent-about__video">
                <?php if ($video_thumbnail && $video_url) : ?>
                    <div class="lucent-about__video-wrapper">
                        <img src="<?php echo esc_url($video_thumbnail); ?>" alt="Video thumbnail" class="lucent-about__video-thumbnail">
                        <a href="<?php echo esc_url($video_url); ?>" class="lucent-about__video-play" aria-label="Play video">
                            <span class="lucent-about__video-play-icon">▶</span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
/* Editor and Preview Styles */
.block-editor-block-list__layout .lucent-about,
.lucent-about {
    padding: 80px 20px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}

.lucent-about__container {
    max-width: 1400px;
    margin: 0 auto;
}

.lucent-about__content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.lucent-about__line {
    width: 60px;
    height: 2px;
    background-color: #1e73be;
    margin-bottom: 24px;
}

.lucent-about__headline {
    font-size: 40px;
    font-weight: 700;
    color: #000000;
    margin: 0 0 24px;
}

.lucent-about__description {
    font-size: 18px;
    line-height: 1.6;
    color: #000000;
    margin: 0 0 32px;
    font-weight: 700;
}

.lucent-about__button {
    display: inline-block;
    padding: 16px 32px;
    background-color: #1e73be;
    color: #ffffff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.lucent-about__button:hover {
    background-color: #1557a0;
}

.lucent-about__video-wrapper {
    position: relative;
    border-radius: 50%;
    overflow: hidden;
    aspect-ratio: 1;
}

.lucent-about__video-thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.lucent-about__video-play {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80px;
    height: 80px;
    background-color: #1e73be;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: transform 0.3s ease;
}

.lucent-about__video-play:hover {
    transform: translate(-50%, -50%) scale(1.1);
}

.lucent-about__video-play-icon {
    color: #ffffff;
    font-size: 32px;
    margin-left: 6px;
}

@media (max-width: 768px) {
    .lucent-about {
        padding: 40px 20px;
    }

    .lucent-about__content {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .lucent-about__headline {
        font-size: 32px;
    }

    .lucent-about__description {
        font-size: 16px;
    }

    .lucent-about__video-play {
        width: 60px;
        height: 60px;
    }

    .lucent-about__video-play-icon {
        font-size: 24px;
    }
}
</style> 