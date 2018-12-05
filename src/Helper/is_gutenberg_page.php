<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Return true when active the Gutenberg plugin
 *
 * @return boolean
 */
function is_gutenberg_page() {
	$post = get_post();
	if ( ! $post ) {
		return false;
	}

	return function_exists( '\is_gutenberg_page' ) && \is_gutenberg_page();
}
