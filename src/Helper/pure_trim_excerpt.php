<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

function pure_trim_excerpt() {
	$raw_excerpt = '';

	$text = get_pure_post_content();
	$text = strip_shortcodes( $text );
	$text = str_replace( ']]>', ']]&gt;', $text );

	$excerpt_length = apply_filters( 'excerpt_length', 55 );
	$excerpt_more   = apply_filters( 'excerpt_more', ' [&hellip;]' );

	$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );

	return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}
