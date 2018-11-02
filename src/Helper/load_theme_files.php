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
function load_theme_files( $directory, $exclude_underscore = false ) {
	if ( ! is_dir( $directory ) ) {
		return;
	}

	$files = get_include_files( $directory, $exclude_underscore );

	foreach ( $files['files'] as $file ) {
		$file = realpath( $file );
		$file = str_replace( realpath( get_template_directory() ), '', $file );
		$file = str_replace( realpath( get_stylesheet_directory() ), '', $file );
		$file = get_theme_file_path( $file );
		include_once( $file );
	}

	foreach ( $files['directories'] as $directory ) {
		load_theme_files( $directory, $exclude_underscore );
	}
}
