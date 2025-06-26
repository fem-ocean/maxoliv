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

<div class="burger-menu-wrapper">
    <button class="burger-toggle" id="burger-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle Menu', 'maxoliv'); ?>">
        <div class="burger-circle" style="background-color: var(--theme-primary, <?php echo esc_attr(get_theme_mod('burger_circle_color', '#fd8e8e')); ?>);">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icon-hamburger.png'); ?>" 
             class="burger-icon" alt="<?php esc_attr_e('Menu', 'maxoliv'); ?>">
        </div>
    </button>

    <div class="burger-menu-overlay">
        <div class="circle-reveal" id="circle-reveal"></div>
        
        <div class="burger-menu-modal" id="burger-menu-modal">
            <div class="burger-menu-content">
                <h2 class="burger-menu-title"><?php esc_html_e('Burger Menu', 'maxoliv'); ?></h2>
                
                <nav class="burger-menu-nav">
                    <?php 
                    $menu_sections = array('about', 'certifications', 'testimonials','projects', 'contact');
                    
                    foreach ($menu_sections as $section) : 
                        $title = get_theme_mod('menu_item_' . $section . '_title', ucfirst($section));
                        $desc = get_theme_mod('menu_item_' . $section . '_desc', '');
                    ?>
                        <div class="burger-menu-item" data-section="<?php echo esc_attr($section); ?>">
                            <h4><?php echo esc_html($title); ?></h4>
                            <p><?php echo esc_html($desc); ?></p>
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