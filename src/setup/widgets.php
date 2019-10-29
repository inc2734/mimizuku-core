<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Change root directory of wp-awesome-widgets.
 *
 * @param array $hierarchy
 * @param string $slug
 * @param string $name
 * @param array $vars
 */
add_filter(
	'inc2734_wp_awesome_widgets_view_hierarchy',
	function( $hierarchy, $slug, $name, $vars ) {
		return apply_filters( 'mimizuku_wp_awesome_widgets_view_hierarchy', $hierarchy, $slug, $name, $vars );
	},
	10,
	4
);

/**
 * Override inc2734_wp_awesome_widgets_view_args
 *
 * @param array $args
 *   @param string $slug
 *   @param string $name
 *   @param array $vars
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_view_args',
	function( $args ) {
		return apply_filters( 'mimizuku_wp_awesome_widgets_view_args', $args );
	},
	9
);

/**
 * Override inc2734_wp_awesome_widgets_{ $slug }
 *
 * @param array $args
 *   @param string $slug
 *   @param string $name
 *   @param array $vars
 */
add_action(
	'inc2734_wp_awesome_widgets_view_pre_render',
	function( $args ) {
		$slug = $args['slug'];
		$name = $args['name'];

		$action           = 'mimizuku_wp_awesome_widgets_view_' . $slug;
		$action_with_name = 'mimizuku_wp_awesome_widgets_view_' . $slug . '-' . $name;

		if ( $name && has_action( $action_with_name ) ) {
			add_action(
				'inc2734_wp_awesome_widgets_view_' . $slug . '-' . $name,
				function( $vars ) use ( $slug, $name, $action_with_name ) {
					do_action( $action_with_name, $vars );
				}
			);
			return;
		}

		if ( has_action( $action ) ) {
			add_action(
				'inc2734_wp_awesome_widgets_view_' . $slug,
				function( $name, $vars ) use ( $slug, $action ) {
					do_action( $action, $name, $vars );
				},
				10,
				2
			);
			return;
		}
	},
	9
);

/**
 * Override inc2734_wp_awesome_widgets_view_render
 *
 * @param string $slug
 * @param string $name
 * @param array $vars
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_view_render',
	function( $html, $slug, $name, $vars ) {
		return apply_filters( 'mimizuku_wp_awesome_widgets_view_render', $html, $slug, $name, $vars );
	},
	9,
	4
);
