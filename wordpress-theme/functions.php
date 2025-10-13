<?php
/*
Theme Name: Rhyconnect
Description: Custom WordPress theme for Rhyconnect - Die Party App. Modern, responsive design with beautiful Rhein-blue colors.
Version: 1.0
Author: Rhyconnect Team
*/

// Theme Setup
function rhyconnect_theme_setup() {
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add theme support for custom logos
    add_theme_support('custom-logo');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));
}
add_action('after_setup_theme', 'rhyconnect_theme_setup');

// Create legal pages on theme activation
function rhyconnect_create_legal_pages() {
    // Create Datenschutz page
    $datenschutz = get_page_by_path('datenschutz');
    if (!$datenschutz) {
        wp_insert_post(array(
            'post_title' => 'Datenschutz',
            'post_name' => 'datenschutz',
            'post_content' => 'Diese Seite wird automatisch durch das Template page-datenschutz.php erstellt.',
            'post_status' => 'publish',
            'post_type' => 'page'
        ));
    }

    // Create AGB page
    $agb = get_page_by_path('agb');
    if (!$agb) {
        wp_insert_post(array(
            'post_title' => 'AGB',
            'post_name' => 'agb', 
            'post_content' => 'Diese Seite wird automatisch durch das Template page-agb.php erstellt.',
            'post_status' => 'publish',
            'post_type' => 'page'
        ));
    }

    // Create Impressum page
    $impressum = get_page_by_path('impressum');
    if (!$impressum) {
        wp_insert_post(array(
            'post_title' => 'Impressum',
            'post_name' => 'impressum',
            'post_content' => 'Diese Seite wird automatisch durch das Template page-impressum.php erstellt.',
            'post_status' => 'publish',
            'post_type' => 'page'
        ));
    }
}
add_action('after_switch_theme', 'rhyconnect_create_legal_pages');

// Enqueue styles and scripts
function rhyconnect_scripts() {
    // Main stylesheet
    wp_enqueue_style('rhyconnect-style', get_stylesheet_uri());
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    // Main JavaScript
    wp_enqueue_script('rhyconnect-script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'rhyconnect_scripts');

// Custom post type for Team Members
function create_team_post_type() {
    register_post_type('team_member',
        array(
            'labels' => array(
                'name' => 'Team Members',
                'singular_name' => 'Team Member'
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-groups'
        )
    );
}
add_action('init', 'create_team_post_type');

// Add custom fields for team members
function add_team_member_meta_boxes() {
    add_meta_box(
        'team_member_details',
        'Team Member Details',
        'team_member_meta_box_callback',
        'team_member'
    );
}
add_action('add_meta_boxes', 'add_team_member_meta_boxes');

function team_member_meta_box_callback($post) {
    wp_nonce_field('save_team_member_data', 'team_member_nonce');
    
    $role = get_post_meta($post->ID, '_team_member_role', true);
    $bio = get_post_meta($post->ID, '_team_member_bio', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="team_member_role">Role</label></th>';
    echo '<td><input type="text" id="team_member_role" name="team_member_role" value="' . esc_attr($role) . '" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="team_member_bio">Bio</label></th>';
    echo '<td><textarea id="team_member_bio" name="team_member_bio" rows="3" cols="50">' . esc_textarea($bio) . '</textarea></td>';
    echo '</tr>';
    echo '</table>';
}

function save_team_member_data($post_id) {
    if (!isset($_POST['team_member_nonce']) || !wp_verify_nonce($_POST['team_member_nonce'], 'save_team_member_data')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (isset($_POST['team_member_role'])) {
        update_post_meta($post_id, '_team_member_role', sanitize_text_field($_POST['team_member_role']));
    }
    
    if (isset($_POST['team_member_bio'])) {
        update_post_meta($post_id, '_team_member_bio', sanitize_textarea_field($_POST['team_member_bio']));
    }
}
add_action('save_post', 'save_team_member_data');

// Customizer options
function rhyconnect_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => 'Hero Section',
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Erlebe Partys neu',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => 'Hero Title',
        'section' => 'hero_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Rhyconnect verbindet Menschen auf Events und macht jede Party unvergesslich. Die innovative App für echte Verbindungen.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => 'Hero Subtitle',
        'section' => 'hero_section',
        'type' => 'textarea',
    ));
    
    // App Screenshot Upload
    $wp_customize->add_setting('app_screenshot', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_screenshot', array(
        'label' => 'App Screenshot 1',
        'description' => 'Erstes App-Screenshot (empfohlen: 270x480px)',
        'section' => 'hero_section',
    )));
    
    $wp_customize->add_setting('app_screenshot_2', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_screenshot_2', array(
        'label' => 'App Screenshot 2',
        'description' => 'Zweites App-Screenshot (optional)',
        'section' => 'hero_section',
    )));
    
    $wp_customize->add_setting('app_screenshot_3', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_screenshot_3', array(
        'label' => 'App Screenshot 3',
        'description' => 'Drittes App-Screenshot (optional)',
        'section' => 'hero_section',
    )));
    
    $wp_customize->add_setting('app_screenshot_4', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_screenshot_4', array(
        'label' => 'App Screenshot 4',
        'description' => 'Viertes App-Screenshot (optional)',
        'section' => 'hero_section',
    )));
    
    $wp_customize->add_setting('app_screenshot_5', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_screenshot_5', array(
        'label' => 'App Screenshot 5',
        'description' => 'Fünftes App-Screenshot (optional)',
        'section' => 'hero_section',
    )));
    
    $wp_customize->add_setting('app_screenshot_6', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_screenshot_6', array(
        'label' => 'App Screenshot 6',
        'description' => 'Sechstes App-Screenshot (optional)',
        'section' => 'hero_section',
    )));
    
    $wp_customize->add_setting('app_screenshot_7', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_screenshot_7', array(
        'label' => 'App Screenshot 7',
        'description' => 'Siebtes App-Screenshot (optional)',
        'section' => 'hero_section',
    )));
    
    $wp_customize->add_setting('app_screenshot_8', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_screenshot_8', array(
        'label' => 'App Screenshot 8',
        'description' => 'Achtes App-Screenshot (optional)',
        'section' => 'hero_section',
    )));
    
    $wp_customize->add_setting('app_screenshot_9', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_screenshot_9', array(
        'label' => 'App Screenshot 9',
        'description' => 'Neuntes App-Screenshot (optional)',
        'section' => 'hero_section',
    )));
    
    $wp_customize->add_setting('app_screenshot_10', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_screenshot_10', array(
        'label' => 'App Screenshot 10',
        'description' => 'Zehntes App-Screenshot (optional)',
        'section' => 'hero_section',
    )));
    
    // Social Media Links
    $wp_customize->add_section('social_media', array(
        'title' => 'Social Media',
        'priority' => 40,
    ));
    
    $wp_customize->add_setting('instagram_url', array(
        'default' => 'https://instagram.com/rhyconnect',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('instagram_url', array(
        'label' => 'Instagram URL',
        'section' => 'social_media',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('facebook_url', array(
        'default' => 'https://facebook.com/rhyconnect',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('facebook_url', array(
        'label' => 'Facebook URL',
        'section' => 'social_media',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('tiktok_url', array(
        'default' => 'https://tiktok.com/@rhyconnect',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('tiktok_url', array(
        'label' => 'TikTok URL',
        'section' => 'social_media',
        'type' => 'url',
    ));
}
add_action('customize_register', 'rhyconnect_customize_register');

// Contact form shortcode
function rhyconnect_contact_form() {
    ob_start();
    ?>
    <div class="contact-form">
        <form id="rhyconnect-contact-form" method="post" action="">
            <?php wp_nonce_field('rhyconnect_contact_form', 'contact_nonce'); ?>
            <div class="form-group">
                <input type="text" name="contact_name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="contact_email" placeholder="E-Mail" required>
            </div>
            <div class="form-group">
                <textarea name="contact_message" placeholder="Nachricht" rows="5" required></textarea>
            </div>
            <button type="submit" name="submit_contact" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i>
                Nachricht senden
            </button>
        </form>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('contact_form', 'rhyconnect_contact_form');

// Handle contact form submission
function handle_contact_form_submission() {
    if (isset($_POST['submit_contact']) && wp_verify_nonce($_POST['contact_nonce'], 'rhyconnect_contact_form')) {
        $name = sanitize_text_field($_POST['contact_name']);
        $email = sanitize_email($_POST['contact_email']);
        $message = sanitize_textarea_field($_POST['contact_message']);
        
        $to = get_option('admin_email');
        $subject = 'Neue Kontaktanfrage von ' . $name;
        $body = "Name: $name\nE-Mail: $email\n\nNachricht:\n$message";
        $headers = array('Content-Type: text/plain; charset=UTF-8');
        
        if (wp_mail($to, $subject, $body, $headers)) {
            echo '<script>alert("Vielen Dank für deine Nachricht! Wir melden uns bald bei dir.");</script>';
        } else {
            echo '<script>alert("Es gab ein Problem beim Senden deiner Nachricht. Bitte versuche es später erneut.");</script>';
        }
    }
}
add_action('init', 'handle_contact_form_submission');
?>