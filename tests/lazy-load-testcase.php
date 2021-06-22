<?php
/**
 * Class LazyLoad__TestCase
 *
 * @package Lazy_Load
 */

/**
 * Base unit test class for Lazy Load
 */
class LazyLoad__TestCase extends WP_UnitTestCase {
	function setUp() {
		parent::setUp();

		global $lazy_load;
		$this->_ll = $lazy_load;

		add_filter( 'lazyload_images_placeholder_image', array( $this, 'override_placeholder' ) );
	}

	function override_placeholder() {
		return 'placeholder.jpg';
	}

}
