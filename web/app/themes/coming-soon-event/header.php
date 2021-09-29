<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}	?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php echo esc_html__( 'Skip to content', 'coming-soon-event' ); ?></a>
	<?php if (!(is_page_template( 'template/ComingSoonPage.php' ))) { ?>
	<?php $has_header_image = has_header_image();?>
    <header id="masthead">
        <div class="wp-header" <?php if (!empty($has_header_image)) { ?> style="background-image: url(<?php echo esc_url(header_image()); ?>); background-size: cover;" <?php } ?>>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                        <div class="logo">
                            <?php if ( has_custom_logo() ) : ?>
                                <div class="site-logo"><?php the_custom_logo(); ?></div>
                            <?php endif; ?>
                            <?php if (get_theme_mod('coming_soon_event_show_site_title',true)) {?>
                                <?php $blog_info = get_bloginfo( 'name' ); ?>
                                <?php if ( ! empty( $blog_info ) ) : ?>
                                    <?php if ( is_front_page() && is_home() ) : ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>
                                    <?php else : ?>
                                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php }?>
                            <?php if (get_theme_mod('coming_soon_event_show_tagline',true)) {?>
                                <?php
                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) :
                                  ?>
                                    <p class="site-description">
                                        <?php echo esc_html($description); ?>
                                    </p>
                                <?php endif; ?>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Navbar Area -->
        <div class="navbar-area" >
            <!-- Menu For Desktop Device -->
            <div class="main-nav" >
                    <nav id="site-navigation" class="coming-soon-event-main-navigation" role="navigation" aria-label="<?php esc_html__('Primary', 'coming-soon-event')?>">
                        <div class="wrapper">
                            <button type="button" class="coming-soon-menu-toggle">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary-menu',
                                'menu_id'        => 'primary-menu',
                                'menu_class'     => 'nav-menu',
                                ) );
                            ?>
                        </div><!-- .wrapper -->
                    </nav><!-- #site-navigation -->
                    <a class="skip-link-menu-end-skip" href="javascript:void(0)"></a>
            </div>
        </div>
    </header>
    <?php
    } 
?>