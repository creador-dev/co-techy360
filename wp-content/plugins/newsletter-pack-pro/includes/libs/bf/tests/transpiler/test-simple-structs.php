<?php


class simpleStuctsTests extends \PHPUnit\Framework\TestCase {

	protected $transformer;

	public function setup() {

		parent::setup();

		if ( ! class_exists( 'BF_HTML_To_React' ) ) {
			require BF_PATH . 'gutenberg/class-bf-html-to-react.php';
		}

		$this->transformer = new BF_HTML_To_React();

	}

	public function testSimple1() {

		$result = $this->transformer->transform( $this->input( 'simple.1' ) );

		$this->assertEquals( $this->output( 'simple.1' ), $result );
	}

	public function testSimple2() {

		$result = $this->transformer->transform( $this->input( 'simple.2' ) );

		$this->assertEquals( $this->output( 'simple.2' ), $result );
	}

	public function testNestedLevel1() {

		$result = $this->transformer->transform( $this->input( 'nested.1' ) );

		$this->assertEquals( $this->output( 'nested.1' ), $result );

	}

	public function testNestedLevel2() {

		$result = $this->transformer->transform( file_get_contents( __DIR__ . '/fixtures/nested.2/input.html' ) );

		$this->assertEquals( $this->output( 'nested.2' ), $result );

	}

	public function testComplex1() {

		$result = $this->transformer->transform( $this->input( 'complex.1' ) );

		$this->assertEquals( $this->output( 'complex.1' ), $result );
	}


	public function testReact1() {

		$result = $this->transformer->transform( $this->input( 'react.1' ) );

		$this->assertEquals( $this->output( 'react.1' ), $result );
	}


	public function testChangeKey() {

		$result = $this->transformer->transform( $this->input( 'change.key' ) );

		$this->assertEquals( $this->output( 'change.key' ), $result );
	}


	public function output( $dirname ) {

		return include __DIR__ . '/fixtures/' . $dirname . '/output.php';
	}

	public function input( $dirname ) {

		return file_get_contents( __DIR__ . '/fixtures/' . $dirname . '/input.html' );
	}
}

