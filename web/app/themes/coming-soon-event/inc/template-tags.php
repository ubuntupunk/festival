<?php
if (!function_exists('coming_soon_event_posted_on')):
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function coming_soon_event_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U'))
        {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf($time_string, esc_attr(get_the_date(DATE_W3C)) , esc_html(get_the_date()) , esc_attr(get_the_modified_date(DATE_W3C)) , esc_html(get_the_modified_date()));

        $posted_on = sprintf(

        esc_html('%s', 'post date', 'coming-soon-event') , '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>');

        echo $posted_on; // phpcs:ignore
        
    }
endif;

if (!function_exists('coming_soon_event_posted_by')):
    /**
     * Prints HTML with meta information for the current author.
     */
    function coming_soon_event_posted_by()
    {
        $byline = sprintf(
        /* translators: %s: post author. */
        esc_html_x('by %s', 'post author', 'coming-soon-event') , '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>');

        echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        
    }
endif;

if (!function_exists('coming_soon_event_slug_all_posts_link')):
    /**
     * Prints HTML with meta information for the current author.
     */
    function coming_soon_event_slug_all_posts_link()
    {
        if ('page' == get_option('show_on_front'))
        {
            if (get_option('page_for_posts'))
            {
                echo esc_url(get_permalink(get_option('page_for_posts')));
            }
            else
            {
                echo esc_url(home_url('/?post_type=post'));
            }
        }
        else
        {
            echo esc_url(home_url('/'));
        }
    }
endif;

if (!function_exists('coming_soon_event_entry_footer')):
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function coming_soon_event_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type())
        {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'coming-soon-event'));
            if ($categories_list)
            {
                /* translators: 1: list of categories. */
                printf('<p class="cat-links">' . esc_html__('Posted in %1$s', 'coming-soon-event') . '</p>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'coming-soon-event'));
            if ($tags_list)
            {
                /* translators: 1: list of tags. */
                printf('<p class="tags-links">' . esc_html__('Tagged %1$s', 'coming-soon-event') . '</p>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number()))
        {
            echo '<span class="comments-link">';
            comments_popup_link(sprintf(wp_kses(
            /* translators: %s: post title */
            __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'coming-soon-event') , array(
                'span' => array(
                    'class' => array() ,
                ) ,
            )) , wp_kses_post(get_the_title())));
            echo '</span>';
        }

        edit_post_link(sprintf(wp_kses(
        /* translators: %s: Name of current post. Only visible to screen readers */
        __('Edit <span class="screen-reader-text">%s</span>', 'coming-soon-event') , array(
            'span' => array(
                'class' => array() ,
            ) ,
        )) , wp_kses_post(get_the_title())) , '<span class="edit-link">', '</span>');
    }
endif;

if (!function_exists('coming_soon_event_post_thumbnail')):
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function coming_soon_event_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail())
        {
            return;
        }

        if (is_singular()):
?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php
        else: ?>

			<a class="post-thumbnail" href="<?php esc_url(the_permalink()); ?>" aria-hidden="true" tabindex="-1">
				<?php
            the_post_thumbnail('post-thumbnail', array(
                'alt' => the_title_attribute(array(
                    'echo' => false,
                )) ,
            ));
?>
			</a>

			<?php
        endif; // End is_singular().
        
    }
endif;

if (!function_exists('wp_body_open')):
    /**
     * Shim for sites older than 5.2.
     *
     * @link https://core.trac.wordpress.org/ticket/12563
     */
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
endif;