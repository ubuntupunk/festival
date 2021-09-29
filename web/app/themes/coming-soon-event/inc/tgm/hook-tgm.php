<?php
/**
 * Recommended plugins
 *
 * @package Anymags
 */

if ( ! function_exists( 'anymags_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function anymags_recommended_plugins() {

        $plugins = array(
			array(
                'name'     => esc_html__( 'Photo Gallery Builder', 'coming-soon-event' ),
                'slug'     => 'photo-gallery-builder',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Accordion Slider Gallery', 'coming-soon-event' ),
                'slug'     => 'accordion-slider-gallery',
                'required' => false,
            ),
			array(
                'name'     => esc_html__( 'Timeline', 'coming-soon-event' ),
                'slug'     => 'timeline-event-history',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'anymags_recommended_plugins' );