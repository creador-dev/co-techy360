<?php


class BF_To_Elementor_Fields_Adapter_Test extends \WP_UnitTestCase {

	public $widget;

	public $adapter;

	public $trace = [];


	function setUp() {

		parent::setUp();

		$this->trace  = [];
		$this->widget = $this->getMockBuilder( 'Elementor\Widget_Base' )
		                     ->setMethods( [
			                     'start_controls_section',
			                     'add_control',
			                     'end_controls_section',
			                     'get_title'
		                     ] )
		                     ->getMock();

		$this->widget
			->expects( $this->any() )
			->method( 'start_controls_section' )
			->will( $this->returnCallback( function () {

				$this->trace [] = array(
					'method' => 'start_controls_section',
					'args'   => func_get_args(),
				);
			} ) );
		$this->widget
			->expects( $this->any() )
			->method( 'add_control' )
			->will( $this->returnCallback( function () {

				$this->trace [] = array(
					'method' => 'add_control',
					'args'   => func_get_args(),
				);
			} ) );
		$this->widget
			->expects( $this->any() )
			->method( 'end_controls_section' )
			->will( $this->returnCallback( function () {

				$this->trace [] = array(
					'method' => 'end_controls_section',
					'args'   => func_get_args(),
				);
			} ) );


		if ( ! class_exists( 'BF_Fields_Adapter' ) ) {

			require BF_PATH . '/page-builder/class-bf-fields-adapter.php';
		}

		if ( ! class_exists( 'BF_To_Elementor_Fields_Adapter' ) ) {

			require BF_PATH . 'page-builder/adapters/elementor/class-bf-to-elementor-fields-adapter.php';
		}

		$this->adapter = new BF_To_Elementor_Fields_Adapter();
		$this->adapter->set_elementor_widget( $this->widget );

	}


	public function test_text_field() {

		$before = include __DIR__ . '/fixtures/text/input.before.php';
		$after  = include __DIR__ . '/fixtures/text/input.after.php';


		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_heading_field() {

		$before = include __DIR__ . '/fixtures/heading/standard.before.php';
		$after  = include __DIR__ . '/fixtures/heading/standard.after.php';


		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_custom_field() {

		$before = include __DIR__ . '/fixtures/custom/input.before.php';
		$after  = include __DIR__ . '/fixtures/custom/input.after.php';


		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_hr_field() {

		$before = include __DIR__ . '/fixtures/hr/standard.before.php';
		$after  = include __DIR__ . '/fixtures/hr/standard.after.php';

		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_standard_field() {

		$before = include __DIR__ . '/fixtures/textarea/standard.before.php';
		$after  = include __DIR__ . '/fixtures/textarea/standard.after.php';

		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_wp_editor_field() {

		$before = include __DIR__ . '/fixtures/wp_editor/standard.before.php';
		$after  = include __DIR__ . '/fixtures/wp_editor/standard.after.php';

		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_editor_field() {

		$before = include __DIR__ . '/fixtures/editor/standard.before.php';
		$after  = include __DIR__ . '/fixtures/editor/standard.after.php';

		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_switch_field() {

		$before = include __DIR__ . '/fixtures/switch/standard.before.php';
		$after  = include __DIR__ . '/fixtures/switch/standard.after.php';

		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_select_field() {

		$before = include __DIR__ . '/fixtures/select/standard.before.php';
		$after  = include __DIR__ . '/fixtures/select/standard.after.php';

		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_radio_field() {

		$before = include __DIR__ . '/fixtures/radio/standard.before.php';
		$after  = include __DIR__ . '/fixtures/radio/standard.after.php';

		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_color_field() {

		$before = include __DIR__ . '/fixtures/color/standard.before.php';
		$after  = include __DIR__ . '/fixtures/color/standard.after.php';

		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_media_image_field() {

		$before = include __DIR__ . '/fixtures/media_image/standard.before.php';
		$after  = include __DIR__ . '/fixtures/media_image/standard.after.php';

		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	public function test_slider_field() {

		$before = include __DIR__ . '/fixtures/slider/standard.before.php';
		$after  = include __DIR__ . '/fixtures/slider/standard.after.php';

		$this->adapter->load_fields( $before );
		$this->adapter->transform();

		$this->assertEquals( $after, $this->trace );
	}


	/*
		public function test_typography_field() {

			$before = include __DIR__ . '/fixtures/typography/standard.before.php';
			$after  = include __DIR__ . '/fixtures/typography/standard.after.php';

			$this->adapter->load_fields( $before );
			$this->adapter->transform();

			$this->assertEquals( $after, $this->trace );
		}
	*/

	function tearDown() {

		parent::tearDown();

		$this->widget = null;
	}
}
