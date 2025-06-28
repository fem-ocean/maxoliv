

<?php
/**
 * Left Panel Template
 *
 * @package Maxoliv
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>




<div class="left-panel">
    <?php do_action('maxoliv_before_left_panel_content'); ?>
    
    <!-- Burger Menu will go here -->
    <?php get_template_part('template-parts/burger-menu'); ?>
    
    
    <div class="left-panel__info">
        
        <h1 class="left-panel__name">
            <?php echo wp_kses_post(get_theme_mod('left_panel_greeting', __('Hello. I\'m Olufemi Oshin.', 'maxolivtextdomain'))); ?>
            <br>
            <span class="typewriter-container">I am <span id="typewriter-text"></span></span>
        </h1>
        
        <p class="left-panel__title">
            <?php echo wp_kses_post(get_theme_mod('left_panel_description', __('I bridge the gap between business needs and digital solutions—managing projects end to end, gathering precise requirements, and building products that users love.', 'maxolivtextdomain'))); ?>
        </p>
    </div>
    

    
    <a href="#contact-section" class="left-panel__button">
        <?php echo esc_html(get_theme_mod('left_panel_button_text', __('Let\'s Work Together!', 'maxolivtextdomain'))); ?>
    </a>
    
    <div class="left-panel__">
        <p class="left-panel__social-text">
            <?php echo esc_html(get_theme_mod('left_panel_social_heading', __('Let\'s Connect', 'maxolivtextdomain'))); ?>
        </p>
        <div class="left-panel__social-links">
            <?php if ($linkedin = get_theme_mod('left_panel_linkedin', 'https://linkedin.com/in/femi-oshin')) : ?>
                <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/linkedin-logo.png'); ?>" 
                         class="social-icon" alt="<?php esc_attr_e('LinkedIn', 'maxolivtextdomain'); ?>">
                </a>
            <?php endif; ?>
            
            <?php if ($github = get_theme_mod('left_panel_github', 'https://github.com/fem-ocean')) : ?>
                <a href="<?php echo esc_url($github); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/github-icon.svg'); ?>" 
                         class="social-icon" alt="<?php esc_attr_e('GitHub', 'maxolivtextdomain'); ?>">
                </a>
            <?php endif; ?>

            <?php if ($twitter = get_theme_mod('left_panel_twitter', 'https://twitter.com/femi_oshin')) : ?>
                <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/twitterx.png'); ?>" 
                         class="social-icon" alt="<?php esc_attr_e('Twitter', 'maxolivtextdomain'); ?>">
                </a>
            <?php endif; ?>

            <?php if ($youtube = get_theme_mod('left_panel_youtube', 'https://youtube.com/@habby9367')) : ?>
                <a href="<?php echo esc_url($youtube); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/youtube.png'); ?>" 
                         class="social-icon" alt="<?php esc_attr_e('YouTube', 'maxolivtextdomain'); ?>">
                </a>
            <?php endif; ?>
            
            <!-- Repeat for other social media -->
        </div>
    </div>
    
    <?php do_action('yourtheme_after_left_panel_content'); ?>
</div>

