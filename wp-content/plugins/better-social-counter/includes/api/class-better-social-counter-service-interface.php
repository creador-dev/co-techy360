<?php


interface Better_Social_Counter_Service_Interface {

	public function init( $data );


	public function count();


	public function link();

	public function use_cache( $format );
}

