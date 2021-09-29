<div class="blog-area mb-5">
    <div class="blog-img">
        <?php coming_soon_event_post_thumbnail();?>
    </div>
    <div class="blog-content content">
        
        <?php the_title( sprintf( '<h3 class="title mb-20 mt-4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        <ul class="blog-user-details mb-20">
            <li><?php echo get_avatar( get_the_author_meta('email'), '30' );?><?php coming_soon_event_posted_by();?></li>
            <li><i class="fa fa-calendar-check-o"></i><?php coming_soon_event_posted_on();?></li>
        </ul>
        <?php the_excerpt();?>
        <a class="read-more" href="<?php esc_url(the_permalink());?>"><?php esc_html__('Read More','coming-soon-event');?><i class="fa fa-chevron-right"></i></a>
    </div>
    <footer class="entry-footer">
        <?php coming_soon_event_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</div>