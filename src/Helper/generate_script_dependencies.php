<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Generate script dependencies
 *
 * @param array $maybe_dependencies
 * @return array
 */
function generate_script_dependencies( $maybe_dependencies ) {
	$dependencies = [];
	foreach ( $maybe_dependencies as $dependency ) {
		if ( ! wp_script_is( $dependency, 'enqueued' ) && ! wp_script_is( $dependency, 'registered' ) ) {
			continue;
		}
		$dependencies[] = $dependency;
	}
	return $dependencies;
}
