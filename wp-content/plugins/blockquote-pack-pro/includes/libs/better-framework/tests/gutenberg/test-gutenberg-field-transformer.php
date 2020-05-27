<?php


class bf_fields_to_gutenberg_component extends \WP_UnitTestCase {

	public $converter;


	function setUp() {

		parent::setUp();

		if ( ! class_exists( 'BF_Fields_To_Gutenberg' ) ) {
			require BF_PATH . 'gutenberg/class-bf-fields-to-gutenberg.php';
		}

		$this->converter = new BF_Fields_To_Gutenberg();
	}


	/**
	 * @test
	 */
	public function should_convert_simple_single_level_fields() {

		$before = include __DIR__ . '/fixtures/simple/simple1.before.php';
		$after  = include __DIR__ . '/fixtures/simple/simple1.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_grouped_fields() {

		$before = include __DIR__ . '/fixtures/group/simple.before.php';
		$after  = include __DIR__ . '/fixtures/group/simple.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_cascaded_groups() {

		$before = include __DIR__ . '/fixtures/group/cascade.before.php';
		$after  = include __DIR__ . '/fixtures/group/cascade.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function convert_tab_to_group() {

		$before = include __DIR__ . '/fixtures/group/tab.before.php';
		$after  = include __DIR__ . '/fixtures/group/tab.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);

	}


	/**
	 * @test
	 */
	public function convert_complex_tab_to_group() {

		$before = include __DIR__ . '/fixtures/group/tab-cascade.before.php';
		$after  = include __DIR__ . '/fixtures/group/tab-cascade.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);

	}


	/**
	 * @test
	 */
	public function should_handle_select_field() {

		$before = include __DIR__ . '/fixtures/select/standard.before.php';
		$after  = include __DIR__ . '/fixtures/select/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_select_group_field() {

		$before = include __DIR__ . '/fixtures/select/group.before.php';
		$after  = include __DIR__ . '/fixtures/select/group.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_select_deferred_field() {

		$before = include __DIR__ . '/fixtures/select/deferred.before.php';
		$after  = include __DIR__ . '/fixtures/select/deferred.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_switch_field() {

		$before = include __DIR__ . '/fixtures/switch/standard.before.php';
		$after  = include __DIR__ . '/fixtures/switch/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_checkbox_field() {

		$before = include __DIR__ . '/fixtures/checkbox/standard.before.php';
		$after  = include __DIR__ . '/fixtures/checkbox/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_slider_field() {

		$before = include __DIR__ . '/fixtures/slider/standard.before.php';
		$after  = include __DIR__ . '/fixtures/slider/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_date_field() {

		$before = include __DIR__ . '/fixtures/date/standard.before.php';
		$after  = include __DIR__ . '/fixtures/date/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_color_field() {

		$before = include __DIR__ . '/fixtures/color/standard.before.php';
		$after  = include __DIR__ . '/fixtures/color/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_repeater_field() {

		$before = include __DIR__ . '/fixtures/repeater/simple.before.php';
		$after  = include __DIR__ . '/fixtures/repeater/simple.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_hr_field() {

		$before = include __DIR__ . '/fixtures/hr/standard.before.php';
		$after  = include __DIR__ . '/fixtures/hr/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_info_field() {

		$before = include __DIR__ . '/fixtures/info/standard.before.php';
		$after  = include __DIR__ . '/fixtures/info/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_heading_field() {

		$before = include __DIR__ . '/fixtures/heading/standard.before.php';
		$after  = include __DIR__ . '/fixtures/heading/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_select_popup_field() {

		$before = include __DIR__ . '/fixtures/select_popup/standard.before.php';
		$after  = include __DIR__ . '/fixtures/select_popup/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_icon_select_field() {

		$before = include __DIR__ . '/fixtures/icon_select/standard.before.php';
		$after  = include __DIR__ . '/fixtures/icon_select/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_ajax_action_field() {

		$before = include __DIR__ . '/fixtures/ajax_action/standard.before.php';
		$after  = include __DIR__ . '/fixtures/ajax_action/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);

	}


	/**
	 * @test
	 */
	public function should_handle_ajax_select_field() {

		$before = include __DIR__ . '/fixtures/ajax_select/standard.before.php';
		$after  = include __DIR__ . '/fixtures/ajax_select/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_background_image_field() {

		$before = include __DIR__ . '/fixtures/background_image/standard.before.php';
		$after  = include __DIR__ . '/fixtures/background_image/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_code_field() {

		$before = include __DIR__ . '/fixtures/code/standard.before.php';
		$after  = include __DIR__ . '/fixtures/code/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_editor_field() {

		$before = include __DIR__ . '/fixtures/editor/standard.before.php';
		$after  = include __DIR__ . '/fixtures/editor/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_image_preview_field() {

		$before = include __DIR__ . '/fixtures/image_preview/std.before.php';
		$after  = include __DIR__ . '/fixtures/image_preview/std.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_image_preview_field2() {

		$before = include __DIR__ . '/fixtures/image_preview/value.before.php';
		$after  = include __DIR__ . '/fixtures/image_preview/value.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_image_radio_field() {

		$before = include __DIR__ . '/fixtures/image_radio/standard.before.php';
		$after  = include __DIR__ . '/fixtures/image_radio/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_image_radio_field2() {

		$before = include __DIR__ . '/fixtures/image_radio/deferred.before.php';
		$after  = include __DIR__ . '/fixtures/image_radio/deferred.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_image_radio_field3() {

		$before = include __DIR__ . '/fixtures/image_radio/deferred2.before.php';
		$after  = include __DIR__ . '/fixtures/image_radio/deferred2.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_image_select_field() {

		$before = include __DIR__ . '/fixtures/image_select/standard.before.php';
		$after  = include __DIR__ . '/fixtures/image_select/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_media_image_field() {

		$before = include __DIR__ . '/fixtures/media_image/standard.before.php';
		$after  = include __DIR__ . '/fixtures/media_image/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_sorter_checkbox_field() {

		$before = include __DIR__ . '/fixtures/sorter_checkbox/standard.before.php';
		$after  = include __DIR__ . '/fixtures/sorter_checkbox/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_term_select_field() {

		$before = include __DIR__ . '/fixtures/term_select/standard.before.php';
		$after  = include __DIR__ . '/fixtures/term_select/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	/**
	 * @test
	 */
	public function should_handle_show_on_attributes() {


		$before = include __DIR__ . '/fixtures/show_on/standard.before.php';
		$after  = include __DIR__ . '/fixtures/show_on/standard.after.php';

		$this->converter->load_fields(
			$before
		);

		$this->assertEquals(
			$after,
			$this->converter->transform()
		);
	}


	function tearDown() {

		parent::tearDown();

		$this->converter = null;
	}
}
