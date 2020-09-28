/* global AndMemoriesScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function( $ ) {
    let RGBs = [[163, 213, 205],[73, 71, 150], [0, 148, 117],[139, 178, 76],[234, 88, 59], [248, 223, 0],[192, 218, 142],[244, 150, 67],[147, 169, 206]]

    let loadingSigns = ["/wp-content/themes/andmemories/assets/icons/SVG/Asset1.svg", "/wp-content/themes/andmemories/assets/icons/SVG/Asset2.svg", "/wp-content/themes/andmemories/assets/icons/SVG/Asset3.svg", "/wp-content/themes/andmemories/assets/icons/SVG/Asset4.svg"]
    currentcolor = RGBs[Math.floor(Math.random()*RGBs.length)];

    $(".loader").css("background-color", 'rgb(' + currentcolor.toString() + ')');

    $(window).on("load", function(){
       
        setTimeout(function(){
            $(".loader").fadeOut("slow")
        }, 1000)
        
    })

    $(".loading-sign")[0].src = loadingSigns[Math.floor(Math.random()*loadingSigns.length)] 



})( jQuery );
