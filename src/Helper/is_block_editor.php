<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Return true when the page has block editor
 *
 * @return boolean
 */
function is_block_editor() {
	return is_gutenberg_page()
				 || ( function_exists( '\use_block_editor_for_post' ) && \use_block_editor_for_post( get_post() ) );
}
