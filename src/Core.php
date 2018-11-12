<?php
/**
 * @package mimizuku-core
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core;

use Inc2734\Mimizuku_Core\Helper;
use Inc2734\WP_View_Controller\App\Loader;

class Core {

	public function __construct() {
		load_textdomain( 'inc2734-mimizuku-core', __DIR__ . '/languages/' . get_locale() . '.mo' );

		Loader::load_template_tags();

		foreach ( glob( __DIR__ . '/Helper/*.php' ) as $file ) {
			require_once( $file );
		}

		$includes = [
			'/controller',
			'/setup',
		];
		foreach ( $includes as $include ) {
			Helper\include_files( __DIR__ . $include );
		}
	}
}
