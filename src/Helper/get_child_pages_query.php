<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Return the child pages
 *
 * @var int $post_id
 * @return array
 */
function get_child_pages_query( $post_id ) {
	$args = [
		'post_parent'    => $post_id,
		'post_type'      => 'page',
		'posts_per_page' => 100,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	];
	$args = apply_filters( 'mimizuku_child_pages_args', $args );

	return new \WP_Query( $args );
}
