<?php
/**
 * @package inc2734/wp-page-speed-optimization
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

use Inc2734\WP_Page_Speed_Optimization\Helper;

/**
 * dynamic_sidebar() corresponding to cache
 *
 * @param string $sidebar_id
 * @return void
 */
function dynamic_sidebar( $sidebar_id ) {
	Helper\dynamic_sidebar( $sidebar_id );
}
