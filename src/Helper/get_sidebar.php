<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

use Inc2734\WP_View_Controller;

/**
 * This function like get_sidebar()
 *
 * @param string $name
 * @return void
 */
function get_sidebar( $name = null ) {
	WP_View_Controller\Helper\get_sidebar( $name );
}
