<?php
if (!defined('_COMING_SOON_EVENT_VERSION'))
{
    // Replace the version number of the theme on each release.
    define('_COMING_SOON_EVENT_VERSION', '1.0.0');
}

if (!function_exists('coming_soon_event_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function coming_soon_event_setup()
    {

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
        */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        add_theme_support('starter-content');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary-menu' => esc_html__('Primary', 'coming-soon-event')
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
        */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('coming-soon-event_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'coming_soon_event_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function coming_soon_event_content_width()
{
    $GLOBALS['content_width'] = apply_filters('coming_soon_event_content_width', 640);
}
add_action('after_setup_theme', 'coming_soon_event_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function coming_soon_event_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'coming-soon-event') ,
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'coming-soon-event') ,
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'coming_soon_event_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function coming_soon_event_scripts()
{
    wp_enqueue_style('coming-soon-event-style', get_stylesheet_uri() , array() , _COMING_SOON_EVENT_VERSION);

    //CSS
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style('font-awesome_css', get_template_directory_uri() . '/assets/css/font-awesome.css');

    wp_enqueue_style('coming_soon_event_responsive_css', get_template_directory_uri() . '/assets/css/responsive.css');

    wp_enqueue_style('coming_soon_event_custom_css', get_template_directory_uri() . '/assets/css/custom.css');

    wp_enqueue_style('coming-soon-event-font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

    //JS
    wp_enqueue_script('bootstrap.js', get_template_directory_uri() . '/assets/js/bootstrap.js', array(
        'jquery'
    ) , _COMING_SOON_EVENT_VERSION, true);

    /*=====================================Pace JS===========================================*/
    wp_enqueue_script('pace.js', get_template_directory_uri() . '/assets/js/pace.js', array(
        'jquery'
    ) , _COMING_SOON_EVENT_VERSION, true);

    /*=====================================Plugins JS===========================================*/
    wp_enqueue_script('coming_soon_event_plugins.js', get_template_directory_uri() . '/assets/js/plugins.js', array() , _COMING_SOON_EVENT_VERSION, true);

    /*=====================================Navigation JS===========================================*/
    wp_enqueue_script('coming_soon_event_navigation.js', get_template_directory_uri() . '/assets/js/navigation.js', array() , _COMING_SOON_EVENT_VERSION, true);

    /*=====================================Custom JS===========================================*/
    wp_enqueue_script('coming_soon_event_main.js', get_template_directory_uri() . '/assets/js/coming-soon-event-main.js', array() , _COMING_SOON_EVENT_VERSION, true);

    if (is_singular()) wp_enqueue_script("comment-reply");
}
add_action('wp_enqueue_scripts', 'coming_soon_event_scripts');

function coming_soon_event_excerpt_more($more)
{

    $more = '...';
    if (is_admin())
    {
        return $more;
    }

}
add_filter('excerpt_more', 'coming_soon_event_excerpt_more');

function coming_soon_event_theme_customize_js()
{
    $countdownDate = get_theme_mod('coming_soon_event_date_time',esc_html__( '2022-01-01', 'coming-soon-event' ));
?>
    <script type="text/javascript">
	/* final countdown
	* ------------------------------------------------------ */
	jQuery(document).ready(function(e){

	    var finalDate ='<?php echo esc_html($countdownDate); ?>';
	    jQuery('.home-content__clock').countdown(finalDate)
	    .on('update.countdown finish.countdown', function(event) {

	        var str = '<div class=\"top\"><div class=\"time days\">' +
	                  '%D <span>day%!D</span>' + 
	                  '</div></div>' +
	                  '<div class=\"time hours\">' +
	                  '%H <span>H</span></div>' +
	                  '<div class=\"time minutes\">' +
	                  '%M <span>M</span></div>' +
	                  '<div class=\"time seconds\">' +
	                  '%S <span>S</span></div>';

	        jQuery(this)
	        .html(event.strftime(str));

	         });
	    });
    </script>
  <?php
}

add_action('wp_print_footer_scripts', 'coming_soon_event_theme_customize_js');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/controls.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-tags.php';

if (is_admin()) {
	require get_template_directory() . '/admin/admin.php';
}
/**
 * Customizer Upgrade to additional Section.
 */
require get_template_directory() . '/inc/upsell/class-customize.php';
require get_template_directory()  . '/inc/tgm/class-tgm-plugin-activation.php';
require get_template_directory(). '/inc/tgm/hook-tgm.php';