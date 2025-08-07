<?php
/**
 * Burger Menu Template with Circle Reveal
 *
 * @package Maxoliv
 */
if (!defined('ABSPATH')) {
    exit; // Security check
}
?>

<div class="burger-menu-wrapper relative z-[5000]">
    <button class="burger-toggle bg-[var(--theme-text)] border-[var(--theme-text)]" id="burger-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle Menu', 'maxoliv'); ?>">
        <div class="burger-circle w-[60px] h-[60px] rounded-[50%] flex justify-center items-center cursor-pointer transition-colors duration-300 fixed top-[70px] left-[30px] z-[4999]" style="background-color: var(--theme-text-leftPanel, <?php echo esc_attr(get_theme_mod('burger_circle_color', '#fd8e8e')); ?>);">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icon-hamburger.png'); ?>" 
             class="burger-icon w-10 transition-opacity duration-300 z-[5000] hover:opacity-80" alt="<?php esc_attr_e('Menu', 'maxoliv'); ?>">
        </div>
    </button>

    <div class="burger-menu-overlay fixed top-0 left-0 w-screen h-screen bg-[rgba(0,0,0,0.5)] opacity-0 pointer-events-none transition-opacity duration-300 z-[1000] group [&.active]:opacity-100 [&:.active]:pointer-events-auto">
        <div class="circle-reveal fixed top-[10px] left-[22px] w-[150px] mt-[50px] h-[35vh] rounded-[5%] origin-left z-[999] bg-[rgb(241,241,241)] scale-0 opacity-0 transition-transform duration-[600ms] group-[.active]:scale-3 group-[.active]:opacity-100" id="circle-reveal"></div>
        
        <div class="burger-menu-modal relative w-full h-full" id="burger-menu-modal">
            <div class="burger-menu-content absolute top-6 left-[40px] w-[25%] p-10 text-[var(--theme-text)] z-[1005] flex flex-col justify-between">
                <h2 class="burger-menu-title text-xl mb-8 text-center font-bold"><?php esc_html_e('Burger Menu', 'maxoliv'); ?></h2>
                
                <nav class="burger-menu-nav text-left">
                    <?php 
                    $menu_sections = array('about', 'certifications', 'testimonials','projects', 'contact');
                    
                    foreach ($menu_sections as $section) : 
                        $title = get_theme_mod('menu_item_' . $section . '_title', ucfirst($section));
                        $desc = get_theme_mod('menu_item_' . $section . '_desc', ucfirst($section));
                    ?>
                        <div class="burger-menu-item mb-6 cursor-pointer" data-section="<?php echo esc_attr($section); ?>">
                            <h4 class="m-0 text-[18px] font-bold"><?php echo esc_html($title); ?></h4>
                            <p class="m-0 text-sm opacity-70"><?php echo esc_html($desc); ?></p>
                        </div>
                    <?php endforeach; ?>
                </nav>
                
                <div class="burger-menu-theme-switcher">
                    <?php get_template_part('template-parts/theme-switcher'); ?>
                </div>
            </div>
        </div>
    </div>
</div>