<?php


class Parser_Html5_Format_Test extends WP_UnitTestCase {

	/**
	 * @test
	 */
	public function constructor_accept_configuration_array() {

		$config = [
			'title_tag' => 'h3',
		];

		$instance = new BS_SLP_Content_Parser( $config );

		$this->assertEquals( $config, $instance->get_config() );
	}


	/**
	 * @test
	 */
	public function config_array_should_always_contain_indexes_to_prevent_undefined_index_notice() {

		$reflaction = new ReflectionClass( 'BS_SLP_Content_Parser' );
		//
		$prop = $reflaction->getProperty( 'config' );
		$prop->setAccessible( TRUE );

		$instance = new BS_SLP_Content_Parser( [] );
		$config   = $prop->getValue( $instance );

		$this->assertTrue( isset( $config['title_tag'] ) );
	}


	public function test_config_getter_and_setter() {

		$config = [
			'title_tag'    => 'h3',
			'subtitle_tag' => 'h5'
		];

		$instance = new BS_SLP_Content_Parser( [] );

		$instance->set_config( $config );

		$this->assertEquals( $config, $instance->get_config() );
	}


	/**
	 * The data provider for content parse
	 *
	 * @return array
	 */
	public function various_data_no_valid_image() {

		return [
			get( 'content.no-image.test1' ),
			get( 'content.no-image.test2' ),
			get( 'content.no-image.test3' ),
			get( 'content.no-image.test4' ),
		];
	}


	/**
	 *
	 * @param string $content
	 * @param array  $expected
	 *
	 * @dataProvider various_data_no_valid_image
	 */
	public function test_parse_html( $content, $expected ) {

		$instance = new BS_SLP_Content_Parser( [
			'title_tag' => 'h4',
		] );

		$options = [
			'validate_image_id' => FALSE
		];

		foreach ( $instance->parse_html( $content, $options ) as $idx => $item ) {
			$this->assertEquals( $expected[ $idx ], $item, "\$expected[$idx] is not same with expected result" );
		}

	}


	public function test_is_valid_image_id() {

		$instance = new BS_SLP_Content_Parser( [
			'tag'          => 'h4',
			'subtitle_tag' => 'h5'
		] );

		$this->assertFalse( $instance->is_valid_image_id( 1 ) );


		$post_id = $this->factory->post->create();

		$this->assertFalse( $instance->is_valid_image_id( $post_id ) );

		$post_id = $this->factory->post->create( [
			'post_type'      => 'attachment',
			'post_mime_type' => 'image/png'
		] );

		$this->assertTrue( $instance->is_valid_image_id( $post_id ) );

	}

}
