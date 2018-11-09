<?php

namespace WP_Theme_Exchanger;

class Exchanger {

    /**
     * WP_Theme object
     *
     * @var WP_Theme
     */
    private $theme;

    /**
     * Constructor
     *
     * @access public
     *
     * @param string $theme Name of the theme after exchange
     */
    public function __construct( string $theme ) {
        $theme = wp_get_theme( $theme );
        if ( $theme->exists() ) {
            $this->theme = $theme;
        }
    }

    /**
     * Exchange theme
     *
     * @access public
     */
    public function on() {
        add_filter( 'stylesheet', [$this, 'stylesheet'] );
        add_filter( 'template',   [$this, 'template']   );
    }

    /**
     * Cancel exchange theme
     *
     * @access public
     */
    public function off() {
        remove_filter( 'stylesheet', [$this, 'stylesheet'] );
        remove_filter( 'template',   [$this, 'template']   );
    }

    /**
     * Exchange stylesheet
     *
     * @access public
     *
     * @param string $stylesheet Current stylesheet
     * @return string
     */
    public function stylesheet( string $stylesheet ): string {
        if ( isset( $this->theme ) ) {
            $stylesheet = $this->theme['Stylesheet'];
        }
        return $stylesheet;
    }

    /**
     * Exchange template
     *
     * @access public
     *
     * @param string $template Current template
     * @return string
     */
    public function template( string $template ): string {
        if ( isset( $this->theme ) ) {
            $template = $this->theme['Template'];
        }
        return $template;
    }

}
