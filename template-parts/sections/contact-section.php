<?php
/**
 * Contact Section Template
 *  @package Maxoliv
 * @since 1.0.0
 */

 if (!defined('ABSPATH')) {
    exit; // Security check - prevent direct access
}
?>



<section id="contact-section" class="contact-section" style="background-color: #f1f1f1;">
    <div class="contact-container">
        <div class="contact-header">
            <h1>Contact Me</h1>
            <p>Let's work together!</p>
        </div>

        <div class="contact-options">
            <div class="contact-option" data-option="booking">
                <div class="contact-circle" style="background-color: #fd8e8e;">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon-working.png" alt="Booking" class="contact-icon">
                </div>
                <p>I'd like to book you in</p>
            </div>

            <div class="contact-option" data-option="quote">
                <div class="contact-circle" style="background-color: #fde58e;">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon-money.png" alt="Quote" class="contact-icon">
                </div>
                <p>I'd like a quote for a project</p>
            </div>

            <div class="contact-option" data-option="hello">
                <div class="contact-circle" style="background-color: #8efdb0;">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon-wave.png" alt="Hello" class="contact-icon">
                </div>
                <p>I'd just like to say Hello</p>
            </div>
        </div>
    </div>

    <!-- Modal will be loaded here via JavaScript -->
    <div id="contact-modal-container"></div>
</section>