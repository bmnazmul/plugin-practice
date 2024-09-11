<?php 


/*
 * Plugin Name:       mamurjor Best Slider
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       mamurjor best slider
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            hadi jaman
 * Author URI:        https://facebook.com/hadijaman/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://mamurjor.com//
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 
 */


 /**
 * The [wporg] shortcode.
 *
 * Accepts a title and will display a box.
 *
 * @param array  $atts    Shortcode attributes. Default empty.
 * @param string $content Shortcode content. Default null.
 * @param string $tag     Shortcode tag (name). Default empty.
 * @return string Shortcode output.
 */
function wporg_shortcode( $atts = [], $content = null, $tag = '' ) {
	// normalize attribute keys, lowercase
	$atts = array_change_key_case( (array) $atts, CASE_LOWER );

	// override default attributes with user attributes
	$wporg_atts = shortcode_atts(
		array(
			'title' => 'WordPress.org',
            'class' =>'test',
            'id' =>'test'
		), $atts, $tag
	);

	// start box
	$o = '<div id="'.$wporg_atts['id'].'" class="'.$wporg_atts['class'].'">';

	// title
	$o .= '<h2>' . esc_html( $wporg_atts['title'] ) . '</h2>';

	// enclosing tags
	if ( ! is_null( $content ) ) {
	
		$o .= apply_filters( 'the_content', $content );
	}

	$o .= '</div>';
	return $o;
}

/**
 * Central location to create all shortcodes.
 */
function wporg_shortcodes_init() {
	add_shortcode( 'wporg', 'wporg_shortcode' );
}

add_action( 'init', 'wporg_shortcodes_init' );
?>


