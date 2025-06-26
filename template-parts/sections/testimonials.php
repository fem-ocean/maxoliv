<?php
/**
 * Testimonials Section Template
 *
 * @package Maxoliv
 */

if (!defined('ABSPATH')) exit;






// Get testimonials from customizer

// METHOD 1: Get from Customizer (original)
// $testimonials = maxoliv_get_testimonials();

// METHOD 2: Get local testimonials
$testimonials = maxoliv_get_local_testimonials();
$bg_color = get_theme_mod('testimonials_bg_color', '#fd8e8e');
?>

<section id="testimonials-section" class="maxoliv-section" style="background-color: var(--theme-primary, <?php echo esc_attr($bg_color); ?>">
    <div class="testimonials-container">
        <?php if (!empty($testimonials)) : ?>
            <div class="swiper testimonials-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $index => $testimonial) : ?>
                        <div class="swiper-slide">
                            <blockquote class="testimonial-text">
                                <?php echo wp_kses_post($testimonial['text']); ?>
                            </blockquote>

                            <?php if (!empty($testimonial['image'])) : ?>
                                <div class="testimonial-image-container">
                                    <?php 
                                    // First try to get WordPress attachment
                                    $image_id = attachment_url_to_postid($testimonial['image']);
                                    if ($image_id) {
                                        echo wp_get_attachment_image(
                                            $image_id,
                                            'thumbnail',
                                            false,
                                            array(
                                                'class' => 'testimonial-author-image',
                                                'loading' => 'lazy'
                                            )
                                        );
                                    } else {
                                        // Fallback for local/remote images
                                        echo '<img src="' . esc_url($testimonial['image']) . '" class="testimonial-author-image" alt="' . esc_attr($testimonial['author']) . '" loading="lazy">';
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>

                            <cite class="testimonial-author"><?php echo esc_html($testimonial['author']); ?></cite>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php else : ?>
            <p class="no-testimonials"><?php esc_html_e('No testimonials found.', 'maxoliv'); ?></p>
        <?php endif; ?>
    </div>
</section>