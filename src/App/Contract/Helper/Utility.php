<?php
/**
 * @package mimizuku-core
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\App\Contract\Helper;

use Inc2734\Mimizuku_Core\App\Model;

trait Utility {

	/**
	 * Return custom post type names.
	 * This method only works correctly after the init hook.
	 *
	 * @return array
	 */
	public static function get_custom_post_types() {
		return get_post_types(
			[
				'public'   => true,
				'_builtin' => false,
			]
		);
	}
}
