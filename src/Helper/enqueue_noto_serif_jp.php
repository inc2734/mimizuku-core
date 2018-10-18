<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Enqueue Noto Serif JP
 *
 * @return void
 */
function enqueue_noto_serif_jp() {
	wp_enqueue_style(
		'noto-serif-jp',
		'https://fonts.googleapis.com/css?family=Noto+Serif+JP&subset=japanese',
		[],
		wp_get_theme()->get( 'Version' )
	);
}
