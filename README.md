# WP Theme Exchanger

[![Build Status](https://travis-ci.org/mimosafa/wp-theme-exchanger.svg?branch=master)](https://travis-ci.org/mimosafa/wp-theme-exchanger)

Simple WordPress theme exchanger.

## Installation

```
composer require mimosafa\wp-theme-exchanger
```

## Example

Note: This library will not work after the `setup_theme` action.

```php
<?php

// In your plugin file

require_once( 'path/to/vendor/autoload.php' );

add_action( 'plugins_loaded', function() {

    /**
     * Theme slug
     *
     * @var string $extra_theme
     */
    $extra_theme = 'awesome-theme';
    $exchanger = new WP_Theme_Exchanger\Exchanger( $extra_theme );

    if ( $_SERVER['REQUEST_URI'] === '/awesome' ) {
        $exchanger->on();
    }

} );
```
