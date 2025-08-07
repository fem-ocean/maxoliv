


<?php
/**
 * Left panel template part
 *
 * @package Maxoliv
 * @since 1.0.0
 */


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>




<div class="w-1/2 h-[100vh] bg-[var(--theme-primary)] flex flex-col items-center justify-between text-center p-[50px_30px] gap-5">

  <?php do_action('maxoliv_before_left_panel_content'); ?>

  <!-- Burger Menu will go here -->
  <?php get_template_part('template-parts/burger-menu'); ?>
  
  <div class="left-panel__info flex flex-col h-3/5 text-[var(--theme-text-leftPanel)]">

    <h1 class="left-panel__name font-bold mb-[15px] text-3xl min-h-40">
      <?php echo wp_kses_post(get_theme_mod('left_panel_greeting', __('Hello. I\'m Olufemi Oshin.', 'maxolivtextdomain'))); ?>
      <br>
      <span class="typewriter-container text-4xl">I am <span id="typewriter-text"></span></span>
    </h1>

    <p class="left-panel__title text-xl mt-[30px]">
      <?php echo wp_kses_post(get_theme_mod('left_panel_description', __('I bridge the gap between business needs and digital solutions—managing projects end to end, gathering precise requirements, and building products that users love.', 'maxolivtextdomain'))); ?>
    </p>

    <a href="#contact-section" class="left-panel__button p-[15px_30px] text-lg font-[400] text-[var(--theme-text-leftPanel)] border-2 border-[var(--theme-text-leftPanel)] rounded-[50px] no-underline transition-all duration-500 mt-[120px] w-max self-center">
      <?php echo esc_html(get_theme_mod('left_panel_button_text', __('Let\'s Work Together!', 'maxolivtextdomain'))); ?>
    </a>
  </div>


  <div class="left-panel__ pb-10 h-[10%] ">
    <p class="left-panel__social-text text-[1rem] italic">
        <?php echo esc_html(get_theme_mod('left_panel_social_heading', __('Let\'s Connect', 'maxolivtextdomain'))); ?>
    </p>
        <div class="left-panel__social-links flex gap-[10px] justify-between items-center w-full m-auto">
            <?php if ($linkedin = get_theme_mod('left_panel_linkedin', 'https://linkedin.com/in/femi-oshin')) : ?>
                <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/linkedin-logo.png'); ?>" 
                         class="social-icon w-[30px] h-[30px] cursor-pointer transition-transform duration-300" alt="<?php esc_attr_e('LinkedIn', 'maxolivtextdomain'); ?>">
                </a>
            <?php endif; ?>
            
            <?php if ($github = get_theme_mod('left_panel_github', 'https://github.com/fem-ocean')) : ?>
                <a href="<?php echo esc_url($github); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/github-icon.svg'); ?>" 
                         class="social-icon w-[30px] h-[30px] cursor-pointer transition-transform duration-300" alt="<?php esc_attr_e('GitHub', 'maxolivtextdomain'); ?>">
                </a>
            <?php endif; ?>

            <?php if ($twitter = get_theme_mod('left_panel_twitter', 'https://twitter.com/femi_oshin')) : ?>
                <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/twitterx.png'); ?>" 
                         class="social-icon w-[30px] h-[30px] cursor-pointer transition-transform duration-300" alt="<?php esc_attr_e('Twitter', 'maxolivtextdomain'); ?>">
                </a>
            <?php endif; ?>

            <?php if ($youtube = get_theme_mod('left_panel_youtube', 'https://youtube.com/@habby9367')) : ?>
                <a href="<?php echo esc_url($youtube); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/youtube.png'); ?>" 
                         class="social-icon w-[30px] h-[30px] cursor-pointer transition-transform duration-300" alt="<?php esc_attr_e('YouTube', 'maxolivtextdomain'); ?>">
                </a>
            <?php endif; ?>
            
            <!-- Repeat for other social media -->
        </div>
    </div>

    
    
    <?php do_action('yourtheme_after_left_panel_content'); ?>
</div>



