<?php

function mg_fire( $callback, $args = [], &$call = NULL ) {

	if ( $call = mg_factory_method( $callback, $echo = FALSE ) ) {
		if ( ! $echo ) {
			ob_start();
		}

		$args = array_merge( $call['args'], [ $args ] );

		call_user_func_array( $call['callable'], $args );

		if ( ! $echo ) {
			return ob_get_clean();
		}
	}
}
