<?php
/**
Template Name: Without Sidebar Page
**/
get_header(); ?>
<section class="coming-soon-event-wp ptb-100" id="primary">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
	
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'page' );
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; 
				?>
				</div>
				
			</div>
		</div>
</section>
<?php get_footer();?>