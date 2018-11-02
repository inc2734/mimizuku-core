<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * get_template_part php files
 *
 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
 * @param string $directory
 * @param boolean $exclude_underscore
 * @return void
 */
function get_template_parts( $directory, $exclude_underscore = false ) {
	if ( ! is_dir( $directory ) ) {
		return;
	}

	$files = get_include_files( $directory, $exclude_underscore );

	foreach ( $files['files'] as $file ) {
		$file = realpath( $file );
		$template_name = str_replace( [ trailingslashit( realpath( get_template_directory() ) ), '.php' ], '', $file );
		get_template_part( $template_name );
	}

	foreach ( $files['directories'] as $directory ) {
		get_template_parts( $directory, $exclude_underscore );
	}
}
