<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

/**
 * Return included files and directories
 *
 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
 * @param string $directory
 * @param boolean $exclude_underscore
 * @return void
 */
function get_include_files( $directory, $exclude_underscore = false ) {
	$return = [
		'files'       => [],
		'directories' => [],
	];

	if ( ! is_dir( $directory ) ) {
		return $return;
	}

	$directory_iterator = new \DirectoryIterator( $directory );

	foreach ( $directory_iterator as $file ) {
		if ( $file->isDot() ) {
			continue;
		}

		if ( $file->isDir() ) {
			$return['directories'][] = $file->getPathname();
			continue;
		}

		if ( 'php' !== $file->getExtension() ) {
			continue;
		}

		if ( $exclude_underscore ) {
			if ( 0 === strpos( $file->getBasename(), '_' ) ) {
				continue;
			}
		}

		$return['files'][] = $file->getPathname();
	}

	return $return;
}
