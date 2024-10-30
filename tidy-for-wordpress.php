<?php
/*
Plugin Name: htmltidy for WordPress
Plugin URI: http://wordpress.org/extend/plugins/htmltidy-for-wordpress/
Description: This plugin runs <a href="http://tidy.sourceforge.net/" title="HTML Tidy Project Page" hreflang="en">HTML Tidy</a> over the complete output of the blog (excluding feeds) and makes it <em>XHTML 1.0 Transitional</em> compliant. Requires <em>php-tidy</em> to be installed. <strong>Important:</strong> please slowly prepare to switch to <a href="http://wordpress.org/extend/plugins/wp-beautifier/stats/">WP-Beautifier</a> as I will discontinue this plugin by the end of 2011.
Author: Benjamin Wittorf
Version: 0.1.29
Author URI: http://benjamin.wittorf.me/
*/

function maketidy( $buffer ) {
	if ( extension_loaded( 'tidy' ) && ! isset( $_GET[ 'visual-editor' ] ) && ( ( is_home() || is_front_page() || is_singular() || is_archive() || is_404() || is_search() ) ) ) { // we need the php-tidy extension, have an exception for Headway, and we just should be on any of those pages
		$options[ 'add-xml-decl' ]    = false; // be sure to strip out that declaration so IE won't mess
		$options[ 'break-before-br' ] = false; // do not add a break before <br />
		$options[ 'char-encoding' ]   = 'utf8'; // utf-8, because that's what WP does, yay
		$options[ 'doctype' ]         = 'transitional'; // force a doctype header
		$options[ 'fix-uri' ]         = false; // don't fix uris
		$options[ 'hide-comments' ]   = true; // strip comments
		$options[ 'indent' ]          = true; // indenting makes pretty printing
		$options[ 'indent-cdata' ]    = true; // even cdata shall be indented
		$options[ 'input-encoding' ]  = 'utf8'; // incoming encoding
		$options[ 'markup' ]          = true; // why yes another pretty printing option
		$options[ 'output-encoding' ] = 'utf8'; // output encoding
		$options[ 'output-xhtml' ]    = true; // just to be sure, make everything XHTML
		$options[ 'sort-attributes' ] = alpha; // sort element attributes alphabetically
		$options[ 'tab-size' ]        = 3; // tab size
		$options[ 'wrap' ]            = false; // do not wrap

		// do the tidy
		$buffer = tidy_repair_string( $buffer, $options, 'utf8' );

		// now here comes some nasty stuff which we need to get rid of - let's start with a helper function
		if ( ! function_exists( 'str_startswith' ) ) {
			function str_startswith( $source, $prefix ) {
				return strncmp( $source, $prefix, strlen( $prefix ) ) == 0;
			}
		}
		// remove <?xml … />' header so IE will display the content correctly
		if ( str_startswith( $buffer, '<?xml' ) == 1 ) {
			$buffer = implode( "\n", array_slice( explode( "\n", $buffer ), 1 ) );
		}
		// I've seen themes starting with an empty line, too
		if ( str_startswith( $buffer, " \n" ) == 1 ) {
			$buffer = implode ( "\n", array_slice( explode( "\n", $buffer ), 1 ) );
		}

	    return $buffer; // yay, we had some stuff tidied
	} else {
		return $buffer; // boo
	}
}

// filter for Hyper Cache. Thanks Stefano for implementing this!
add_filter( 'hyper_cache_buffer', 'maketidy' );

// now, call maketidy whenever the theme header is called - first browser output possible
function buffer_start() {
	ob_start( "maketidy" );
}
add_action( 'get_header', 'buffer_start', 1 );

// do not install if 'tidy' is not installed
function is_tidy_installed() {
	if ( ! extension_loaded( 'tidy' ) ) {
		deactivate_plugins( __FILE__ ); // Deactivate ourself
		wp_die( 'Sorry, your server needs to have <a href="http://www.php.net/tidy" title="php: Tidy" hreflang="en"><em>php-tidy</em></a> installed and activated to make this plugin work.<br />The plugin has been deactivated.</p><p><a href="javascript: history.go(-1)">« back to previous page</a></p>' );
	}
}
register_activation_hook( __FILE__, 'is_tidy_installed' );

?>