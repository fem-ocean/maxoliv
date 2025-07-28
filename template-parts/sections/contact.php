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



<section id="contact-section" class="h-screen w-full pt-20 pb-12 px-16 bg-[#f9f9f9] flex flex-col justify-start items-start text-justify sticky top-0" style="background-color: #f1f1f1;">
    <div class="max-w-7xl relative">
        <div class="text-left mb-[50px] text-[#2e304b]">
            <h1>Contact Me</h1>
            <p>Let's work together!</p>
        </div>

        <div class="contact-options">
            <div class="contact-option flex items-center gap-[40px] cursor-pointer transition-opacity hover:opacity-80" data-option="booking">
                <div class="w-[60px] h-[60px] rounded-[50%] flex justify-center align-center shrink-0" style="background-color: #fd8e8e;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-working.png" alt="Booking" class="w-10 h-10">
                </div>
                <p class="text-secondary">I'd like to book you in</p>
            </div>

            <div class="contact-option flex items-center gap-[40px] cursor-pointer transition-opacity hover:opacity-80" data-option="quote">
                <div class="w-[60px] h-[60px] rounded-[50%] flex justify-center align-center shrink-0" style="background-color: #fde58e;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-money.png" alt="Quote" class="w-10 h-10">
                </div>
                <p>I'd like a quote for a project</p>
            </div>

            <div class="contact-option flex items-center gap-[40px] cursor-pointer transition-opacity hover:opacity-80" data-option="hello">
                <div class="w-[60px] h-[60px] rounded-[50%] flex justify-center align-center shrink-0" style="background-color: #8efdb0;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-wave.png" alt="Hello" class="w-10 h-10">
                </div>
                <p>I'd just like to say Hello</p>
            </div>
        </div>
    </div>

    <!-- Modal will be loaded here via JavaScript -->
    <div id="contact-modal-container"></div>
</section>