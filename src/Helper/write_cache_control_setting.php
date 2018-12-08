<?php
/**
 * @package inc2734/wp-page-speed-optimization
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

use Inc2734\WP_Page_Speed_Optimization\Helper;

/**
 * Write ache control setting into .htaccess
 *
 * @param bool $enable
 * @return int|false bytes
 */
function write_cache_control_setting( $enable ) {
	return Helper\write_cache_control_setting( $enable );
}
