<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Returns main style handle
 *
 * @return string
 */
function get_main_style_handle() {
	$handle = get_template();

	if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/assets/css/style.min.css' ) ) {
		$handle = get_stylesheet();
	}

	return $handle;
}
