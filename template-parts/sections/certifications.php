
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

<section id="certifications-section" class="sticky top-0 text-justify justify-center items-start flex-col flex w-full h-screen bg-[#f9f9f9] pt-20 px-12 pb-16">
    <h2 class="text-2xl font-bold"><?php echo esc_html(get_theme_mod('certifications_title', 'Certifications')); ?></h2>
    
    <div class="grid grid-cols-cert-grid gap-0 my-0 mx-auto max-w-[600px] w-full h-[80%] p-4">
        <?php foreach ($certifications as $item) :
            // Skip if no name provided
            if (empty($item['name'])) {
                continue;
            }
            ?>
            <div class="certification-card bg-white rounded-xl overflow-hidden shadow-md transition-transform duration-300 ease-in w-[150px] h-[150px] cursor-pointer m-auto flex justify-center items-center hover:-translate-y-1 hover:shadow-lg"
            data-description="<?php echo esc_attr($item['description'] ?? ''); ?>" 
            data-name="<?php echo esc_attr($item['name'] ?? ''); ?>" 
            data-certification-link="<?php echo esc_url($item['certification-link'] ?? '#'); ?>"
            data-logo="<?php echo esc_url($item['logo'] ?? ''); ?>">
                <?php if (!empty($item['logo'])) : ?>
                    <img src="<?php echo esc_url($item['logo']); ?>" 
                         alt="<?php echo esc_attr($item['name']); ?>"
                         class="w-full h-[180px] p-[10px] bg-white border-b-[1px] border-solid border-[#eee] object-contain"
                         loading="lazy">
                <?php endif; ?>       
            </div>
        <?php endforeach; ?>    
    </div>

    <div class="cert-section-overlay absolute top-0 left-0 w-full h-full bg-[rgba(0,0,0,0.7)] text-secondary hidden justify-center items-center opacity-0 transition-opacity duration-300 shadow-sm">
        <!-- <button class="close-overlay"><?php esc_html_e('Close', 'maxoliv'); ?></button> -->

        <div class="p-10 h-1/2 w-[90%] bg-[#f9f9f9] flex flex-col justify-center items-center relative bg-certification-bg">
            <div class="overlay-bg absolute inset-0 z-0"></div>

            <div class="flex flex-col justify-center items-center z-10">
                <button class="close-overlay absolute top-[10px] right-[10px] border-none py-[10px] px-[15px] rounded-[5px] cursor-pointer transition-colors duration-300">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/close2.png" alt="close" class="absolute top-[10px] right-[10px] w-[30px] h-[30px] transition-transform duration-300">
                </button>
                <h3 class="overlay-title text-2xl mb-5 animate-fade-in-down text-center font-bold md:text-xl"></h3>
                <p class="overlay-description text-lg leading-[1.6] text-left md:text-sm"></p>
                <a href="#" class="inline-block mt-[15px] py-2 px-5 bg-[var(--theme-primary)] no-underline text-white rounded-[4px] transition-all duration-300 hover:bg-dark hover:-translate-y-[2px]" id="overlay-link" target="_blank" rel="noopener noreferrer">
                <?php esc_html_e('See certification', 'maxoliv'); ?></a>
            </div>
        </div>

    </div>
</section>

<?php 
// Confirm template loaded
error_log('Certifications template rendered successfully');
?>