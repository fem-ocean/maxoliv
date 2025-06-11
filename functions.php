<?php




// Debugging: Confirm file is loaded
add_action('init', function() {
    error_log('Theme functions.php loaded');
});

add_action('wp_head', function() {
    echo '<!-- Theme is active -->';
});

add_action('wp_head', function() {
    echo '<!-- Template directory: ' . get_template_directory() . ' -->';
    echo '<!-- Stylesheet URI: ' . get_stylesheet_uri() . ' -->';
});

function maxoliv_styles() {
    // Debugging: Confirm function is called
    error_log('maxoliv_styles() function executing');
    
    // Get current theme version from style.css
    $theme_version = wp_get_theme()->get('Version');
    
    
    // 1. Main stylesheet (style.css) - required for theme metadata
    wp_enqueue_style(
        'maxoliv-core', // More semantic handle
        get_stylesheet_uri(),
        array(), // No dependencies
        $theme_version
    );

    // 2. Custom CSS - conditionally load with cache-busting
    $custom_css_path = '/assets/css/main.css';
    $custom_css_uri = get_template_directory_uri() . $custom_css_path;
    $custom_css_ver = filemtime(get_template_directory() . $custom_css_path);

    if (file_exists(get_template_directory() . $custom_css_path)) {
        wp_enqueue_style(
            'maxoliv-custom', // Consistent naming
            $custom_css_uri,
            array('maxoliv-core'), // Depends on core styles
            $custom_css_ver // File modification time for cache busting
        );
        
        // Debugging (only in development)
        if (WP_DEBUG) {
            error_log('[Theme] Custom CSS loaded: ' . $custom_css_uri);
        }
    } elseif (WP_DEBUG) {
        error_log('[Theme] Custom CSS not found: ' . $custom_css_path);
    }

    // 3. Google Fonts
    wp_enqueue_style(
        'maxoliv-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap',
        array(),
        null
    );



}
add_action('wp_enqueue_scripts', 'maxoliv_styles', 10);
    


add_action('wp_footer', function() {
    echo '<div style="position:fixed; bottom:10px; right:10px; background:green; color:white; padding:5px; z-index:9999;">
            Global CSS Loaded ✔️
          </div>';
});


// Basic theme support
add_theme_support('title-tag');
add_theme_support('post-thumbnails');



// Add mobile detection
function wp_is_mobile_viewport() {
    // Check if we're in a customizer preview
    if (is_customize_preview()) {
        return false;
    }
    
    // Check the actual viewport width
    return (isset($_SERVER['HTTP_USER_AGENT']) && 
           preg_match('/\b(Android|iPhone|iPad|iPod|Windows Phone)\b/i', $_SERVER['HTTP_USER_AGENT']));
}



function maxoliv_scripts() {
    // ... existing styles ...
    
    // Main body interactions
    wp_enqueue_script(
        'main-body-js',
        get_template_directory_uri() . '/assets/js/main-body.js',
        array('jquery'),
        filemtime(get_template_directory() . '/assets/js/main-body.js'),
        true
    );
    
    // Localize script data if needed
    wp_localize_script('main-body-js', 'portfolioData', array(
        'isMobile' => wp_is_mobile() || wp_is_mobile_viewport()
    ));
}






// Add background image control to Customizer
function maxoliv_customize_register($wp_customize) {
    // Background Image Setting
    $wp_customize->add_setting('rightpanel_background_image', array(
        'default' => get_template_directory_uri() . '/assets/images/mypicsedited2.jpg',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'rightpanel_background_image_control',
        array(
            'label' => __('Right Panel Background', 'yourthemetextdomain'),
            'description' => __('Recommended size: 1920x1080px', 'yourthemetextdomain'),
            'section' => 'colors',
            'settings' => 'rightpanel_background_image'
        )
    ));
    
    // Overlay Color Setting
    $wp_customize->add_setting('rightpanel_overlay_color', array(
        'default' => 'rgba(253, 142, 142, 0.3)',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'rightpanel_overlay_color_control',
        array(
            'label' => __('Overlay Color', 'yourthemetextdomain'),
            'section' => 'colors',
            'settings' => 'rightpanel_overlay_color'
        )
    ));
}
add_action('customize_register', 'maxoliv_customize_register');

// Enqueue dynamic CSS
function maxoliv_dynamic_css() {
    $bg_image = esc_url(get_theme_mod('rightpanel_background_image', get_template_directory_uri() . '/assets/images/mypicsedited2.jpg'));
    $overlay_color = esc_attr(get_theme_mod('rightpanel_overlay_color', 'rgba(253, 142, 142, 0.3)'));
    ?>
    <style type="text/css">
        .background-layer {
            background: url('<?php echo $bg_image; ?>') no-repeat center center/cover;
        }
        .overlay {
            background-color: <?php echo $overlay_color; ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'maxoliv_dynamic_css');