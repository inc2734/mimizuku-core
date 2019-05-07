<?php
/**
 * @package mimizuku-core
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\App\Contract\Helper;

trait Template {

	/**
	 * Return included files and directories
	 *
	 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
	 * @param string $directory
	 * @param boolean $exclude_underscore
	 * @return void
	 */
	public static function get_include_files( $directory, $exclude_underscore = false ) {
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

	/**
	 * get_template_part php files
	 *
	 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
	 * @param string $directory
	 * @param boolean $exclude_underscore
	 * @return void
	 */
	public static function get_template_parts( $directory, $exclude_underscore = false ) {
		if ( ! is_dir( $directory ) ) {
			return;
		}

		$files = static::get_include_files( $directory, $exclude_underscore );

		foreach ( $files['files'] as $file ) {
			$file = realpath( $file );
			$template_name = str_replace( [ trailingslashit( realpath( get_template_directory() ) ), '.php' ], '', $file );
			\Inc2734\Mimizuku_Core\Helper::get_template_part( $template_name );
		}

		foreach ( $files['directories'] as $directory ) {
			static::get_template_parts( $directory, $exclude_underscore );
		}
	}

	/**
	 * Returns PHP file list
	 *
	 * @param string Directory path
	 * @return array PHP file list
	 */
	public static function glob_recursive( $path ) {
		$files = [];
		if ( preg_match( '/\\' . DIRECTORY_SEPARATOR . 'vendor$/', $path ) ) {
			return $files;
		}

		foreach ( glob( $path . '/*' ) as $file ) {
			if ( is_dir( $file ) ) {
				$files = array_merge( $files, static::glob_recursive( $file ) );
			} elseif ( preg_match( '/\.php$/', $file ) ) {
				$files[] = $file;
			}
		}

		return $files;
	}

	/**
	 * Include php files
	 *
	 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
	 * @param string $directory
	 * @param boolean $exclude_underscore
	 * @return void
	 */
	public static function include_files( $directory, $exclude_underscore = false ) {
		if ( ! is_dir( $directory ) ) {
			return;
		}

		$files = static::get_include_files( $directory, $exclude_underscore );

		foreach ( $files['files'] as $file ) {
			include_once( $file );
		}

		foreach ( $files['directories'] as $directory ) {
			static::include_files( $directory, $exclude_underscore );
		}
	}

	/**
	 * Include php files
	 *
	 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
	 * @param string $directory
	 * @param boolean $exclude_underscore
	 * @return void
	 */
	public static function load_theme_files( $directory, $exclude_underscore = false ) {
		if ( ! is_dir( $directory ) ) {
			return;
		}

		$files = static::get_include_files( $directory, $exclude_underscore );

		foreach ( $files['files'] as $file ) {
			$file = realpath( $file );
			$file = str_replace( realpath( get_template_directory() ), '', $file );
			$file = str_replace( realpath( get_stylesheet_directory() ), '', $file );
			$file = get_theme_file_path( $file );
			include_once( $file );
		}

		foreach ( $files['directories'] as $directory ) {
			static::load_theme_files( $directory, $exclude_underscore );
		}
	}
}
