<?php
/**
 * Block Name: Lucent Contact Form
 * Description: A contact form block with background pattern
 */

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-contact-form-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className"
$class_name = 'lucent-contact-form';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Get block values
$title = get_field('title') ?: 'Subscribe to get the latest insights in your inbox';
$subtitle = get_field('subtitle') ?: 'Delivering diagnostic advancements, powered by research and technology excellence';
$button_text = get_field('button_text') ?: 'Contact us';
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="lucent-contact-form__container">
        <div class="lucent-contact-form__header">
            <div class="lucent-contact-form__label">
                LET'S TALK
                <span class="lucent-contact-form__label-line"></span>
            </div>
            <h2 class="lucent-contact-form__title"><?php echo esc_html($title); ?></h2>
            <p class="lucent-contact-form__subtitle"><?php echo esc_html($subtitle); ?></p>
        </div>

        <form class="lucent-contact-form__form" action="#" method="POST">
            <div class="lucent-contact-form__row">
                <input type="text" name="first_name" placeholder="First name*" required>
                <input type="text" name="last_name" placeholder="Last name*" required>
            </div>
            <div class="lucent-contact-form__row">
                <input type="email" name="email" placeholder="Email*" required>
                <input type="tel" name="phone" placeholder="Phone*" required>
            </div>
            <div class="lucent-contact-form__submit">
                <button type="submit" class="lucent-contact-form__button">
                    <?php echo esc_html($button_text); ?>
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.lucent-contact-form {
    background-color: #2563EB;
    background-image: 
        radial-gradient(circle at 100% 0%, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 50%),
        radial-gradient(circle at 0% 100%, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 50%);
    padding: 80px 0 25px;
    color: white;
    border-radius: 32px;
    overflow: hidden;
    position: relative;
    margin: 0 35px 35px;
}

.lucent-contact-form__container {
    max-width: 920px;
    margin: 0 auto;
    padding: 0 35px;
}

.lucent-contact-form__header {
    text-align: center;
    margin-bottom: 48px;
}

.lucent-contact-form__label {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 24px;
}

.lucent-contact-form__label-line {
    display: inline-block;
    width: 24px;
    height: 2px;
    background-color: white;
}

.lucent-contact-form__title {
    font-size: 48px;
    font-weight: 500;
    line-height: 1.2;
    margin: 0 0 16px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.lucent-contact-form__subtitle {
    font-size: 20px;
    line-height: 1.5;
    margin: 0;
    opacity: 0.9;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.lucent-contact-form__form {
    max-width: 800px;
    margin: 0 auto;
}

.lucent-contact-form__row {
    display: flex;
    gap: 16px;
    margin-bottom: 16px;
}

.lucent-contact-form__row input {
    flex: 1;
    width: 100%;
    padding: 16px 20px;
    border: none;
    font-size: 16px;
    color: #1F2937;
    background: white;
    border-radius: 8px;
}

.lucent-contact-form__row input::placeholder {
    color: #6B7280;
}

.lucent-contact-form__submit {
    text-align: center;
    margin-top: 40px;
}

.lucent-contact-form__button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 16px 40px;
    background: white;
    color: #2563EB;
    border: none;
    border-radius: 100px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.lucent-contact-form__button:hover {
    background: #F8FAFC;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .lucent-contact-form {
        padding: 60px 0 25px;
        border-radius: 24px;
        margin: 0 35px 35px;
    }

    .lucent-contact-form__title {
        font-size: 36px;
    }

    .lucent-contact-form__subtitle {
        font-size: 18px;
    }

    .lucent-contact-form__row {
        flex-direction: column;
        gap: 2px;
    }

    .lucent-contact-form__row input:first-child,
    .lucent-contact-form__row input:last-child {
        border-radius: 8px;
    }

    .lucent-contact-form__container {
        padding: 0 24px;
    }
}
</style> 