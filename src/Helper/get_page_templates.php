<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\Mimizuku_Core\Helper;

use Inc2734\Mimizuku_Core\App\Model;

/**
 * Returns array of page templates for layout selector in customizer
 *
 * @return array
 *           @var string Template slug  e.g. right-sidebar
 *           @var string Template name  e.g. Right Sidebar
 */
function get_page_templates() {
	static $wrappers = [];
	if ( $wrappers ) {
		return $wrappers;
	}

	$page_templates = new Model\PageTemplates();
	$wrappers = $page_templates->get();
	return $wrappers;
}
