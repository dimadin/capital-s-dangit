<?php
/**
 * Plugin Name:     Capital S, Dangit!
 * Plugin URI:      https://milandinic.com/wordpress/plugins/capital-s-dangit/
 * Description:     Forever eliminate “Javascript” from the planet.
 * Author:          Milan Dinić
 * Author URI:      https://milandinic.com/
 * Text Domain:     capital-s-dangit
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Capital_S_Dangit
 */

/**
 * Replace “Javascript” with “JavaScript” in a text.
 *
 * @since 1.0.0
 *
 * @staticvar string|false $dblq
 *
 * @param string $text The text to be modified.
 * @return string The modified text.
 */
function capital_S_dangit( $text ) { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
	// Simple replacement for titles.
	$current_filter = current_filter();

	if ( in_array( $current_filter, array( 'the_title', 'wp_title', 'document_title_parts' ), true ) ) {
		return str_replace( 'Javascript', 'JavaScript', $text );
	}

	// Still here? Use the more judicious replacement.
	static $dblq = false;

	if ( false === $dblq ) {
		$dblq = _x( '&#8220;', 'opening curly double quote' ); // phpcs:ignore WordPress.WP.I18n.MissingArgDomain
	}

	return str_replace(
		array( ' Javascript', '&#8216;Javascript', $dblq . 'Javascript', '>Javascript', '(Javascript' ),
		array( ' JavaScript', '&#8216;JavaScript', $dblq . 'JavaScript', '>JavaScript', '(JavaScript' ),
		$text
	);
}
// phpcs:disable Generic.Functions.FunctionCallArgumentSpacing.TooMuchSpaceAfterComma
add_filter( 'the_content',  'capital_S_dangit', 11 );
add_filter( 'the_title',    'capital_S_dangit', 11 );
add_filter( 'wp_title',     'capital_S_dangit', 11 );
add_filter( 'comment_text', 'capital_S_dangit', 31 );
//phpcs:enable

/**
 * Replace “Javascript” with “JavaScript” in document title parts.
 *
 * @since 1.0.0
 *
 * @param array $parts The document title parts.
 * @return array $parts The modified document title parts.
 */
function capitalize_S_in_document_title_parts( $parts ) { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
	foreach ( $parts as $key => $text ) {
		$parts[ $key ] = capital_S_dangit( $text );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'capitalize_S_in_document_title_parts', 11 );
