<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

use Inc2734\WP_View_Controller;

/**
 * A template tag that is get_template_part() using variables
 *
 * @param string $slug
 * @param string $name
 * @param array $vars
 * @return void
 */
function get_template_part( $slug, $name = null, array $vars = [] ) {
	$slug = apply_filters( 'mimizuku_get_template_part_slug', $slug, $name );
	WP_View_Controller\Helper\get_template_part( $slug, $name, $vars );
}
