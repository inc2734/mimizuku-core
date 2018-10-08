<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Update view controller config
 *
 * @param array $config
 * @return array
 */
add_filter(
	'inc2734_view_controller_config',
	function() {
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
);
