<?php
/**
 * Block Name: Lucent Footer
 * Description: A custom block for displaying the site footer
 */

// Get field values
$logo = get_field('logo');
$linkedin_url = get_field('linkedin_url');
$twitter_url = get_field('twitter_url');
$address = get_field('address');
$email = get_field('email');
$phone = get_field('phone');
$copyright_text = get_field('copyright_text');
$privacy_policy_link = get_field('privacy_policy_link');
$provider_agreement_link = get_field('provider_agreement_link');
$disclaimer_text = get_field('disclaimer_text');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'lucent-footer';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Preview mode
if (!empty($block['data']['is_preview'])) {
    $logo = get_template_directory_uri() . '/assets/images/logo-white.png';
    $linkedin_url = "#";
    $twitter_url = "#";
    $address = "900 Middlesex Turnpike<br>Billerica, MA 01821";
    $email = "inquiries@lucentdiagnostics.com";
    $phone = "978-488-1869";
    $copyright_text = "© 2024 Quanterix All Rights Reserved.";
    $privacy_policy_link = "#";
    $provider_agreement_link = "#";
    $disclaimer_text = "The LucentAD test was developed and validated by Quanterix Corporation (CLIA# 22D1053083) in a manner consistent with CLIA requirements. The test has not been cleared or approved by the U.S. Food and Drug Administration.";
}

// Menu items arrays
$product_menu = array(
    'title' => 'Product',
    'items' => array(
        'LucentAD Complete™' => '#',
        'LucentAD p-Tau 217™' => '#',
        'Test Send-Out Services' => '#'
    )
);

$company_menu = array(
    'title' => 'Company',
    'items' => array(
        'About Us' => '#',
        'News' => '#',
        'Provider Portal' => '#',
        'Contact Us' => '#'
    )
);

$contact_menu = array(
    'title' => 'Contact',
    'items' => array(
        $address,
        $email,
        $phone
    )
);

?>
<div class="<?php echo esc_attr($class_name); ?>">
    <div class="lucent-footer__container">
        <div class="lucent-footer__top">
            <div class="lucent-footer__logo-social">
                <?php if ($logo) : ?>
                    <img src="<?php echo esc_url($logo); ?>" alt="Lucent Diagnostics" class="lucent-footer__logo">
                <?php endif; ?>
                <div class="lucent-footer__social">
                    <?php if ($linkedin_url) : ?>
                        <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer" class="lucent-footer__social-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 3H5C3.895 3 3 3.895 3 5V19C3 20.105 3.895 21 5 21H19C20.105 21 21 20.105 21 19V5C21 3.895 20.105 3 19 3ZM9 17H6.477V10H9V17ZM7.694 8.717C6.923 8.717 6.408 8.203 6.408 7.517C6.408 6.831 6.922 6.317 7.779 6.317C8.55 6.317 9.065 6.831 9.065 7.517C9.065 8.203 8.551 8.717 7.694 8.717ZM18 17H15.558V13.174C15.558 12.116 14.907 11.872 14.663 11.872C14.419 11.872 13.605 12.035 13.605 13.174C13.605 13.337 13.605 17 13.605 17H11.082V10H13.605V11.116C13.93 10.465 14.581 10 15.802 10C17.023 10 18 10.977 18 13.174V17Z" fill="currentColor"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($twitter_url) : ?>
                        <a href="<?php echo esc_url($twitter_url); ?>" target="_blank" rel="noopener noreferrer" class="lucent-footer__social-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" fill="currentColor"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="lucent-footer__menus">
                <?php foreach (array($product_menu, $company_menu, $contact_menu) as $menu) : ?>
                    <div class="lucent-footer__menu">
                        <h3 class="lucent-footer__menu-title"><?php echo esc_html($menu['title']); ?></h3>
                        <ul class="lucent-footer__menu-list">
                            <?php foreach ($menu['items'] as $text => $link) : ?>
                                <li class="lucent-footer__menu-item">
                                    <?php if (is_numeric($text)) : ?>
                                        <?php echo wp_kses_post($link); ?>
                                    <?php else : ?>
                                        <a href="<?php echo esc_url($link); ?>" class="lucent-footer__menu-link">
                                            <?php echo esc_html($text); ?>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="lucent-footer__bottom">
            <div class="lucent-footer__copyright">
                <span><?php echo esc_html($copyright_text); ?></span>
                <?php if ($privacy_policy_link) : ?>
                    <a href="<?php echo esc_url($privacy_policy_link); ?>" class="lucent-footer__bottom-link">Privacy Policy</a>
                <?php endif; ?>
                <?php if ($provider_agreement_link) : ?>
                    <a href="<?php echo esc_url($provider_agreement_link); ?>" class="lucent-footer__bottom-link">Provider Agreement</a>
                <?php endif; ?>
            </div>
            <?php if ($disclaimer_text) : ?>
                <div class="lucent-footer__disclaimer">
                    <?php echo wp_kses_post($disclaimer_text); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
/* Editor and Preview Styles */
.block-editor-block-list__layout .lucent-footer,
.lucent-footer {
    background-color: #1B2B36;
    color: #ffffff;
    padding: 60px 20px 40px;
    margin-top: 80px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}

.block-editor-block-list__layout .lucent-footer *,
.lucent-footer * {
    box-sizing: border-box;
}

.block-editor-block-list__layout .lucent-footer__container,
.lucent-footer__container {
    max-width: 1400px;
    margin: 0 auto;
}

.block-editor-block-list__layout .lucent-footer__top,
.lucent-footer__top {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 40px;
    margin-bottom: 60px;
}

.block-editor-block-list__layout .lucent-footer__logo,
.lucent-footer__logo {
    max-width: 240px;
    height: auto;
    margin-bottom: 24px;
}

.block-editor-block-list__layout .lucent-footer__social,
.lucent-footer__social {
    display: flex;
    gap: 16px;
}

.block-editor-block-list__layout .lucent-footer__social-link,
.lucent-footer__social-link {
    color: #ffffff;
    transition: opacity 0.3s ease;
    text-decoration: none;
}

.block-editor-block-list__layout .lucent-footer__social-link:hover,
.lucent-footer__social-link:hover {
    opacity: 0.8;
}

.block-editor-block-list__layout .lucent-footer__menus,
.lucent-footer__menus {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px;
}

.block-editor-block-list__layout .lucent-footer__menu-title,
.lucent-footer__menu-title {
    font-size: 18px;
    font-weight: 600;
    margin: 0 0 24px;
    color: #ffffff;
}

.block-editor-block-list__layout .lucent-footer__menu-list,
.lucent-footer__menu-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.block-editor-block-list__layout .lucent-footer__menu-item,
.lucent-footer__menu-item {
    margin-bottom: 12px;
    font-size: 15px;
    line-height: 1.6;
}

.block-editor-block-list__layout .lucent-footer__menu-link,
.lucent-footer__menu-link {
    color: #ffffff;
    text-decoration: none;
    transition: opacity 0.3s ease;
}

.block-editor-block-list__layout .lucent-footer__menu-link:hover,
.lucent-footer__menu-link:hover {
    opacity: 0.8;
}

.block-editor-block-list__layout .lucent-footer__bottom,
.lucent-footer__bottom {
    padding-top: 40px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.block-editor-block-list__layout .lucent-footer__copyright,
.lucent-footer__copyright {
    display: flex;
    gap: 24px;
    margin-bottom: 24px;
    font-size: 14px;
    align-items: center;
}

.block-editor-block-list__layout .lucent-footer__copyright > span:after,
.lucent-footer__copyright > span:after {
    content: "";
    display: inline-block;
    width: 1px;
    height: 12px;
    background-color: rgba(255, 255, 255, 0.3);
    margin-left: 24px;
    vertical-align: middle;
}

.block-editor-block-list__layout .lucent-footer__bottom-link,
.lucent-footer__bottom-link {
    color: #ffffff;
    text-decoration: none;
    transition: opacity 0.3s ease;
    position: relative;
}

.block-editor-block-list__layout .lucent-footer__bottom-link:not(:last-child):after,
.lucent-footer__bottom-link:not(:last-child):after {
    content: "";
    display: inline-block;
    width: 1px;
    height: 12px;
    background-color: rgba(255, 255, 255, 0.3);
    margin-left: 24px;
    vertical-align: middle;
}

.block-editor-block-list__layout .lucent-footer__bottom-link:hover,
.lucent-footer__bottom-link:hover {
    opacity: 0.8;
}

.block-editor-block-list__layout .lucent-footer__disclaimer,
.lucent-footer__disclaimer {
    font-size: 14px;
    line-height: 1.6;
    opacity: 0.8;
    max-width: 1000px;
}

@media (max-width: 1024px) {
    .block-editor-block-list__layout .lucent-footer__top,
    .lucent-footer__top {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .block-editor-block-list__layout .lucent-footer__menus,
    .lucent-footer__menus {
        grid-template-columns: repeat(2, 1fr);
        gap: 32px;
    }
}

@media (max-width: 768px) {
    .block-editor-block-list__layout .lucent-footer,
    .lucent-footer {
        padding: 40px 20px 32px;
        margin-top: 60px;
    }

    .block-editor-block-list__layout .lucent-footer__menus,
    .lucent-footer__menus {
        grid-template-columns: 1fr;
        gap: 32px;
    }

    .block-editor-block-list__layout .lucent-footer__copyright,
    .lucent-footer__copyright {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }

    .block-editor-block-list__layout .lucent-footer__copyright > span:after,
    .block-editor-block-list__layout .lucent-footer__bottom-link:after,
    .lucent-footer__copyright > span:after,
    .lucent-footer__bottom-link:after {
        display: none;
    }
}
</style> 