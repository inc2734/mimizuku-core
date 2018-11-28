<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

function get_pure_post_content() {
	$post = get_post();

	if ( ! $post || ! isset( $post->post_content ) ) {
		return;
	}

	if ( post_password_required( $post ) ) {
		return;
	}

	$extended = get_extended( $post->post_content );
	$content  = $extended['main'];
	return $content;
}
