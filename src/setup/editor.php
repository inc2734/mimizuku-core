<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\Mimizuku_Core\Helper;

/**
 * Additional CSS to the block editor
 *
 * @return void
 */
add_action(
	'enqueue_block_editor_assets',
	function() {
		add_action(
			'admin_head',
			function() {
				$css = wp_get_custom_css();
				$css = str_replace( [ "\t", "\n", "\r" ], '', $css );
				$css = preg_replace( '|\s*([\{\}])\s*|ms', '$1', $css );
				$css = preg_replace( '/([^\{\}\(\)@]+?\{)/s', '.editor-styles-wrapper $1', $css );

				if ( ! $css ) {
					return;
				}
				?>
				<style id="wp-additional-css">
				<?php echo strip_tags( $css ); // WPCS XSS ok. ?>
				</style>
				<?php
			}
		);
	}
);

/**
 * Additional CSS to the classic editor
 *
 * @param string $settings
 * @return string
 */
add_filter(
	'tiny_mce_before_init',
	function( $mce_init ) {
		$css = wp_get_custom_css();
		$css = str_replace( [ "\t", "\n", "\r" ], '', $css );
		$css = preg_replace( '|\s*([\{\}])\s*|ms', '$1', $css );
		$css = preg_replace( '/([^\{\}\(\)@]+?\{)/s', '.mce-content-body.mceContentBody $1', $css );

		if ( ! $css ) {
			return $mce_init;
		}

		if ( ! isset( $mce_init['content_style'] ) ) {
			$mce_init['content_style'] = '';
		}

		$mce_init['content_style'] .= addslashes( $css );
		return $mce_init;
	},
	11
);
