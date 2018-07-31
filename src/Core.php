<?php
/**
 * @package mimizuku-core
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core;

class Core {

	public function __construct() {
		load_textdomain( 'inc2734-mimizuku-core', __DIR__ . '/languages/' . get_locale() . '.mo' );
		add_filter( 'inc2734_view_controller_config', [ $this, '_inc2734_view_controller_config' ] );

		$includes = array(
			'/app/controller',
			'/app/setup',
		);
		foreach ( $includes as $include ) {
			static::include_files( __DIR__ . $include );
		}
	}

	/**
	 * Update view controller config
	 *
	 * @param array $config
	 * @return array
	 */
	public function _inc2734_view_controller_config() {
		return [
			'templates' => [
				'vendor/inc2734/mimizuku-core/src/view',
			],
			'page-templates' => [
				'page-templates',
			],
			'layout' => [
				'templates/layout/wrapper',
				'vendor/inc2734/mimizuku-core/src/view/templates/layout/wrapper',
			],
			'header' => [
				'templates/layout/header',
				'vendor/inc2734/mimizuku-core/src/view/templates/layout/header',
			],
			'sidebar' => [
				'templates/layout/sidebar',
				'vendor/inc2734/mimizuku-core/src/view/templates/layout/sidebar',
			],
			'footer' => [
				'templates/layout/footer',
				'vendor/inc2734/mimizuku-core/src/view/templates/layout/footer',
			],
			'view' => [
				'templates/view',
				'vendor/inc2734/mimizuku-core/src/view/templates/view',
			],
			'static' => [
				'templates/static',
				'vendor/inc2734/mimizuku-core/src/view/templates/static',
			],
		];
	}

	/**
	 * Return included files and directories
	 *
	 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
	 * @param string $directory
	 * @param boolean $exclude_underscore
	 * @return void
	 */
	protected static function _get_include_files( $directory, $exclude_underscore = false ) {
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

		$files = static::_get_include_files( $directory, $exclude_underscore );

		foreach ( $files['files'] as $file ) {
			$template_name = str_replace( [ trailingslashit( get_template_directory() ), '.php' ], '', $file );
			get_template_part( $template_name );
		}

		foreach ( $files['directories'] as $directory ) {
			static::get_template_parts( $directory, $exclude_underscore );
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
	public static function include_files( $directory, $exclude_underscore = false ) {
		if ( ! is_dir( $directory ) ) {
			return;
		}

		$files = static::_get_include_files( $directory, $exclude_underscore );

		foreach ( $files['files'] as $file ) {
			include_once( $file );
		}

		foreach ( $files['directories'] as $directory ) {
			static::include_files( $directory, $exclude_underscore );
		}
	}
}
