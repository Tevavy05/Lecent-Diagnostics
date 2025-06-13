<?php
/**
 * Block Name: Lucent Pagination
 * Description: Display pagination navigation
 */

// Create id attribute allowing for custom "anchor" value
$id = 'lucent-pagination-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className"
$class_name = 'lucent-pagination';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Get block values
$total_pages = get_field('total_pages') ?: 6;
$current_page = get_field('current_page') ?: 1;
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="lucent-pagination__container">
        <button class="lucent-pagination__arrow lucent-pagination__prev" aria-label="Previous page">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <div class="lucent-pagination__numbers">
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <button class="lucent-pagination__number <?php echo $i === $current_page ? 'is-active' : ''; ?>"
                        aria-label="Page <?php echo $i; ?>"
                        <?php echo $i === $current_page ? 'aria-current="page"' : ''; ?>>
                    <?php echo $i; ?>
                </button>
            <?php endfor; ?>
        </div>

        <button class="lucent-pagination__arrow lucent-pagination__next" aria-label="Next page">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
</div>

<style>
.lucent-pagination {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 0;
}

.lucent-pagination__container {
    display: flex;
    align-items: center;
    gap: 16px;
}

.lucent-pagination__numbers {
    display: flex;
    align-items: center;
    gap: 8px;
}

.lucent-pagination__number {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    background: transparent;
    color: #64748B;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 8px;
}

.lucent-pagination__number:hover {
    background: #F1F5F9;
    color: #0F172A;
}

.lucent-pagination__number.is-active {
    background: #2563EB;
    color: white;
}

.lucent-pagination__arrow {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    background: transparent;
    color: #64748B;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 8px;
}

.lucent-pagination__arrow:hover {
    background: #F1F5F9;
    color: #0F172A;
}

.lucent-pagination__arrow:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

@media (max-width: 768px) {
    .lucent-pagination__number {
        width: 36px;
        height: 36px;
        font-size: 14px;
    }

    .lucent-pagination__arrow {
        width: 36px;
        height: 36px;
    }
}
</style> 