# WP Theme Exchanger [![Build Status](https://travis-ci.org/mimosafa/wp-theme-exchanger.svg?branch=master)](https://travis-ci.org/mimosafa/wp-theme-exchanger)

Simple WordPress theme exchanger.

## How to use

Note: This library will not work after the `setup_theme` action.

```
// In your plugin file

require_once( 'path/to/vendor/autoload.php' );

add_action( 'plugins_loaded', function() {

    /** @var string Theme slug to exchange 'awesome-theme' */
    $exchanger = new WP_Theme_Exchanger\Exchanger( 'awesome-theme' );

    if ( $_SERVER['REQUEST_URI'] === '/awesome' ) {
        $exchanger->on();
    }

} );
```
