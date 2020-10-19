

/* global AndMemories plugin Slider*/
/**

 */



(function( $ ) {
    console.log("insane");

    (function() {
        console.log("has loaded");

       runFunctions();

    })();

    function runFunctions(){
        if(document.getElementsByClassName("ticker-image").length>0){
            let initial = document.getElementsByClassName("ticker-image")[0]
            initial.classList.add("initial")
            if(document.body.clientWidth>720){
                startSlider();
            }
        } 
        if(document.getElementsByClassName("carousel-image").length>0){
            if(document.body.clientWidth>720){
                runCarousel();
            }
        }

    }
    window.onresize = function(){
        setTimeout(function(){
            if(document.body.clientWidth>720){
                console.log("big");
                runFunctions();
            } else{
                console.log("small");
                stopCarousel();
        }

        }, 200)
      
    }

    

    function runCarousel(){
        $(document).ready(function(){
            $('.carousel').slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 1,
                centerMode: true,
                variableWidth: true,
                autoplay: true,
                autoplaySpeed: 3000   
            });
        });
          
        

    }
    function stopCarousel(){
            $('.carousel').slick('unslick');
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



})( jQuery );
