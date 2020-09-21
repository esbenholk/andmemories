<?php
	/**
	 * @package Slider
	 */
	/*
	Plugin Name: Custom SLider by Esben Holk
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

	function get_styles() {
        wp_enqueue_style( 'slider',  plugin_dir_url( __FILE__ ) . '/css/style.css' );
        wp_enqueue_style( 'ticker',  plugin_dir_url( __FILE__ ) . '/js/script.js' , array( 'jquery' ), '2.1.2', true );

	}
	add_action( 'wp_enqueue_scripts', get_styles );


?>

<?php




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

            $output = '<div class="carousel-wrapper">';
                $output .= '<div class="carousel" >';
                foreach ( $src_array as $image_src ) {
                    // From your code, link 1 is different, so I kept it as is

                        $output .= '<img class="carousel-image"  src="' .$image_src . '"/>';
                    }

            $output .= '</div>';
            $output .= '</div>';


            $return = $output;


        // Return HTML code
        return $return;


    }





    add_shortcode('image_grid', 'image_grid');
    add_shortcode('slider', 'slider_function');
    add_shortcode('carousel', 'carousel');




?>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


<script type="text/javascript">

    window.onload = function(e){
        if(document.getElementsByClassName("ticker-image").length>0){
            let initial = document.getElementsByClassName("ticker-image")[0]
            initial.classList.add("initial")
            if(document.body.clientWidth>720){
                startSlider();
            }
        } 
        if(document.getElementsByClassName("carousel-image").length>0){
            let initial = document.getElementsByClassName("carousel-image")[0]
            initial.classList.add("initial")
            if(document.body.clientWidth>720){
                startCarousel();
            }
        }

    

    }
    function startCarousel(){
        var carouselWrappers = document.getElementsByClassName("carousel-wrapper");
        let nettoImagesWidth = 0;
        let containerWidth = document.body.clientWidth;

        for (let index = 0; index < carouselWrappers.length; index++) {
            let images = document.getElementsByClassName("carousel-image");

            for (let index = 0; index < images.length; index++) {
                nettoImagesWidth = nettoImagesWidth+ images[index].clientWidth;
            }

            // if(nettoImagesWidth > containerWidth){
            //     console.log(nettoImagesWidth);
                runCarousel(carouselWrappers[index]);
            // }

        }
    }


    function runCarousel(element){

        $(document).ready(function(){
            $('.carousel').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                centerMode: true,
                variableWidth: true,
                autoplay: true,
                autoplaySpeed: 2000   

                
            });
        });
          
        

    }





    function startSlider(){
        var tickerWrappers = document.getElementsByClassName("ticker-wrapper");
        let nettoImagesWidth = 0;
        let containerWidth = document.body.clientWidth;

        for (let index = 0; index < tickerWrappers.length; index++) {
            let images = document.getElementsByClassName("ticker-image");

            for (let index = 0; index < images.length; index++) {
                nettoImagesWidth = nettoImagesWidth+ images[index].clientWidth;
            }

            if(nettoImagesWidth > containerWidth){
                console.log(nettoImagesWidth);
                runSlider(tickerWrappers[index]);
            }

        }
    }

    function runSlider(element){
        let ticker = element.getElementsByClassName("ticker")[0];
        var images = ticker.getElementsByTagName("img");


        var left = ticker.offsetLeft;
        var animId;


        function slide() {
                if(document.body.clientWidth>720){
                    
                    left -= 0.5;

                    if (left <= -images[0].offsetWidth) {
                        left += images[0].offsetWidth;

                        let nettoImagesWidth = 0;
                        let containerWidth = document.body.clientWidth;

                        for (let index = 0; index < images.length; index++) {
                            nettoImagesWidth = nettoImagesWidth+ images[index].clientWidth;
                        }

                        nettoImagesWidth = nettoImagesWidth - images[0].clientWidth;
                        
                        if(nettoImagesWidth > containerWidth){
                            ticker.appendChild(images[0]);
                        } else{
                            images[0].style.left = 0 + "px"
                            ticker.appendChild(images[0]);
                        }

                    }

                    ticker.style.left = left + "px";

                } else{
                    cancelAnimationFrame(animId);
                    ticker.style.left = 0;
                }


                animId = requestAnimationFrame(slide);
        }

        slide();

    }








</script>
