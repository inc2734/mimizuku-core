<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

use Inc2734\WP_View_Controller;

/**
 * Load footer template
 *
 * @param string $name
 * @return void
 */
function get_footer_template( $name = 'footer' ) {
	WP_View_Controller\Helper\get_footer_template( $name );
}
