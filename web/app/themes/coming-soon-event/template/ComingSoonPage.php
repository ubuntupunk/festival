<?php
/**
Template Name: Coming Soon Page
**/
get_header();
$show_social_icon = get_theme_mod('coming_soon_event_social_icon_display',true);
$countdownTitle = get_theme_mod('coming_soon_event_title_heading','');
$welcomeCountTitle = get_theme_mod('coming_soon_event_welcome_title','');
$welcomeCountcontent = get_theme_mod('coming_soon_event_welcome_content','');
$welcomeCountdescription = get_theme_mod('coming_soon_event_welcome_description','');
$contact_info_title = get_theme_mod('coming_soon_event_contact_info_title','');
$contact_info_email = get_theme_mod('coming_soon_event_contact_info_email','');
$contact_info_contact = get_theme_mod('coming_soon_event_contact_info_contact','');
$contact_info_address = get_theme_mod('coming_soon_event_contact_info_address','');
$contact_info_address_title = get_theme_mod('coming_soon_event_contact_info_address_title','');
$contact_info_find_us = get_theme_mod('coming_soon_event_contact_info_find_us','');
$banner_image = get_theme_mod('coming_soon_event_banner_image_setting',get_theme_file_uri('/assets/images/hero-bg.jpg'));
$show_contact_social_icon = get_theme_mod('coming_soon_event_contact_social_icon_display',true);
$contact_social_icon_target = get_theme_mod('coming_soon_event_contact_social_icon_target_display',true);
$facebook_find_us_url = get_theme_mod('coming_soon_event_find_us_social_icon_fb_url','');
$twitter_find_us_url = get_theme_mod('coming_soon_event_find_us_social_icon_twitter_url','');
$youtube_find_us_url = get_theme_mod('coming_soon_event_find_us_social_icon_youtube_url','');
$pintrest_find_us_url = get_theme_mod('coming_soon_event_find_us_social_icon_pintrest_url','');
$instagram_find_us_url = get_theme_mod('coming_soon_event_find_us_social_icon_instagram_url','');
$facebook_url = get_theme_mod('coming_soon_event_social_icon_fb_url','');
$twitter_url = get_theme_mod('coming_soon_event_social_icon_twitter_url','');
$youtube_url = get_theme_mod('coming_soon_event_social_icon_youtube_url','');
$pintrest_url = get_theme_mod('coming_soon_event_social_icon_pintrest_url','');
$instagram_url = get_theme_mod('coming_soon_event_social_icon_instagram_url','');
$social_icon_target = get_theme_mod('coming_soon_event_social_icon_target_display',true);
?>
<!-- home
    ================================================== -->
    <main class="s-home s-home--static" style="background-image: url(<?php echo esc_url($banner_image);?>);">
        <div class="overlay"></div>
            <div class="home-content container">
                <div class="home-logo">
                    <?php
                        the_custom_logo();
                        if ( is_front_page() && is_home() ) :
                            ?>
                            <h2 class="site-title"><a href="<?php esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                            <?php
                        else :
                            ?>
                            <p class="site-title"><a href="<?php esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php
                        endif;
                        $coming_soon_event_description = get_bloginfo( 'description', 'display' );
                        if ( $coming_soon_event_description || is_customize_preview() ) :
                            ?>
                            <p class="site-description"><?php echo esc_html($coming_soon_event_description);?></p>
                        <?php endif; ?>
                </div>
                <div class="container">
                <?php
                    $sidebar_position = get_theme_mod('coming_soon_event_sidebar_position',esc_html__( 'right', 'coming-soon-event' ));
                    if ($sidebar_position == 'left') {
                        $sidebar_position = 'has-left-sidebar';
                    } elseif ($sidebar_position == 'right') {
                        $sidebar_position = 'has-right-sidebar';
                    } elseif ($sidebar_position == 'no') {
                        $sidebar_position = 'no-sidebar';
                    }
                ?>

                    <div class="row home-content__main <?php echo esc_attr($sidebar_position); ?>" id="primary">

            			<div class="col-lg-4 col-md-4 home-content__counter">
                            <?php if($countdownTitle!='') {?>
                            <h3><?php echo esc_html($countdownTitle);?></h3>
                            <?php }?>
                            <div class="home-content__clock">
                                <div class="top">
                                    <div class="time days">
                                        <span><?php echo esc_html__('Days','coming-soon-event')?></span>
                                    </div>
                                </div>    
                                <div class="time hours">
                                    
                                    <span><?php echo esc_html__('H','coming-soon-event');?></span>
                                </div>
                                <div class="time minutes">
                                    
                                    <span><?php echo esc_html__('M','coming-soon-event')?></span>
                                </div>
                                <div class="time seconds">
                                    
                                    <span><?php echo esc_html__('S','coming-soon-event');?></span>
                                </div>
                            </div>  <!-- end home-content__clock -->
                                <?php if($show_social_icon) { ?>
                                <ul class="home-social">
                                	<?php if($facebook_url != "") { ?>
                                            <li><a href="<?php echo esc_url($facebook_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-facebook"></i><span><?php echo esc_html__('Facebook','coming-soon-event');?></span></a></li> 
                                        <?php } ?>
                                        <?php if($twitter_url != "") { ?>
                                           <li><a href="<?php echo esc_url($twitter_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-twitter"></i><span><?php echo esc_html__('Twitter','coming-soon-event');?></span></a></li>
                                        <?php } ?>
                                        <?php if($youtube_url != "") { ?>
                                           <li><a href="<?php echo esc_url($youtube_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-youtube"></i><span><?php echo esc_html__('YouTube','coming-soon-event');?></span></a></li>
                                        <?php } ?>
                                        <?php if($instagram_url != "") { ?>
                                           <li><a href="<?php echo esc_url($instagram_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-instagram"></i><span><?php echo esc_html__('Instagram','coming-soon-event');?></span></a></li>
                                        <?php } ?>
                                        <?php if($pintrest_url != "") { ?>
                                           <li><a href="<?php echo esc_url($pintrest_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-pinterest-p"></i><span><?php echo esc_html__('Pintrest','coming-soon-event');?></span></a></li>
                                        <?php } ?>
                             
                                </ul> <!-- end home-social -->
                            <?php } ?>
                        </div>  <!-- end home-content__counter -->
                        <div class="col-lg-8 col-md-8 home-content__text pull-right">
                            <?php if($welcomeCountTitle!='') {?>
                            <h3><?php echo esc_html($welcomeCountTitle);?></h3>
                            <?php }?>
                            <h1>
                            	<?php echo esc_html($welcomeCountcontent);?>
                            </h1>

                            <p>
                           		<?php echo esc_html($welcomeCountdescription);?>
                            </p>
                            
                        </div>  <!-- end home-content__text -->
                    </div>  <!-- end home-content__main -->
            </div> 
        </div><!-- end home-content -->
    </main> <!-- end s-home -->
    <!-- info
    ================================================== -->
    <a class="info-toggle" href="#0">
        <span class="info-menu-icon"></span>
    </a>
    <div class="s-info">
        <div class="row info-wrapper <?php echo esc_attr($sidebar_position); ?>">
            <div class="col-lg-7 col-md-7 tab-full info-main">
                <?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

            </div>

            <div class="col-lg-5 col-md-5 tab-full pull-right info-contact">

                <div class="info-block">
                    <h3><?php echo esc_html($contact_info_title);?></h3>
                    <p>
                    	<a href="<?php echo esc_url($contact_info_email); ?>" class="info-email"><?php echo esc_html( $contact_info_email ); ?></a>
                        <br>
                        <a href="tel:<?php echo esc_url($contact_info_contact);?>" class="'info-phone"><?php echo esc_html($contact_info_contact);?></a>
                    </p>
                </div>

                <div class="info-block">
                    <h3><?php echo esc_html($contact_info_address_title);?></h3>
                    
                    <p class="info-address">
                        <?php echo esc_html($contact_info_address)?>
                    </p>
                </div>

                <div class="info-block">
                    <h3><?php echo esc_html($contact_info_find_us);?></h3>
                    <?php if($show_contact_social_icon) { ?>
                    <ul class="info-social">
                    	<?php if($facebook_find_us_url != "") { ?>
                        <li>
                            <a href="<?php echo esc_url($facebook_find_us_url); ?>" <?php if($contact_social_icon_target) { ?> target="_blank" <?php } ?>><i class="fa fa-facebook" aria-hidden="true"></i>
                            <span><?php echo esc_html__('Facebook','coming-soon-event');?></span></a>
                        </li>
                    	<?php } ?>
                    	<?php if($twitter_find_us_url != "") { ?>
                        <li>
                            <a href="<?php echo esc_url($twitter_find_us_url); ?>" <?php if($contact_social_icon_target) { ?> target="_blank" <?php } ?>><i class="fa fa-twitter" aria-hidden="true"></i>
                            <span><?php echo esc_html__('Twitter','coming-soon-event');?></span></a>
                        </li>
                    	<?php } ?>
                    	<?php if($instagram_find_us_url != "") { ?>
                        <li>
                            <a href="<?php echo esc_url($instagram_find_us_url); ?>" <?php if($contact_social_icon_target) { ?> target="_blank" <?php } ?>><i class="fa fa-instagram" aria-hidden="true"></i>
                            <span><?php echo esc_html__('Instagram','coming-soon-event');?></span></a>
                        </li>
                        <?php } ?>
                        <?php if($youtube_find_us_url != "") { ?>
                        <li>
                            <a href="<?php echo esc_url($youtube_find_us_url); ?>" <?php if($contact_social_icon_target) { ?> target="_blank" <?php } ?>><i class="fa fa-youtube" aria-hidden="true"></i>
                            <span><?php esc_html__('YouTube','coming-soon-event');?></span></a>
                        </li>
                    	<?php } ?>
                    	<?php if($pintrest_find_us_url != "") { ?>
                        <li>
                            <a href="<?php echo esc_url($pintrest_find_us_url); ?>" <?php if($contact_social_icon_target) { ?> target="_blank" <?php } ?>><i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            <span><?php echo esc_html__('Pintrest','coming-soon-event');?></span></a>
                        </li>
                    	<?php } ?>
                    </ul>
                <?php } ?>
                </div>
                <div class="info-block">
                    <h3><?php echo esc_html__('Read Our Blog','coming-soon-event');?></h3>
                    
                    <p class="info-blog">
                        
                        <a href="<?php echo esc_url(coming_soon_event_slug_all_posts_link()); ?>">
                            <?php echo esc_html__( 'Go to Blog', 'coming-soon-event' ); ?> 
                        </a>
                    </p>
                </div>  
            </div>  <!-- end info contact -->
        </div>  <!-- end info wrapper -->
    </div> <!-- end s-info -->
<?php get_footer();?>