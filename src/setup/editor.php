<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\Mimizuku_Core\App\Model;

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
				$css_to_array = new Model\CSS_To_Array( $css );
				$css = $css_to_array->get();

				foreach ( $css as $key => $css_block ) {
					$selectors = $css_block->get_selectors();
					foreach ( $selectors as $i => $selector ) {
						$selectors[ $i ] = '.editor-styles-wrapper ' . $selector;
					}
					$css_block->set_selectors( $selectors );
					$css[ $key ] = $css_block;
				}

				$new_css = '';
				foreach ( $css as $key => $css_block ) {
					$new_css .= $css_block->get_inline_css();
				}
				?>
				<style id="wp-additional-css">
				<?php echo strip_tags( $new_css ); // WPCS XSS ok. ?>
				</style>
				<?php
			}
		);
	}
);
