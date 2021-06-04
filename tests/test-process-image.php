<?php
/**
 * Class SampleTest
 *
 * @package Lazy_Load
 */

/**
 * Sample test case.
 */
class LazyLoad__Tests extends LazyLoad__TestCase {

	function get_test_data() {
		return array(
			'img_with_no_src' => array(
				array(
					'<img id="img" />',
					'img',
					' id="img"',
				),
				'<img id="img" />',
			),

			'img_simple' => array(
				array(
					'<img src="image.jpg" />',
					'img',
					' src="image.jpg"',
				),
				'<img src="placeholder.jpg" data-lazy-src="image.jpg"><noscript><img src="image.jpg" /></noscript>',
			),

			'img_with_other_attributes' => array(
				array(
					'<img src="image.jpg" alt="Alt!" />',
					'img',
					' src="image.jpg" alt="Alt!"',
				),
				'<img src="placeholder.jpg" alt="Alt!" data-lazy-src="image.jpg"><noscript><img src="image.jpg" alt="Alt!" /></noscript>',
			),

			'img_with_srcset' => array(
				array(
					'<img src="image.jpg" srcset="medium.jpg 1000w, large.jpg 2000w" />',
					'img',
					' src="image.jpg" srcset="medium.jpg 1000w, large.jpg 2000w"',

				),
				'<img src="placeholder.jpg" data-lazy-src="image.jpg" data-lazy-srcset="medium.jpg 1000w, large.jpg 2000w"><noscript><img src="image.jpg" srcset="medium.jpg 1000w, large.jpg 2000w" /></noscript>',
			),

			'img_with_sizes' => array(
				array(
					'<img src="image.jpg" sizes="(min-width: 36em) 33.3vw, 100vw" />',
					'img',
					' src="image.jpg" sizes="(min-width: 36em) 33.3vw, 100vw"',

				),
				'<img src="placeholder.jpg" data-lazy-src="image.jpg" data-lazy-sizes="(min-width: 36em) 33.3vw, 100vw"><noscript><img src="image.jpg" sizes="(min-width: 36em) 33.3vw, 100vw" /></noscript>',
			),
		);
	}

	/**
	 * @dataProvider get_test_data
	 */
	function test_process_image( $image_parts, $expected_html ) {
		$actual_html = LazyLoad_Images::process_image( $image_parts );

		$this->assertEquals( $expected_html, $actual_html );
	}
}
