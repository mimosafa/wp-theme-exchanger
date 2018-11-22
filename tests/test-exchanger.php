<?php
/**
 * Unit test
 *
 * @package mimosafa/wp-theme-exchanger
 */

class ExchangerTest extends WP_UnitTestCase {

	/**
	 * Test themes root directory
	 *
	 * @static
	 * @var string path
	 */
	private static $themeRoot;

	private $theme_default = 'test-default-theme';
	private $theme_changed = 'test-changed-theme';

	private $exchanger;

	public function setUp() {
		parent::setUp();

		if ( ! isset( self::$themeRoot ) ) {
			self::$themeRoot = dirname( __FILE__ ) . '/themes';
		}
		register_theme_directory( self::$themeRoot );
		switch_theme( $this->theme_default );
		$this->exchanger = new WP_Theme_Exchanger\Exchanger( $this->theme_changed, self::$themeRoot );
	}

	/**
	 * Before exchange theme
	 */
	public function test_check_current() {
		$current_theme = wp_get_theme( null, self::$themeRoot );
		$maybe_current_theme = wp_get_theme( $this->theme_default, self::$themeRoot );
		$this->assertEquals( $current_theme, $maybe_current_theme );
	}

	/**
	 * Exchange theme on
	 */
	public function test_exchange_on() {
		// WP_Theme_Exchanger\Exchanger::on()
		$this->exchanger->on();
		$current_theme = wp_get_theme( null, self::$themeRoot );
		$maybe_current_theme = wp_get_theme( $this->theme_changed, self::$themeRoot );
		$this->assertEquals( $current_theme, $maybe_current_theme );
	}

}
