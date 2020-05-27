<?php


final class CPP_Utils {


	/**
	 * Remove anchor tag that wrapped with $tag
	 *
	 * @param string &$content
	 * @param string $tag
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public static function remove_parent_link( &$content, $tag ) {

		$content = preg_replace( '/ 
		< \s* a \s*    # select start anchor tag
		[^\>]+ >       # accept any attribute for the tag
		\s*            # skip white spaces
		
		( .*?  < \s* ' . $tag . ' .*? ) # Capture $tag inside the a
		
		\s*            # skip white spaces
		<\s*\/\s*a\s*> # select closed anchor tag
		
		/isx', '$1', $content );
	}
}
