<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Enqueue Noto Sans JP
 *
 * @return void
 */
function enqueue_noto_sans_jp() {
	wp_enqueue_style(
		'noto-sans-jp',
		'https://fonts.googleapis.com/css?family=Noto+Sans+JP&subset=japanese',
		[],
		wp_get_theme()->get( 'Version' )
	);
}
