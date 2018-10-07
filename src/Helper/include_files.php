<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Include php files
 *
 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
 * @param string $directory
 * @param boolean $exclude_underscore
 * @return void
 */
function include_files( $directory, $exclude_underscore = false ) {
	if ( ! is_dir( $directory ) ) {
		return;
	}

	$files = get_include_files( $directory, $exclude_underscore );

	foreach ( $files['files'] as $file ) {
		include_once( $file );
	}

	foreach ( $files['directories'] as $directory ) {
		include_files( $directory, $exclude_underscore );
	}
}
