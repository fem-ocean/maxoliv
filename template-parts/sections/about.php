<?php
/**
 * About Section Template
 *
 * @package Maxoliv
 */
if (!defined('ABSPATH')) {
    exit; // Security check
}

// Get customizable content from theme options
$about_title = get_theme_mod('about_section_title', __('About Me', 'maxoliv'));
$intro_text = get_theme_mod('about_intro_text', __('I\'m a PMP-certified Project Manager, Business Analyst, and Harvard-certified Web & Software Developer...', 'maxoliv'));
$technical_text = get_theme_mod('about_technical_text', __('I wear many hats:<br>Business Analyst — Eliciting requirements...', 'maxoliv'));
$personal_text = get_theme_mod('about_personal_text', __('Outside of work, I\'m a family-first person...', 'maxoliv'));
?>

<section class="h-screen w-full flex flex-col items-center content-center text-justify bg-white py-[80px] px-[20px] sticky top-0" id="about-section">
    <div class="about-me-text">
        <h2><?php echo esc_html($about_title); ?></h2>
        <br />
        <p><?php echo wp_kses_post($intro_text); ?></p>
        <br />
        <h3><?php esc_html_e('Technical Skills', 'maxoliv'); ?></h3>
        <p><?php echo wp_kses_post($technical_text); ?></p>
        <br />
        <h3><?php esc_html_e('Personal Skills', 'maxoliv'); ?></h3>
        <p><?php echo wp_kses_post($personal_text); ?></p>
    </div>
</section>