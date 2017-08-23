<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Use front-page.php when using static front page
 *
 * @param string $template
 * @return string
 */
 add_filter( 'frontpage_template', function( $template ) {
 	if ( ! is_home() ) {
 		if ( $custom_page_template = get_post_meta(get_the_ID(), '_wp_page_template', true ) ) {
 			if ( $custom_page_template && 'default' !== $custom_page_template ) {
 				return $custom_page_template;
 			}
 		}

 		return $template;
 	}
 } );
