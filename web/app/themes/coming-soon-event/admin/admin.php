<?php

if (!defined('ABSPATH')) {
	exit;
}
 
/***** Theme Info Page *****/

if (!function_exists('coming_soon_event_theme_info_page')) {
	function coming_soon_event_theme_info_page() {
		add_theme_page(esc_html__('Welcome to Coming Soon Theme', 'coming-soon-event'), esc_html__('Theme Info', 'coming-soon-event'), 'edit_theme_options', 'coming-soon-event', 'coming_soon_event_display_theme_page');
	}
}
add_action('admin_menu', 'coming_soon_event_theme_info_page');

if (!function_exists('coming_soon_event_display_theme_page')) {
	function coming_soon_event_display_theme_page() {
		global $coming_soon_event_data; ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Coming Soon Theme Installation', 'coming-soon-event')); ?>
			</h1>
			<p class="about">
				<?php printf(esc_html__('Please follow these simple steps for setup Coming Soon Page', 'coming-soon-event')); ?>
			</p>
			<h3>
				<?php printf(esc_html__('Step - 1 : Go To WordPress Dashoboard and create a New Page ', 'coming-soon-event')); ?>
			</h3>
			<div class="chia-col-1-4 screenshot">
				<img class="theme-screenshot" src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/images/help/first.png" alt="<?php esc_attr_e('Theme Screenshot', 'coming-soon-event'); ?>" />
			</div>
			<br>
			
			<h3>
				<?php printf(esc_html__('Step - 2 : Now Click on Document and select Page Template as Coming Soon Page ', 'coming-soon-event')); ?>
			</h3>
			<div class="chia-col-1-4 screenshot">
				<img class="theme-screenshot" src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/images/help/second.png" alt="<?php esc_attr_e('Theme Screenshot', 'coming-soon-event'); ?>" />
			</div>
			<br>
			
			<h3>
				<?php printf(esc_html__('Step - 3 : Now publish Page ', 'coming-soon-event')); ?>
			</h3>
			<div class="chia-col-1-4 screenshot">
				<img class="theme-screenshot" src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/images/help/third.png" alt="<?php esc_attr_e('Theme Screenshot', 'coming-soon-event'); ?>" />
			</div>
			<br>
			
			<h3>
				<?php printf(esc_html__('Step - 4 : Setup Home Page --> Now click on Settings--> Reading -->  A static page (select below) and Set Coming Soon Page as Homepage:', 'coming-soon-event')); ?>
			</h3>
			<div class="chia-col-1-4 screenshot">
				<img class="theme-screenshot" src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/images/help/fifth.png" alt="<?php esc_attr_e('Theme Screenshot', 'coming-soon-event'); ?>" />
			</div>
			<br>
			
			<h3>
				<?php printf(esc_html__('Step - 5 : Now Customize Coming Soon Page --> Go to Appearance and then Customize then Go To Coming Soon Event Settings. You can change information background and many more from under these settings', 'coming-soon-event')); ?>
			</h3>
			<div class="chia-col-1-4 screenshot">
				<img class="theme-screenshot" src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/images/help/sixth.png" alt="<?php esc_attr_e('Theme Screenshot', 'coming-soon-event'); ?>" />
			</div>
			<br>
			<div class="chia-col-1-4 screenshot">
				<img class="theme-screenshot" src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/images/help/seven.png" alt="<?php esc_attr_e('Theme Screenshot', 'coming-soon-event'); ?>" />
			</div>
			<br>
			 
			<div class="chia-row theme-intro clearfix">
				 
				<div class="chia-col-3-4 theme-description">
				    <p class="about">
						<?php printf(esc_html__('You can customize your Event Page eaily and can update information.', 'coming-soon-event')); ?>
					</p>
					<br>
				    <?php esc_html_e( 'Also you can use this page as a normal page just set Home Page other page', 'coming-soon-event' ); ?>
					<div class="theme-links wpz-clearfix">
					<p>
						<a href="https://wordpress.org/support/theme/coming-soon-event" class="button button-primary" target="_blank">
							<?php esc_html_e( 'Get Support', 'coming-soon-event' ); ?>
						</a>
					</p>
				</div>
				</div>
			</div>
	
			<hr>
			 
			 
		</div><?php
	}
}

?>