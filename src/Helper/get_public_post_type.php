<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Returns public post type objects
 *
 * @return array
 */
function get_public_post_types() {
	$_post_types = get_post_types(
		[
			'public' => true,
		]
	);
	unset( $_post_types['attachment'] );

	$post_types = [];
	foreach ( $_post_types as $post_type ) {
		$post_types[ $post_type ] = get_post_type_object( $post_type );
	}

	return $post_types;
}
