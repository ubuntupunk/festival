<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html__( 'Nothing Found', 'coming-soon-event' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'coming-soon-event' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'coming-soon-event' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'coming-soon-event' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
