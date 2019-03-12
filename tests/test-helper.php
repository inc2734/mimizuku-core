<?php
use Inc2734\Mimizuku_Core\Helper;

class Mimizuku_Core_Helper_Test extends WP_UnitTestCase {

	public function setup() {
		parent::setup();
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @test
	 */
	public function get_custom_post_types() {
		register_post_type( 'public', [ 'public' => true ] );
		register_post_type( 'unpublic', [ 'public' => false ] );

		$this->assertCount( 1, Helper::get_custom_post_types() );
	}
}
