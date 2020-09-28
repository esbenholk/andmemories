<?php
	/**
	 * @package Slider
	 */
	/*
	Plugin Name: Custom Slider by Esben Holk
	Plugin URI: www.houseofkilling.com
	Description: simple custom slider
	Version: 0
	Author: Esben Holk
	Author URI: www.houseofkilling.com
	License: GPLv2 or later
	Text Domain: Esben Holks Slider
	*/
	?>



<?php

	function add_scripts() {

        wp_register_script( 'script', plugins_url( '/js/script.js', __FILE__ ), array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'script' );

        wp_register_script( 'stick', "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'stick' );

        wp_register_style( 'stick-style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css' );
        wp_enqueue_style('stick-style');

        wp_enqueue_style( 'my_styles', plugins_url( '/css/style.css', __FILE__ ), '', '1.0' );


    }
    
	add_action( 'wp_enqueue_scripts', 'add_scripts' );



    function slider_function($atts) {

                // Attributes
            $images = shortcode_atts(
                    array(
                        'src' => '',
                    ),
                    $atts
                );
            $output = '';
            if ( !$images['src'] )
            return $output;

            $no_whitespaces = preg_replace( '/\s*,\s*/', ',', filter_var( $images['src'], FILTER_SANITIZE_STRING ) );
            $src_array = explode( ',', $no_whitespaces );

            $output = '<div class="ticker-wrapper">';
                $output .= '<div class="ticker" >';
                foreach ( $src_array as $image_src ) {
                    // From your code, link 1 is different, so I kept it as is

                        $output .= '<img class="ticker-image"  src="' .$image_src . '"/>';
                    }

            $output .= '</div>';
            $output .= '</div>';


            $return = $output;


        // Return HTML code
        return $return;


    }



    function image_grid($atts) {
            $images = shortcode_atts(
                    array(
                        'src' => '',
                    ),
                    $atts
                );
            $output = '';
            if ( !$images['src'] )
            return $output;

            $no_whitespaces = preg_replace( '/\s*,\s*/', ',', filter_var( $images['src'], FILTER_SANITIZE_STRING ) );
            $src_array = explode( ',', $no_whitespaces );

            $output = '<div class="image_grid">';
                $output .= '<div class="grid" >';
                foreach ( $src_array as $image_src ) {
                    // From your code, link 1 is different, so I kept it as is

                        $output .= '<img class="grid-image"  src="' .$image_src . '"/>';
                    }

            $output .= '</div>';
            $output .= '</div>';


            $return = $output;


        // Return HTML code
        return $return;


        }



    function carousel($atts) {
            $images = shortcode_atts(
                    array(
                        'src' => '',
                    ),
                    $atts
                );
            $output = '';
            if ( !$images['src'] )
            return $output;

            $no_whitespaces = preg_replace( '/\s*,\s*/', ',', filter_var( $images['src'], FILTER_SANITIZE_STRING ) );
            $src_array = explode( ',', $no_whitespaces );

       
            $output = '<div class="carousel" >';
                foreach ( $src_array as $image_src ) {
                        $output .= '<img class="carousel-image"  src="' .$image_src . '"/>';
                    }

            $output .= '</div>';


            $return = $output;


        // Return HTML code
        return $return;


    }





    add_shortcode('image_grid', 'image_grid');
    add_shortcode('slider', 'slider_function');
    add_shortcode('carousel', 'carousel');




?>
