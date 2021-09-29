<?php get_header(); ?>
	<section class="page-404" id="primary">
        <div class="container">
            <div class="page-404-inner">
                <h1><?php echo esc_html__( '404', 'coming-soon-event' ); ?></h1>
                <h3><i class="fa fa-exclamation-triangle"></i> <?php echo esc_html__( 'Oops! That page can&rsquo;t be found.', 'coming-soon-event' ); ?></h3>
                <p><?php echo esc_html__( 'Page you are looking does not exist', 'coming-soon-event' ); ?></p>
                <div class="btn-group">
                    <a href="<?php echo esc_url(home_url());?>" class="btn">
                        <?php echo esc_html__( 'Click To Home Page', 'coming-soon-event' ); ?> 
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();