<?php
/**
 * Tests: Class Tests_Capitalizing_S
 *
 * @package Capital_S_Dangit
 * @subpackage Tests
 * @since 1.0.0
 */

/**
 * Test capitalizing S in "Javascript".
 *
 * @since 1.0.0
 */
class Tests_Capitalizing_S extends WP_UnitTestCase {
	public function test_capital_S_dangit() {
		global $wp_current_filter;
		$this->assertEquals( 'Something about JavaScript', capital_S_dangit( 'Something about Javascript' ) );
		$this->assertEquals( 'Something about (JavaScript', capital_S_dangit( 'Something about (Javascript' ) );
		$this->assertEquals( 'Something about &#8216;JavaScript', capital_S_dangit( 'Something about &#8216;Javascript' ) );
		$this->assertEquals( 'Something about &#8220;JavaScript', capital_S_dangit( 'Something about &#8220;Javascript' ) );
		$this->assertEquals( 'Something about >JavaScript', capital_S_dangit( 'Something about >Javascript' ) );
		$this->assertEquals( 'Javascript', capital_S_dangit( 'Javascript' ) );

		$wp_current_filter = array( 'the_title' );
		$this->assertEquals( 'JavaScript', capital_S_dangit( 'Javascript' ) );
	}

	public function test_capitalize_P_in_document_title_parts() {
		global $wp_current_filter;
		$parts       = array( 'Javascript will stay', 'Replacing Javascript' );
		$associative = array(
			'title' => 'Javascript will stay',
			'site'  => 'Replacing Javascript',
		);

		$this->assertEquals( array( 'Javascript will stay', 'Replacing JavaScript' ), capitalize_S_in_document_title_parts( $parts ) );
		$this->assertEquals( array(
			'title' => 'Javascript will stay',
			'site'  => 'Replacing JavaScript',
		), capitalize_S_in_document_title_parts( $associative ) );

		$wp_current_filter = array( 'document_title_parts' );
		$this->assertEquals( array( 'JavaScript will stay', 'Replacing JavaScript' ), capitalize_S_in_document_title_parts( $parts ) );
		$this->assertEquals( array(
			'title' => 'JavaScript will stay',
			'site'  => 'Replacing JavaScript',
		), capitalize_S_in_document_title_parts( $associative ) );
	}
}
