<?php
function coming_soon_event_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh))
    {
        $wp_customize
            ->selective_refresh
            ->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'coming_soon_event_customize_partial_blogname',
        ));
        $wp_customize
            ->selective_refresh
            ->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'coming_soon_customize_partial_blogdescription',
        ));
    }
    $wp_customize->add_setting('coming_soon_event_show_site_title', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox'
    ));
    $wp_customize->add_control('coming_soon_event_show_site_title', array(
        'type' => 'checkbox',
        'label' => esc_html__('Show / Hide Site Title', 'coming-soon-event') ,
        'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('coming_soon_event_show_tagline', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox'
    ));
    $wp_customize->add_control('coming_soon_event_show_tagline', array(
        'type' => 'checkbox',
        'label' => esc_html__('Show / Hide Site Tagline', 'coming-soon-event') ,
        'section' => 'title_tagline'
    ));

    /**
     * Coming Soon site Theme Options Panel
     */
    $wp_customize->add_panel('coming_soon_theme_options', array(
        'title' => esc_html__('Coming Soon Event Settings', 'coming-soon-event') ,
        'priority' => 1,
    ));

    //Social Icon Section
    $wp_customize->add_section('coming_soon_event_banner_image_section', array(
        'title' => esc_html__('Coming Soon Event Banner Image Setting', 'coming-soon-event') ,
        'panel' => 'coming_soon_theme_options',
        'priority' => 10
    ));

    $wp_customize->add_setting('coming_soon_event_banner_image_setting', array(
        'default' => get_theme_file_uri('/assets/images/hero-bg.jpg') , // Add Default Image URL
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'coming_soon_event_banner_image_control', array(
        'label' => esc_html__('Upload Banner Image', 'coming-soon-event'),
        'priority' => 20,
        'section' => 'coming_soon_event_banner_image_section',
        'settings' => 'coming_soon_event_banner_image_setting',
        'button_labels' => array( // All These labels are optional
            'select' => 'Select Image',
            'remove' => 'Remove Image',
            'change' => 'Change Image',
        )
    )));

    //Social Icon Section
    $wp_customize->add_section('coming_soon_event_social_icon_section', array(
        'title' => esc_html__('Coming Soon Event Social Icon Setting', 'coming-soon-event') ,
        'panel' => 'coming_soon_theme_options',
        'priority' => 10
    ));

    // Social Icon Display Control
    $wp_customize->add_setting('coming_soon_event_social_icon_display', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_social_icon_display', array(
        'label' => esc_html__('Display Social Icons', 'coming-soon-event') ,
        'section' => 'coming_soon_event_social_icon_section',
        'priority' => 4,
        'type' => 'checkbox'
    ));

    // Social URL Target Display Control
    $wp_customize->add_setting('coming_soon_event_social_icon_target_display', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_social_icon_target_display', array(
        'label' => esc_html__('Display Social URL in new Window', 'coming-soon-event') ,
        'section' => 'coming_soon_event_social_icon_section',
        'priority' => 5,
        'type' => 'checkbox',
        'active_callback' => 'coming_soon_event_social_active_callback'
    ));

    // Facebook URL
    $wp_customize->add_setting('coming_soon_event_social_icon_fb_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('coming_soon_event_social_icon_fb_url', array(
        'label' => esc_html__('Facebook URL', 'coming-soon-event') ,
        'section' => 'coming_soon_event_social_icon_section',
        'priority' => 6,
        'type' => 'url',
        'active_callback' => 'coming_soon_event_social_active_callback'
    ));

    // Twitter URL
    $wp_customize->add_setting('coming_soon_event_social_icon_twitter_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('coming_soon_event_social_icon_twitter_url', array(
        'label' => esc_html__('Twitter URL', 'coming-soon-event') ,
        'section' => 'coming_soon_event_social_icon_section',
        'priority' => 7,
        'type' => 'url',
        'active_callback' => 'coming_soon_event_social_active_callback'
    ));

    // Instagram URL
    $wp_customize->add_setting('coming_soon_event_social_icon_instagram_url', array(
        'default' => '',

        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('coming_soon_event_social_icon_instagram_url', array(
        'label' => esc_html__('Instagram URL', 'coming-soon-event') ,
        'section' => 'coming_soon_event_social_icon_section',
        'priority' => 8,
        'type' => 'url',
        'active_callback' => 'coming_soon_event_social_active_callback'
    ));

    // Youtube URL
    $wp_customize->add_setting('coming_soon_event_social_icon_youtube_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('coming_soon_event_social_icon_youtube_url', array(
        'label' => esc_html__('YouTube URL', 'coming-soon-event') ,
        'section' => 'coming_soon_event_social_icon_section',
        'priority' => 9,
        'type' => 'url',
        'active_callback' => 'coming_soon_event_social_active_callback'
    ));

    // Pintrest URL
    $wp_customize->add_setting('coming_soon_event_social_icon_pintrest_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('coming_soon_event_social_icon_pintrest_url', array(
        'label' => esc_html__('Pintrest URL', 'coming-soon-event') ,
        'section' => 'coming_soon_event_social_icon_section',
        'priority' => 9,
        'type' => 'url',
        'active_callback' => 'coming_soon_event_social_active_callback'
    ));

    //Countdown Section
    $wp_customize->add_section('coming_soon_event_countdown_section', array(
        'title' => esc_html__('Coming Soon Countdown Setting', 'coming-soon-event') ,
        'panel' => 'coming_soon_theme_options',
        'priority' => 10
    ));

    //Counter Title
    $wp_customize->add_setting('coming_soon_event_title_heading', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_title_heading', array(
        'label' => esc_html__('Enter CountDown Title', 'coming-soon-event') ,
        'section' => 'coming_soon_event_countdown_section',
        'type' => 'text',
        'priority' => 6
    ));

    //Counter Date
    $wp_customize->add_setting('coming_soon_event_date_time', array(
        'default' => esc_html__( '2022-01-01', 'coming-soon-event' ),
        'transport' => 'refresh',
        'sanitize_callback' => 'coming_sooon_event_date_time_sanitization'
    ));

    $wp_customize->add_control(new WP_Customize_Date_Time_Control($wp_customize, 'coming_soon_event_date_time', array(
        'label' => esc_html__('Default Date Control', 'coming-soon-event') ,
        'description' => __('This is the Date Control.', 'coming-soon-event') ,
        'section' => 'coming_soon_event_countdown_section',
        'include_time' => false, // Optional. Default: true
        'allow_past_date' => true, // Optional. Default: true
        'twelve_hour_format' => true, // Optional. Default: true
        'min_year' => '2021', // Optional. Default: 1000
        'max_year' => '2030'
        // Optional. Default: 9999
        
    )));

    //Welcome Section
    $wp_customize->add_section('coming_soon_event_welcome_count_section', array(
        'title' => esc_html__('Coming Soon Event Welcome Setting', 'coming-soon-event') ,
        'panel' => 'coming_soon_theme_options',
        'priority' => 10
    ));

    //Welcome count Title
    $wp_customize->add_setting('coming_soon_event_welcome_title', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_welcome_title', array(
        'label' => esc_html__('Enter Welcome Title', 'coming-soon-event') ,
        'section' => 'coming_soon_event_welcome_count_section',
        'type' => 'text',
        'priority' => 7
    ));

    //Welcome count Content
    $wp_customize->add_setting('coming_soon_event_welcome_content', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_welcome_content', array(
        'label' => esc_html__('Enter Welcome Sub Title', 'coming-soon-event') ,
        'section' => 'coming_soon_event_welcome_count_section',
        'type' => 'text',
        'priority' => 8
    ));

    //Welcome Description
    $wp_customize->add_setting('coming_soon_event_welcome_description', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_welcome_description', array(
        'label' => esc_html__('Enter Welcome Description', 'coming-soon-event') ,
        'section' => 'coming_soon_event_welcome_count_section',
        'type' => 'text',
        'priority' => 8
    ));

    //Contact Info Section
    $wp_customize->add_section('coming_soon_event_info_contact_section', array(
        'title' => esc_html__('Coming Soon Event Contact Info Setting', 'coming-soon-event') ,
        'panel' => 'coming_soon_theme_options',
        'priority' => 10
    ));

    //Contact Info Title
    $wp_customize->add_setting('coming_soon_event_contact_info_title', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_contact_info_title', array(
        'label' => esc_html__('Enter Contact Info Title', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'type' => 'text',
        'priority' => 8
    ));

    //Contact Info Title
    $wp_customize->add_setting('coming_soon_event_contact_info_title', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_contact_info_title', array(
        'label' => esc_html__('Enter Contact Info Title', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'type' => 'text',
        'priority' => 8
    ));

    //Contact Info email
    $wp_customize->add_setting('coming_soon_event_contact_info_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_contact_info_email', array(
        'label' => esc_html__('Enter Email', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'type' => 'text',
        'priority' => 8
    ));

    //Contact Info Contact
    $wp_customize->add_setting('coming_soon_event_contact_info_contact', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_contact_info_contact', array(
        'label' => esc_html__('Enter Contact', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'type' => 'text',
        'priority' => 8
    ));

    //Contact Info Address Title
    $wp_customize->add_setting('coming_soon_event_contact_info_address_title', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_contact_info_address_title', array(
        'label' => esc_html__('Enter Contact Info Address Title', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'type' => 'text',
        'priority' => 8
    ));

    //Contact Info address
    $wp_customize->add_setting('coming_soon_event_contact_info_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_contact_info_address', array(
        'label' => esc_html__('Enter Contact Info Address', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'type' => 'text',
        'priority' => 8
    ));

    //Contact Info find us
    $wp_customize->add_setting('coming_soon_event_contact_info_find_us', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('coming_soon_event_contact_info_find_us', array(
        'label' => esc_html__('Enter Contact Info Social info Title', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'type' => 'text',
        'priority' => 8
    ));

    // Social Icon Display Control
    $wp_customize->add_setting('coming_soon_event_contact_social_icon_display', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_contact_social_icon_display', array(
        'label' => esc_html__('Display Social Icons', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'priority' => 8,
        'type' => 'checkbox'
    ));

    // Social URL Target Display Control
    $wp_customize->add_setting('coming_soon_event_contact_social_icon_target_display', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_contact_social_icon_target_display', array(
        'label' => esc_html__('Display Social URL in new Window', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'priority' => 8,
        'type' => 'checkbox',
        'active_callback' => 'coming_soon_event_contact_social_active_callback'
    ));

    // Facebook URL
    $wp_customize->add_setting('coming_soon_event_find_us_social_icon_fb_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('coming_soon_event_find_us_social_icon_fb_url', array(
        'label' => esc_html__('Facebook URL', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'priority' => 9,
        'type' => 'url',
        'active_callback' => 'coming_soon_event_contact_social_active_callback'
    ));

    // Twitter URL
    $wp_customize->add_setting('coming_soon_event_find_us_social_icon_twitter_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('coming_soon_event_find_us_social_icon_twitter_url', array(
        'label' => esc_html__('Twitter URL', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'priority' => 9,
        'type' => 'url',
        'active_callback' => 'coming_soon_event_contact_social_active_callback'
    ));

    // Instagram URL
    $wp_customize->add_setting('coming_soon_event_find_us_social_icon_instagram_url', array(
        'default' => '',

        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('coming_soon_event_find_us_social_icon_instagram_url', array(
        'label' => esc_html__('Instagram URL', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'priority' => 9,
        'type' => 'url',
        'active_callback' => 'coming_soon_event_contact_social_active_callback'
    ));

    // Youtube URL
    $wp_customize->add_setting('coming_soon_event_find_us_social_icon_youtube_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('coming_soon_event_find_us_social_icon_youtube_url', array(
        'label' => esc_html__('YouTube URL', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'priority' => 9,
        'type' => 'url',
        'active_callback' => 'coming_soon_event_contact_social_active_callback'
    ));

    // Pintrest URL
    $wp_customize->add_setting('coming_soon_event_find_us_social_icon_pintrest_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('coming_soon_event_find_us_social_icon_pintrest_url', array(
        'label' => esc_html__('Pintrest URL', 'coming-soon-event') ,
        'section' => 'coming_soon_event_info_contact_section',
        'priority' => 9,
        'type' => 'url',
        'active_callback' => 'coming_soon_event_contact_social_active_callback'
    ));

    /*Blog Post Options Section*/
    $wp_customize->add_section('coming_soon_event_general_options', array(
        'title' => esc_html__('Coming Soon Event General Options', 'coming-soon-event') ,
        'panel' => 'coming_soon_theme_options',
        'priority' => 10,
        'description' => esc_html__('Personalize the settings of your theme.', 'coming-soon-event') ,
    ));

    // Read More Label
    $wp_customize->add_setting('coming_soon_event_read_more_label', array(
        'default' => esc_html__( 'Read More', 'coming-soon-event' ),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('coming_soon_event_read_more_label', array(
        'label' => esc_html__('Read More Label', 'coming-soon-event') ,
        'section' => 'coming_soon_event_general_options',
        'priority' => 1,
        'type' => 'text',
    ));

    // Excerpt Length
    $wp_customize->add_setting('coming_soon_event_excerpt_length', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('coming_soon_event_excerpt_length', array(
        'label' => esc_html__('Excerpt Length', 'coming-soon-event') ,
        'description' => esc_html__('0 will not show the excerpt.', 'coming-soon-event') ,
        'section' => 'coming_soon_event_general_options',
        'priority' => 2,
        'type' => 'number',
    ));

    /*Blog Post Options*/
    $wp_customize->add_section('coming_soon_event_archive_content_options', array(
        'title' => esc_html__('Coming Soon Event  Blog Post Options', 'coming-soon-event') ,
        'panel' => 'coming_soon_theme_options',
        'priority' => 10,
    ));

    /*======================*/

    // Post Author Display Control
    $wp_customize->add_setting('coming_soon_event_archive_co_post_author', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_archive_co_post_author', array(
        'label' => esc_html__('Display Author', 'coming-soon-event') ,
        'section' => 'coming_soon_event_archive_content_options',
        'priority' => 2,
        'type' => 'checkbox',
    ));

    // Post Date Display Control
    $wp_customize->add_setting('coming_soon_event_archive_co_post_date', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_archive_co_post_date', array(
        'label' => esc_html__('Display Date', 'coming-soon-event') ,
        'section' => 'coming_soon_event_archive_content_options',
        'priority' => 3,
        'type' => 'checkbox',
    ));

    // Featured Image Archive Control
    $wp_customize->add_setting('coming_soon_event_archive_co_featured_image', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_archive_co_featured_image', array(
        'label' => esc_html__('Display Featured Image', 'coming-soon-event') ,
        'section' => 'coming_soon_event_archive_content_options',
        'priority' => 5,
        'type' => 'checkbox',
    ));

    /*Single Post Options*/
    $wp_customize->add_section('coming_soon_event_single_content_options', array(
        'title' => esc_html__('Coming Soon Event  Single Post Options', 'coming-soon-event') ,
        'panel' => 'coming_soon_theme_options',
        'priority' => 10,
        'description' => esc_html__('Setting will apply on the content of single posts.', 'coming-soon-event') ,
    ));

    // Post Author Display Control
    $wp_customize->add_setting('coming_soon_event_single_co_post_author', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_single_co_post_author', array(
        'label' => esc_html__('Display Author', 'coming-soon-event') ,
        'section' => 'coming_soon_event_single_content_options',
        'priority' => 2,
        'type' => 'checkbox',
    ));

    // Post Date Display Control
    $wp_customize->add_setting('coming_soon_event_single_co_post_date', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_single_co_post_date', array(
        'label' => esc_html__('Display Date', 'coming-soon-event') ,
        'section' => 'coming_soon_event_single_content_options',
        'priority' => 3,
        'type' => 'checkbox',
    ));

    // Single Post Tags Display Control
    $wp_customize->add_setting('coming_soon_event_single_co_post_tags', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_single_co_post_tags', array(
        'label' => esc_html__('Display Tags', 'coming-soon-event') ,
        'section' => 'coming_soon_event_single_content_options',
        'priority' => 5,
        'type' => 'checkbox',
    ));

    // Featured Image Post Display Control
    $wp_customize->add_setting('coming_soon_event_single_co_featured_image_post', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_single_co_featured_image_post', array(
        'label' => esc_html__('Display Featured Image', 'coming-soon-event') ,
        'section' => 'coming_soon_event_single_content_options',
        'priority' => 7,
        'type' => 'checkbox',
    ));

    //Sidebar Section
    $wp_customize->add_section('coming_soon_event_sidebar_section', array(
        'title' => esc_html__('Coming Soon Event Sidebar Setting', 'coming-soon-event') ,
        'panel' => 'coming_soon_theme_options',
        'priority' => 10
    ));

    // Main Sidebar Position
    $wp_customize->add_setting('coming_soon_event_sidebar_position', array(
        'default' => esc_html__( 'right', 'coming-soon-event' ),
        'sanitize_callback' => 'coming_soon_event_sanitize_select',
    ));

    $wp_customize->add_control('coming_soon_event_sidebar_position', array(
        'label' => esc_html__('Sidebar Position', 'coming-soon-event') ,
        'section' => 'coming_soon_event_sidebar_section',
        'priority' => 2,
        'type' => 'select',
        'choices' => array(
            'right' => esc_html__('Right Sidebar', 'coming-soon-event') ,
            'left' => esc_html__('Left Sidebar', 'coming-soon-event') ,
            'no' => esc_html__('No Sidebar', 'coming-soon-event') ,
        ) ,
    ));

    //Footer Section
    $wp_customize->add_section('coming_soon_event_footer_section', array(
        'title' => esc_html__('Coming Soon Event Footer Setting', 'coming-soon-event') ,
        'panel' => 'coming_soon_theme_options',
        'priority' => 10
    ));

    //Footer bottom Copyright Display Control
    $wp_customize->add_setting('coming_soon_event_footer_copyright_display', array(
        'default' => true,
        'sanitize_callback' => 'coming_soon_event_sanitize_checkbox',
    ));

    $wp_customize->add_control('coming_soon_event_footer_copyright_display', array(
        'label' => esc_html__('Display Copyright Footer', 'coming-soon-event') ,
        'section' => 'coming_soon_event_footer_section',
        'priority' => 1,
        'type' => 'checkbox',
    ));

    // Copyright Control
    $wp_customize->add_setting('coming_soon_event_copyright', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('coming_soon_event_copyright', array(
        'label' => esc_html__('Copyright', 'coming-soon-event') ,
        'section' => 'coming_soon_event_footer_section',
        'priority' => 2,
        'type' => 'text',
        'active_callback' => 'coming_soon_event_footer_copyright_callback'
    ));

}
add_action('customize_register', 'coming_soon_event_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function coming_soon_event_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function coming_soon_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function coming_soon_customize_preview_js()
{
    wp_enqueue_script('coming-soon-event-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array(
        'customize-preview'
    ) , _COMING_SOON_EVENT_VERSION, true);
}
add_action('customize_preview_init', 'coming_soon_customize_preview_js');
/*callback function for top header section*/

if (!function_exists('coming_soon_event_social_active_callback')):
    function coming_soon_event_social_active_callback()
    {
        $show_social = get_theme_mod('coming_soon_event_social_icon_display', true);

        if ($show_social)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
endif;

if (!function_exists('coming_soon_event_footer_copyright_callback')):
    function coming_soon_event_footer_copyright_callback()
    {

        $show_copyright = get_theme_mod('coming_soon_event_footer_copyright_display', true);

        if (true == $show_copyright)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
endif;

if (!function_exists('coming_soon_event_contact_social_active_callback')):
    function coming_soon_event_contact_social_active_callback()
    {
        $show_social = get_theme_mod('coming_soon_event_contact_social_icon_display', true);

        if ($show_social)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
endif;