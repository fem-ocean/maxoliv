<?php
/**
 * Maxoliv Theme Functions
 * 
 * @package Maxoliv
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Security check
}

/**
 * Theme Setup
 */
function maxoliv_setup() {
    // Make theme available for translation
    load_theme_textdomain('maxoliv', get_template_directory() . '/languages');
    
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Enable selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'maxoliv'),
    ));
}
add_action('after_setup_theme', 'maxoliv_setup');

/**
 * Enqueue Theme Assets
 */
function maxoliv_assets() {
    $theme_version = wp_get_theme()->get('Version');
    
    // Main stylesheet
    wp_enqueue_style(
        'maxoliv-style',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );
    
    // Custom CSS
    $custom_css_path = '/assets/css/main.css';
    if (file_exists(get_template_directory() . $custom_css_path)) {
        wp_enqueue_style(
            'maxoliv-main-style',
            get_template_directory_uri() . $custom_css_path,
            array('maxoliv-style'),
            filemtime(get_template_directory() . $custom_css_path)
        );
    }
    
    // Google Fonts
    wp_enqueue_style(
        'maxoliv-poppins-font',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap',
        array(),
        null
    );
    
    // Main JavaScript
    wp_enqueue_script(
        'maxoliv-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'maxoliv_assets');

/**
 * Customizer Settings******confirm this part - why is left panel small compared to right panel. And also controls*********************************************************
 */
function maxoliv_left_panel_customize_register($wp_customize) {
    
    
    
    // Left Panel Settings
    $wp_customize->add_section('maxoliv_left_panel', array(
        'title'    => __('Left Panel Settings', 'maxoliv'),
        'priority' => 35,
    ));
    
    // Add your left panel controls here...
    // (Keep your existing left panel controls but update text domain to 'maxoliv')
}
add_action('customize_register', 'maxoliv_left_panel_customize_register');

/**
 * Output Dynamic CSS
 */
function maxoliv_dynamic_css() {
    ?>
    <style type="text/css">
        /* Right Panel Background */
        .background-layer {
            background-image: url('<?php echo esc_url(get_theme_mod('rightpanel_background_image', get_template_directory_uri() . '/assets/images/mypicsedited2.jpg')); ?>');
        }
        
        /* Right Panel Overlay */
        .overlay {
            background-color: <?php echo esc_attr(get_theme_mod('rightpanel_overlay_color', 'rgba(253, 142, 142, 0.3)')); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'maxoliv_dynamic_css');

/**
 * Debugging Helpers (Remove in production)
 */
if (WP_DEBUG) {
    add_action('wp_head', function() {
        echo '<!-- Maxoliv Theme Active -->';
    });
    
    add_action('init', function() {
        error_log('Maxoliv Theme Initialized');
    });
}




// Add to your existing customizer function
function maxoliv_burger_menu_customize_register($wp_customize) {
    // Burger Menu Section
    $wp_customize->add_section('maxoliv_burger_menu', array(
        'title'    => __('Burger Menu Settings', 'maxoliv'),
        'priority' => 40,
    ));
    
    // Circle Color
    $wp_customize->add_setting('burger_circle_color', array(
        'default'           => '#fd8e8e',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'burger_circle_color_control',
        array(
            'label'    => __('Circle Color', 'maxoliv'),
            'section'  => 'maxoliv_burger_menu',
            'settings' => 'burger_circle_color'
        )
    ));
    
    // Menu Items
    $menu_items = array(
        'about' => array(
            'title' => __('About', 'maxoliv'),
            'desc'  => __('Delicately tender with a slice of cheese', 'maxoliv')
        ),
        'certifications' => array(
            'title' => __('Certifications', 'maxoliv'),
            'desc'  => __('Recognition from the best institutions', 'maxoliv')
        ),
        'references' => array(
            'title' => __('References', 'maxoliv'),
            'desc'  => __('Hear what our happy says', 'maxoliv')
        ),
        'projects' => array(
            'title' => __('Projects', 'maxoliv'),
            'desc'  => __('Served on a bed of fullstack tech', 'maxoliv')
        ),
        'contact' => array(
            'title' => __('Contact', 'maxoliv'),
            'desc'  => __('A superb choice to finish the day', 'maxoliv')
        ),
        
    );
    
    foreach ($menu_items as $key => $item) {
        // Title
        $wp_customize->add_setting('menu_item_' . $key . '_title', array(
            'default'           => $item['title'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        
        $wp_customize->add_control('menu_item_' . $key . '_title_control', array(
            'label'    => sprintf(__('%s Title', 'maxoliv'), ucfirst($key)),
            'section'  => 'maxoliv_burger_menu',
            'settings' => 'menu_item_' . $key . '_title',
            'type'     => 'text'
        ));
        
        // Description
        $wp_customize->add_setting('menu_item_' . $key . '_desc', array(
            'default'           => $item['desc'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        
        $wp_customize->add_control('menu_item_' . $key . '_desc_control', array(
            'label'    => sprintf(__('%s Description', 'maxoliv'), ucfirst($key)),
            'section'  => 'maxoliv_burger_menu',
            'settings' => 'menu_item_' . $key . '_desc',
            'type'     => 'text'
        ));
    }
    
    // Enqueue Burger Menu JS
    $wp_customize->selective_refresh->add_partial('burger_menu_partial', array(
        'selector'        => '.burger-menu-wrapper',
        'settings'        => array_keys($wp_customize->settings()),
        'render_callback' => function() {
            get_template_part('template-parts/burger-menu');
        }
    ));

    


}
add_action('customize_register', 'maxoliv_burger_menu_customize_register');


// Enqueue Burger Menu JS
function maxoliv_enqueue_burger_menu_js() {
    wp_enqueue_script(
        'maxoliv-burger-menu',
        get_template_directory_uri() . '/assets/js/burger-menu.js',
        array(),
        filemtime(get_template_directory() . '/assets/js/burger-menu.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'maxoliv_enqueue_burger_menu_js');





/**
 * Add Theme Switcher Customizer Settings
 */// Add to your existing customizer function
function maxoliv_theme_switcher_customize_register($wp_customize) {
    // Theme Switcher Section
    $wp_customize->add_section('maxoliv_theme_switcher', array(
        'title'    => __('Theme Switcher', 'maxoliv'),
        'priority' => 45,
    ));
    
    // Light Theme Color
    $wp_customize->add_setting('theme_switcher_light_color', array(
        'default'           => '#fd8e8e',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'theme_switcher_light_color_control',
        array(
            'label'    => __('Light Theme Color', 'maxoliv'),
            'section'  => 'maxoliv_theme_switcher',
            'settings' => 'theme_switcher_light_color'
        )
    ));
    
    // Dark Theme Color
    $wp_customize->add_setting('theme_switcher_dark_color', array(
        'default'           => '#fde58e',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'theme_switcher_dark_color_control',
        array(
            'label'    => __('Dark Theme Color', 'maxoliv'),
            'section'  => 'maxoliv_theme_switcher',
            'settings' => 'theme_switcher_dark_color'
        )
    ));
    
    // Blue Theme Color
    $wp_customize->add_setting('theme_switcher_blue_color', array(
        'default'           => '#8efdb0',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'theme_switcher_blue_color_control',
        array(
            'label'    => __('Blue Theme Color', 'maxoliv'),
            'section'  => 'maxoliv_theme_switcher',
            'settings' => 'theme_switcher_blue_color'
        )
    ));
    
    // Selective Refresh
    $wp_customize->selective_refresh->add_partial('theme_switcher_partial', array(
        'selector'        => '.theme-switcher',
        'settings'        => array(
            'theme_switcher_light_color',
            'theme_switcher_dark_color',
            'theme_switcher_blue_color'
        ),
        'render_callback' => function() {
            ob_start();
            get_template_part('template-parts/theme-switcher');
            return ob_get_clean();
        }
    ));
}
add_action('customize_register', 'maxoliv_theme_switcher_customize_register');




// **********************************************************************
// Enqueue Theme Switcher JS
function maxoliv_enqueue_theme_switcher_js() {
    wp_enqueue_script(
        'maxoliv-theme-switcher',
        get_template_directory_uri() . '/assets/js/theme-switcher.js',
        array(),
        filemtime(get_template_directory() . '/assets/js/theme-switcher.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'maxoliv_enqueue_theme_switcher_js');



// Add theme class to body
function maxoliv_body_class_theme($classes) {
    $current_theme = !empty($_COOKIE['maxoliv-theme']) ? sanitize_text_field($_COOKIE['maxoliv-theme']) : 'light';
    $classes[] = 'theme-' . $current_theme;
    return $classes;
}
add_filter('body_class', 'maxoliv_body_class_theme');








// Right Panel Customizer Settings
function maxoliv_right_panel_customize_register($wp_customize) {
    // Right Panel Section Settings
    $wp_customize->add_section('maxoliv_right_panel', array(
        'title'    => __('Right Panel Settings', 'maxoliv'),
        'priority' => 30,
    ));
    
    // Background Image
    $wp_customize->add_setting('right_panel_background_image', array(
        'default'           => get_template_directory_uri() . '/assets/images/mypicsedited2.jpg',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'right_panel_background_image_control',
        array(
            'label'       => __('Background Image', 'maxoliv'),
            'description' => __('Recommended size: 1920x1080px', 'maxoliv'),
            'section'     => 'maxoliv_right_panel',
            'settings'    => 'right_panel_background_image'
        )
    ));
    
    // Overlay Color
    $wp_customize->add_setting('right_panel_overlay_color', array(
        'default'           => 'rgba(253, 142, 142, 0.3)',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'right_panel_overlay_color_control',
        array(
            'label'    => __('Overlay Color', 'maxoliv'),
            'section'  => 'maxoliv_right_panel',
            'settings' => 'right_panel_overlay_color'
        )
    ));
    
    // Section Toggles
    $sections = array(
        'about' => __('About Section', 'maxoliv'),
        'certifications' => __('Certifications Section', 'maxoliv'),
        'references' => __('Reference Section', 'maxoliv'),
        'projects' => __('Projects Section', 'maxoliv'),
        'contact' => __('Contact Section', 'maxoliv')
    );
    
    foreach ($sections as $key => $label) {
        $wp_customize->add_setting('display_' . $key . '_section', array(
            'default'           => true,
            'transport'         => 'refresh',
            'sanitize_callback' => 'maxoliv_sanitize_checkbox'
        ));
        
        $wp_customize->add_control('display_' . $key . '_section_control', array(
            'label'    => $label,
            'section'  => 'maxoliv_right_panel',
            'settings' => 'display_' . $key . '_section',
            'type'     => 'checkbox'
        ));
    }
    
    // About Section Content
    $wp_customize->add_setting('about_section_title', array(
        'default'           => __('About Me', 'maxoliv'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control('about_section_title_control', array(
        'label'    => __('About Section Title', 'maxoliv'),
        'section'  => 'maxoliv_right_panel',
        'settings' => 'about_section_title',
        'type'     => 'text'
    ));
    
    $wp_customize->add_setting('about_section_content', array(
        'default'           => '',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    ));
    
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'about_section_content_control',
        array(
            'label'    => __('About Section Content', 'maxoliv'),
            'section'  => 'maxoliv_right_panel',
            'settings' => 'about_section_content',
            'code_type' => 'text/html'
        )
    ));



    // Certifications Section Content
    $wp_customize->add_setting('certifications_section_title', array(
        'default'           => __('Certifications', 'maxoliv'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control('certifications_section_title_control', array(
        'label'    => __('Certifications Section Title', 'maxoliv'),
        'section'  => 'maxoliv_right_panel',
        'settings' => 'certifications_section_title',
        'type'     => 'text'
    ));
    
    $wp_customize->add_setting('certifications_section_content', array(
        'default'           => '',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    ));
    
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'certifications_section_content_control',
        array(
            'label'    => __('Certifications Section Content', 'maxoliv'),
            'section'  => 'maxoliv_right_panel',
            'settings' => 'certifications_section_content',
            'code_type' => 'text/html'
        )
    ));


    // References Section Content
    $wp_customize->add_setting('references_section_title', array(
        'default'           => __('References', 'maxoliv'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control('references_section_title_control', array(
        'label'    => __('References Section Title', 'maxoliv'),
        'section'  => 'maxoliv_right_panel',
        'settings' => 'references_section_title',
        'type'     => 'text'
    ));
    
    $wp_customize->add_setting('references_section_content', array(
        'default'           => '',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    ));
    
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'references_section_content_control',
        array(
            'label'    => __('References Section Content', 'maxoliv'),
            'section'  => 'maxoliv_right_panel',
            'settings' => 'references_section_content',
            'code_type' => 'text/html'
        )
    ));



    // Projects Section Content
    $wp_customize->add_setting('projects_section_title', array(
        'default'           => __('Projects', 'maxoliv'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control('projects_section_title_control', array(
        'label'    => __('Projects Section Title', 'maxoliv'),
        'section'  => 'maxoliv_right_panel',
        'settings' => 'projects_section_title',
        'type'     => 'text'
    ));
    
    $wp_customize->add_setting('projects_section_content', array(
        'default'           => '',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    ));
    
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'projects_section_content_control',
        array(
            'label'    => __('Projects Section Content', 'maxoliv'),
            'section'  => 'maxoliv_right_panel',
            'settings' => 'projects_section_content',
            'code_type' => 'text/html'
        )
    ));
    


    // Contact Section Content
    $wp_customize->add_setting('contact_section_title', array(
        'default'           => __('Contact', 'maxoliv'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control('contact_section_title_control', array(
        'label'    => __('Contact Section Title', 'maxoliv'),
        'section'  => 'maxoliv_right_panel',
        'settings' => 'contact_section_title',
        'type'     => 'text'
    ));
    
    $wp_customize->add_setting('contact_section_content', array(
        'default'           => '',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    ));
    
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'contact_section_content_control',
        array(
            'label'    => __('Contact Section Content', 'maxoliv'),
            'section'  => 'maxoliv_right_panel',
            'settings' => 'contact_section_content',
            'code_type' => 'text/html'
        )
    ));
    // Add similar controls for other sections...
    
    
    
    // Selective Refresh
    $wp_customize->selective_refresh->add_partial('right_panel_partial', array(
        'selector'        => '.right-panel-container',
        'settings'        => array(
            'right_panel_background_image',
            'right_panel_overlay_color',
            'about_section_title',
            'about_section_content',
            'certifications_section_title',
            'certifications_section_content',
            'references_section_title',
            'references_section_content',
            'projects_section_title',
            'projects_section_content',
            'contact_section_title',
            'contact_section_content'
            // Add other settings
        ),
        'render_callback' => function() {
            get_template_part('right-panel');
        }
    ));
}
add_action('customize_register', 'maxoliv_right_panel_customize_register');

// Sanitize checkbox
function maxoliv_sanitize_checkbox($input) {
    return (isset($input) && true === $input) ? true : false;
}

// ********************Check here array(jquery)
// Enqueue right panel JS
// function maxoliv_right_panel_scripts() {
//     wp_enqueue_script(
//         'maxoliv-right-panel',
//         get_template_directory_uri() . '/assets/js/right-panel.js',
//         array('jquery'),
//         filemtime(get_template_directory() . '/assets/js/right-panel.js'),
//         true
//     );
// }
// add_action('wp_enqueue_scripts', 'maxoliv_right_panel_scripts');






// About Section Customizer Settings
function maxoliv_about_customizer($wp_customize) {
    // About Section Panel
    $wp_customize->add_section('maxoliv_about_section', array(
        'title'    => __('About Section', 'maxoliv'),
        'priority' => 30,
    ));

    // Section Title
    $wp_customize->add_setting('about_section_title', array(
        'default'           => __('About Me', 'maxoliv'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control('about_section_title_control', array(
        'label'    => __('Section Title', 'maxoliv'),
        'section'  => 'maxoliv_about_section',
        'settings' => 'about_section_title',
        'type'     => 'text'
    ));

    // Intro Text
    $wp_customize->add_setting('about_intro_text', array(
        'default'           => __('I\'m a PMP-certified Project Manager, Business Analyst, and Harvard-certified Web & Software Developer...', 'maxoliv'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    ));
    
    $wp_customize->add_control('about_intro_text_control', array(
        'label'    => __('Introduction Text', 'maxoliv'),
        'section'  => 'maxoliv_about_section',
        'settings' => 'about_intro_text',
        'type'     => 'textarea'
    ));

    // Technical Text
    $wp_customize->add_setting('about_technical_text', array(
        'default'           => __('I wear many hats:<br>Business Analyst — Eliciting requirements...', 'maxoliv'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    ));
    
    $wp_customize->add_control('about_technical_text_control', array(
        'label'    => __('Technical Text', 'maxoliv'),
        'section'  => 'maxoliv_about_section',
        'settings' => 'about_technical_text',
        'type'     => 'textarea'
    ));

    // Personal Text
    $wp_customize->add_setting('about_personal_text', array(
        'default'           => __('Outside of work, I\'m a family-first person...', 'maxoliv'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    ));
    
    $wp_customize->add_control('about_personal_text_control', array(
        'label'    => __('Personal Text', 'maxoliv'),
        'section'  => 'maxoliv_about_section',
        'settings' => 'about_personal_text',
        'type'     => 'textarea'
    ));

    // Selective Refresh
    $wp_customize->selective_refresh->add_partial('about_section_partial', array(
        'selector'        => '#about-section',
        'settings'        => array(
            'about_section_title',
            'about_intro_text',
            'about_technical_text',
            'about_personal_text'
        ),
        'render_callback' => function() {
            get_template_part('template-parts/sections/about');
        }
    ));
}
add_action('customize_register', 'maxoliv_about_customizer');




/**
 * Certifications Section Customizer Settings
 */
function maxoliv_certifications_customizer($wp_customize) {
    // Certifications Section
    $wp_customize->add_section('maxoliv_certifications', [
        'title'    => __('Certifications', 'maxoliv'),
        'panel'    => 'maxoliv_right_panel', // Group under Right Panel
        'priority' => 35,
    ]);

    // Section Title
    $wp_customize->add_setting('certifications_title', [
        'default'           => __('Certifications & Qualifications', 'maxoliv'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize->add_control('certifications_title_control', [
        'label'    => __('Section Title', 'maxoliv'),
        'section'  => 'maxoliv_certifications',
        'settings' => 'certifications_title',
        'type'     => 'text'
    ]);

    // Certification Items (Repeater)
    $wp_customize->add_setting('maxoliv_certifications_items', [
        'default'           => json_encode(maxoliv_get_certifications()),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    ]);
    
    $wp_customize->add_control('maxoliv_certifications_items_control', [
        'label'       => __('Certification Items', 'maxoliv'),
        'description' => __('Add/edit certifications in JSON format', 'maxoliv'),
        'section'     => 'maxoliv_certifications',
        'settings'    => 'maxoliv_certifications_items',
        'type'        => 'textarea'
    ]);

    // Selective Refresh
    $wp_customize->selective_refresh->add_partial('certifications_partial', [
        'selector'        => '#certifications-section',
        'settings'        => ['certifications_title', 'maxoliv_certifications_items'],
        'render_callback' => function() {
            get_template_part('template-parts/sections/certifications');
        }
    ]);
}
add_action('customize_register', 'maxoliv_certifications_customizer');


/**
 * Helper Function - Get Certifications Data
 */
function maxoliv_get_certifications() {
    $default = json_encode([
        
        [
            'name' => 'PMP Certification',
            'logo' => get_template_directory_uri() . '/assets/images/pmp.png',
            'description' => 'As a globally-recognized Project Management Professional (PMP)®, I have demonstrated the extensive knowledge and mastery of project management concepts, tasks, and techniques that are applicable across virtually any industry & methodology.',
            'certification-link' => 'https://www.google.com'
        ],
        [
            'name' => 'Professional Scrum Master',
            'logo' => get_template_directory_uri() . '/assets/images/psm.png',
            'description' => 'By earning the globally recognized Professional Scrum Master I (PSM I) certification I have demonstrated a fundamental level of Scrum mastery, including the concepts of applying Scrum, and proven an understanding of Scrum as described in the Scrum Guide. I have also demonstrated a consistent use of terminology and approach to Scrum.',
            'certification-link' => 'https://www.google.com'
        ],
        [
            'name' => 'Google Project Management',
            'logo' => get_template_directory_uri() . '/assets/images/google-pm.png',
            'description' => 'By earning the Google Project Management Certificate, I have completed six courses, developed by Google, that include hands-on, practice-based assessments and are designed to prepare me for introductory-level roles in Project Management. It made me competent in initiating, planning and running both traditional and agile projects.',
            'certification-link' => 'https://www.google.com'
        ],
        [
            'name' => 'Certificate in web programming with Python & JavaScript',
            'logo' => get_template_directory_uri() . '/assets/images/harvardcs50.jpg',
            'description' => 'Harvard University\'s CS50 Introduction to Computer Science.- By earning the Certificate in web programming with Python & JavaScript, I have developed a deep understanding of web development concepts and best practices. This program has equipped me with the skills to build dynamic and interactive web applications using modern programming languages and frameworks.',
            'certification-link' => 'https://github.com'

        ],
        [
            'name' => 'Certificate in full stack development with MERN',
            'logo' => get_template_directory_uri() . '/assets/images/nerdyeye.png',
            'description' => 'Comprehensive Full Stack Web Development course. - By earning the Certificate in full stack development with MERN, I have developed a deep understanding of web development concepts and best practices. This program has equipped me with the skills to build dynamic and interactive web applications using modern programming languages and frameworks.',
            'certification-link' => 'https://github.com'
        ],
        [
            'name' => 'Responsive Web Design',
            'logo' => get_template_directory_uri() . '/assets/images/freeCodeCamp.webp',
            'description' => 'By earning the Responsive Web Design certification from freeCodeCamp, I have developed a deep understanding of web design principles and best practices. This program has equipped me with the skills to create responsive and visually appealing websites that provide an optimal user experience across various devices.',
            'certification-link' => 'https://github.com'
        ],
        [
            'name' => 'Javascript Algorithms and Data Structures',
            'logo' => get_template_directory_uri() . '/assets/images/freeCodeCamp.webp',
            'description' => 'By earning the JavaScript Algorithms and Data Structures certification from freeCodeCamp, I have developed a deep understanding of algorithms and data structures in JavaScript. This program has equipped me with the skills to solve complex programming challenges and build efficient applications.',
            'certification-link' => 'https://github.com'
        ],
        [
            'name' => 'Introduction to Artificial Intelligence',
            'logo' => get_template_directory_uri() . '/assets/images/openclassrooms.jpg',
            'description' => 'By earning the Introduction to Artificial Intelligence certification from OpenClassrooms, I have developed a deep understanding of AI concepts and applications. This program has equipped me with the skills to build intelligent systems and leverage AI technologies effectively.',
            'certification-link' => 'https://github.com'
        ],


    ]);

    $items = get_theme_mod('maxoliv_certifications_items', $default);
    $decoded = json_decode($items, true);

    //Ensure each item has a link
    foreach ($decoded as &$item) {
        if (!isset($item['certification-link']) || empty($item['certification-link'])) {
            $item['certification-link'] = '#'; // Default link if not set
        }
    }

    return $decoded ? $decoded : json_decode($default, true); // Return decoded items or default if empty
}





// Debugging Output
// This will output the certifications settings in the footer for debugging purposes
// Remove this in production

add_action('wp_footer', function() {
    echo '<!-- Certifications Debug: ';
    print_r([
        'title' => get_theme_mod('certifications_title'),
        'items' => json_decode(get_theme_mod('maxoliv_certifications_items', '[]'), true)
    ]);
    echo ' -->';
});


// Enqueue certification JS
function maxoliv_enqueue_certifications_js() {
    wp_enqueue_script(
        'maxoliv-certifications',
        get_template_directory_uri() . '/assets/js/certifications-widget.js',
        array(),
        filemtime(get_template_directory() . '/assets/js/certifications-widget.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'maxoliv_enqueue_certifications_js');






/**
 * Testimonials Customizer Settings
 */
function maxoliv_testimonials_customizer($wp_customize) {
    // Testimonials Section
    $wp_customize->add_section('maxoliv_testimonials', [
        'title'    => __('Testimonials', 'maxoliv'),
        'priority' => 45,
    ]);

    // Background Color
    $wp_customize->add_setting('testimonials_bg_color', [
        'default'           => '#fd8e8e',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ]);
    
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'testimonials_bg_color_control',
        [
            'label'    => __('Background Color', 'maxoliv'),
            'section'  => 'maxoliv_testimonials',
            'settings' => 'testimonials_bg_color'
        ]
    ));

    // Testimonials Repeater
    $wp_customize->add_setting('maxoliv_testimonials_items', [
        'default'           => json_encode([
            [
                'text'   => __('This is an amazing experience! The design is stunning, and the UX is smooth.', 'maxoliv'),
                'author' => __('John Doe', 'maxoliv'),
                'image' => ''
            ],
            [
                'text'   => __('One of the best web experiences I\'ve had. Highly recommended!', 'maxoliv'),
                'author' => __('Jane Smith', 'maxoliv'),
                'image' => ''
            ],
            [
                'text'   => __('This is an amazing experience!', 'maxoliv'),
                'author' => __('John Doe', 'maxoliv'),
                'image' => ''
            ]
        ]),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'maxoliv_sanitize_testimonials'
    ]);
    
    // $wp_customize->add_control('maxoliv_testimonials_items_control', [
    //     'label'       => __('Testimonials', 'maxoliv'),
    //     'description' => __('Add testimonials in JSON format', 'maxoliv'),
    //     'section'     => 'maxoliv_testimonials',
    //     'settings'    => 'maxoliv_testimonials_items',
    //     'type'        => 'textarea'
    // ]);

    $wp_customize->add_control(new Maxoliv_Testimonials_Control(
        $wp_customize,
        'maxoliv_testimonials_items_control',
        [
            'label'       => __('Testimonials', 'maxoliv'),
            'section'     => 'maxoliv_testimonials',
            'settings'    => 'maxoliv_testimonials_items'
        ]
    ));
}
add_action('customize_register', 'maxoliv_testimonials_customizer');



/**
 * Custom Testimonials Control Class
 */
if (class_exists('WP_Customize_Control')) {
    class Maxoliv_Testimonials_Control extends WP_Customize_Control {
        public function render_content() {
            ?>
            <label>
                <?php if (!empty($this->label)) : ?>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php endif; ?>
                
                <div class="maxoliv-testimonials-repeater">
                    <div class="testimonials-container" data-repeater-list="maxoliv_testimonials_items">
                        <?php
                        $value = json_decode($this->value(), true);
                        if (empty($value)) {
                            $value = [
                                ['text' => '', 'author' => '', 'image' => '']
                            ];
                        }
                        
                        foreach ($value as $index => $testimonial) : ?>
                            <div class="testimonial-item" data-repeater-item>
                                <textarea class="widefat" name="text" placeholder="<?php esc_attr_e('Testimonial text', 'maxoliv'); ?>"><?php echo esc_textarea($testimonial['text'] ?? ''); ?></textarea>
                                
                                <input type="text" class="widefat" name="author" placeholder="<?php esc_attr_e('Author name', 'maxoliv'); ?>" value="<?php echo esc_attr($testimonial['author'] ?? ''); ?>">
                                
                                <div class="testimonial-image-upload">
                                    <div class="image-preview" style="<?php echo !empty($testimonial['image']) ? 'display:block;' : ''; ?>">
                                        <?php if (!empty($testimonial['image'])) : ?>
                                            <img src="<?php echo esc_url($testimonial['image']); ?>" style="max-width:100px;">
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" class="image-url" name="image" value="<?php echo esc_url($testimonial['image'] ?? ''); ?>">
                                    <button type="button" class="button upload-image-button"><?php esc_html_e('Upload Image', 'maxoliv'); ?></button>
                                    <button type="button" class="button remove-image-button" style="<?php echo empty($testimonial['image']) ? 'display:none;' : ''; ?>"><?php esc_html_e('Remove', 'maxoliv'); ?></button>
                                </div>
                                
                                <button type="button" class="button button-remove" data-repeater-delete><?php esc_html_e('Remove', 'maxoliv'); ?></button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="button button-primary" data-repeater-create><?php esc_html_e('Add Testimonial', 'maxoliv'); ?></button>
                </div>
                
                <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>">
            </label>
            <?php
        }
        
        public function enqueue() {
            wp_enqueue_media();
            wp_enqueue_script(
                'maxoliv-testimonials-customizer',
                get_template_directory_uri() . '/assets/js/testimonials-customizer.js',
                array('jquery', 'customize-controls', 'jquery-ui-sortable'),
                filemtime(get_template_directory() . '/assets/js/testimonials-customizer.js'),
                true
            );
            
            wp_enqueue_style(
                'maxoliv-testimonials-customizer',
                get_template_directory_uri() . '/assets/css/testimonials-customizer.css',
                array(),
                filemtime(get_template_directory() . '/assets/css/testimonials-customizer.css')
            );
        }
    }
}


/**
 * Sanitize Testimonials
 */
function maxoliv_sanitize_testimonials($input) {
    $decoded = json_decode($input, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        $sanitized = [];
        foreach ($decoded as $item) {
            $sanitized[] = [
                'text'   => wp_kses_post($item['text'] ?? ''),
                'author' => sanitize_text_field($item['author'] ?? ''),
                'image' => esc_url_raw($item['image']?? '')
            ];
        }
        return json_encode($sanitized);
    }
    return '';
}



/*** Get Testimonials Data****/
function maxoliv_get_testimonials() {
    $default = json_encode([
        [
            'text'   => __('This is an amazing experience! The design is stunning, and the UX is smooth.', 'maxoliv'),
            'author' => __('John Doe', 'maxoliv'),
            'image' =>  get_theme_file_uri('/assets/images/ali.jpg')

        ],
        [
            'text'   => __('One of the best web experiences I\'ve had. Highly recommended!', 'maxoliv'),
            'author' => __('Jane Smith', 'maxoliv'),
            'image' => get_theme_file_uri('/assets/images/chinese-investor.jpeg')

        ],
        [
            'text'   => __('This is an amazing experience!', 'maxoliv'),
            'author' => __('John Doe', 'maxoliv'),
            'image' => get_theme_file_uri('/assets/images/lawyer.webp')

        ]
    ]);
    
    $items = get_theme_mod('maxoliv_testimonials_items', $default);
    $decoded = json_decode($items, true);
    
    // Validate each testimonial
    foreach ($decoded as &$item) {
        $item['text'] = isset($item['text']) ? wp_kses_post($item['text']) : '';
        $item['author'] = isset($item['author']) ? sanitize_text_field($item['author']) : '';
        
        // Handle image paths
        if (isset($item['image'])) {
            // If it's a relative path, convert to full URL
            if (strpos($item['image'], '/') === 0 && strpos($item['image'], '//') !== 0) {
                $item['image'] = get_theme_file_uri($item['image']);
            }
            $item['image'] = esc_url($item['image']);
        } else {
            $item['image'] = '';
        }
    }
    
    return $decoded;
}




/**
 * Enqueue Testimonials Assets
 */
function maxoliv_enqueue_testimonials_assets() {
    // Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css',
        array(),
        '9.0.0'
    );
    
    // Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js',
        array(),
        '9.0.0',
        true
    );
    
    // Custom Testimonials JS
    wp_enqueue_script(
        'maxoliv-testimonials',
        get_template_directory_uri() . '/assets/js/testimonials.js',
        array('swiper-js'),
        filemtime(get_template_directory() . '/assets/js/testimonials.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'maxoliv_enqueue_testimonials_assets');




// ******************Animations****************

function maxoliv_enqueue_animations() {
    // CSS
    wp_enqueue_style(
        'maxoliv-animations',
        get_template_directory_uri() . '/assets/css/animations.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/animations.css')
    );
    
    // JS
    wp_enqueue_script(
        'maxoliv-animations',
        get_template_directory_uri() . '/assets/js/animations.js',
        array(),
        filemtime(get_template_directory() . '/assets/js/animations.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'maxoliv_enqueue_animations');




// ***********Typewriter Animation*********
function maxoliv_enqueue_typewriter_script() {
    wp_enqueue_script(
        'typewriter-js',
        'https://unpkg.com/typewriter-effect@2.18.1/dist/core.js',
        array(),
        null,
        true
    );

    // Your custom JS (we’ll create it in Step 3)
    wp_enqueue_script(
        'maxoliv-typewriter-init',
        get_template_directory_uri() . '/assets/js/typewriter-init.js',
        array('typewriter-js'),
        null,
        true
    );

    // Pass the PHP values to JS
    $phrases = array_filter([
        get_theme_mod('typewriter_phrase_1'),
        get_theme_mod('typewriter_phrase_2'),
        get_theme_mod('typewriter_phrase_3'),
    ]);

    wp_localize_script('maxoliv-typewriter', 'typewriterData', [
        'phrases' => array_values($phrases),
    ]);
}
add_action('wp_enqueue_scripts', 'maxoliv_enqueue_typewriter_script');


// ***************Typewriter Customizer*************

function maxoliv_customize_register($wp_customize) {
    // Section
    $wp_customize->add_section('typewriter_text_section', array(
        'title'    => __('Typewriter Phrases', 'maxolivtextdomain'),
        'priority' => 30,
    ));

    // Settings and Controls for each phrase (you can add more)
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("typewriter_phrase_$i", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("typewriter_phrase_$i", array(
            'label'    => sprintf(__('Phrase %d', 'maxolivtextdomain'), $i),
            'section'  => 'typewriter_text_section',
            'type'     => 'text',
            'priority' => $i,
        ));
    }
}
add_action('customize_register', 'maxoliv_customize_register');

function maxoliv_localize_typewriter_phrases() {
    $phrases = array();

    for ($i = 1; $i <= 3; $i++) {
        $phrases[] = get_theme_mod("typewriter_phrase_$i", '');
    }

    wp_localize_script('maxoliv-typewriter-init', 'typewriterPhrases', $phrases);
}
add_action('wp_enqueue_scripts', 'maxoliv_localize_typewriter_phrases');



// function maxoliv_customize_register_typewriter($wp_customize) {
//     $wp_customize->add_section('typewriter_section', array(
//         'title' => __('Typewriter Text', 'maxolivtextdomain'),
//         'priority' => 31,
//     ));

//     for ($i = 1; $i <= 3; $i++) {
//         $wp_customize->add_setting("typewriter_phrase_{$i}", array(
//             'default' => '',
//             'sanitize_callback' => 'sanitize_text_field',
//         ));

//         $wp_customize->add_control("typewriter_phrase_{$i}_control", array(
//             'label' => __("Typewriter Phrase {$i}", 'maxolivtextdomain'),
//             'section' => 'typewriter_section',
//             'settings' => "typewriter_phrase_{$i}",
//             'type' => 'text',
//         ));
//     }
// }
// add_action('customize_register', 'maxoliv_customize_register_typewriter');


