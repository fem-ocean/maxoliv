
<?php
/**
 * Certifications Section Template
 *
 * @package Maxoliv
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Security check - prevent direct access
}

// Use the helper function to get certifications
$certifications = maxoliv_get_certifications();

// Get settings
// $title = get_theme_mod('certifications_title', __('Certifications & Qualifications', 'maxoliv'));
// $items = json_decode(get_theme_mod('maxoliv_certifications_items', '[]'), true);


// Return early if no certifications
if (empty($certifications)) {
    echo '<!-- No certifications found -->';
    return;
}
?>

<section id="certifications-section" class="maxoliv-section">
    <h2><?php echo esc_html(get_theme_mod('certifications_title', 'Certifications')); ?></h2>
    
    <div class="certifications-grid">
        <?php foreach ($certifications as $item) :
            // Skip if no name provided
            if (empty($item['name'])) {
                continue;
            }
            ?>
            <div class="certification-card" 
            data-description="<?php echo esc_attr($item['description'] ?? ''); ?>" 
            data-name="<?php echo esc_attr($item['name'] ?? ''); ?>" 
            data-certification-link="<?php echo esc_url($item['certification-link'] ?? '#'); ?>">
                <?php if (!empty($item['logo'])) : ?>
                    <img src="<?php echo esc_url($item['logo']); ?>" 
                         alt="<?php echo esc_attr($item['name']); ?>"
                         class="certification-logo"
                         loading="lazy">
                <?php endif; ?>       
            </div>
        <?php endforeach; ?>    
    </div>

    <div class="cert-section-overlay">
        <button class="close-overlay"><?php esc_html_e('Close', 'maxoliv'); ?></button>

        <div class="overlay-content">
            <h3 class="overlay-title"></h3>
            <p class="overlay-description"></p>
            <a href="#" class="overlay-link" id="overlay-link" target="_blank" rel="noopener noreferrer">
            <?php esc_html_e('See certification', 'maxoliv'); ?>
        </a>
        </div>

    </div>
</section>

<?php 
// Confirm template loaded
error_log('Certifications template rendered successfully');
?>