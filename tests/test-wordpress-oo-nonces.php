<?php
/**
 * This is the file with the test class for the WP_OO_Nonces class
 *
 * @package WP_OO_Nonces
 */

/**
 * Tests the WP_OO_Nonces class
 */
class WP_OO_NoncesTest extends WP_UnitTestCase {

	/**
	 * Create an instance of the WP_OO_Nonces class to be used by all tests
	 */
	protected $oo_nonce;

	/**
	 * Sets up variables for use in all tests
	 */
	public function setUp () {
		$this->oo_nonce = new WP_OO_Nonces();
	}
	

	/**
	 * Tests the create_nonce function
	 */
	function test_the_create_nonce_function_generates_a_nonce_string() {
		// check that the nonce is generated
		$out = $this->oo_nonce->create_nonce();		
		$this->assertNotNull( $out );
		$this->assertInternalType('string', $out);
	}

	/**
	 * Tests the nonce_url function
	 */
	function test_the_nonce_url_function_generates_a_nonce_url() {
		// check that the nonce url is generated and contains the nonce parameter
		$out = $this->oo_nonce->nonce_url(admin_url());		
		$this->assertNotNull( $out );
		$this->assertNotFalse(strpos($out, '_wpnonce'));
	}

	/**
	 * Tests the nonce_field function
	 */
	function test_the_nonce_field_function_generates_a_nonce_field_with_optional_referer_field() {
		// check that the nonce field is generated and contains the nonce (and optional referer) parameter
		$out = $this->oo_nonce->nonce_field(-1, '_wpnonce', true, false);	 // don't echo the field(s)
		$this->assertNotNull( $out );
		$this->assertNotFalse(strpos($out, '_wpnonce'));
		$this->assertNotFalse(strpos($out, '_wp_http_referer'));
		
	}

	/**
	 * Tests the referer_field function
	 */
	function test_the_referer_field_function_generates_a_referer_field() {
		// check that the referer field is generated
		$out = $this->oo_nonce->referer_field(false);	 // don't echo the field
		$this->assertNotNull( $out );
		$this->assertNotFalse(strpos($out, '_wp_http_referer'));
		
	}

	/**
	 * Tests the verify_nonce function
	 */
	function test_the_verify_nonce_function_successfully_verifies_a_nonce_string() {
		// check that the nonce is successfully verified
		$nonce = $this->oo_nonce->create_nonce();
		$out = $this->oo_nonce->verify_nonce($nonce);		
		$this->assertNotNull( $out );
		$this->assertInternalType('integer', $out);
		$this->assertEquals(1, $out); // well, we just generated it!
	}
}
