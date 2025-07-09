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

<section id="testimonials-section" class="sticky top-0 text-justify justify-center items-start flex-col flex w-full h-screen bg-[#f9f9f9] pt-20 px-12 pb-16" style="background-color: var(--theme-primary, <?php echo esc_attr($bg_color);?>">
    <div class="flex flex-row w-full max-w-3xl h-3/4 my-0 mx-auto text-center py-10 px-10 text-secondary justify-center items-center">
        <?php if (!empty($testimonials)) : ?>
            <div class="h-[90%] testimonials-swiper ">
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $index => $testimonial) : ?>
                        <div class="swiper-slide">
                            <blockquote class="text-[2rem] mb-5 italic">
                                <?php echo wp_kses_post($testimonial['text']); ?>
                            </blockquote>

                            <?php if (!empty($testimonial['image'])) : ?>
                                <div class="my-5 mx-auto w-20 h-20 rounded-[50%] overflow-hidden border-solid border-white border-[3px] shadow-md">
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

                            <cite class="w-full h-full object-cover"><?php echo esc_html($testimonial['author']); ?></cite>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="absolute bottom-2 left-[10%] -translate-x-[50%] flex flex-row items-center justify-center "></div>
            </div>
        <?php else : ?>
            <p class="no-testimonials"><?php esc_html_e('No testimonials found.', 'maxoliv'); ?></p>
        <?php endif; ?>
    </div>
</section>