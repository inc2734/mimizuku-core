<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Generate style dependencies
 *
 * @param array $maybe_dependencies
 * @return array
 */
function generate_style_dependencies( $maybe_dependencies ) {
	$dependencies = [];
	foreach ( $maybe_dependencies as $dependency ) {
		if ( ! wp_style_is( $dependency, 'enqueued' ) && ! wp_style_is( $dependency, 'registered' ) ) {
			continue;
		}
		$dependencies[] = $dependency;
	}
	return $dependencies;
}
