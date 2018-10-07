<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Returns PHP file list
 *
 * @param string Directory path
 * @return array PHP file list
 */
function glob_recursive( $path ) {
	$files = [];
	if ( preg_match( '/\\' . DIRECTORY_SEPARATOR . 'vendor$/', $path ) ) {
		return $files;
	}

	foreach ( glob( $path . '/*' ) as $file ) {
		if ( is_dir( $file ) ) {
			$files = array_merge( $files, glob_recursive( $file ) );
		} elseif ( preg_match( '/\.php$/', $file ) ) {
			$files[] = $file;
		}
	}

	return $files;
}
