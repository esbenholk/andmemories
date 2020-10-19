/* global AndMemoriesScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */



(function( $ ) {

	(function() {
        start();
    })();

    function start(){
        let animated_columns = $(".animated-column")

        let siteHeader = $("#masthead")
        siteHeader.css("height", window.innerHeight +"px")
   
        let RGBs = [[163, 213, 205],[73, 71, 150], [0, 148, 117],[139, 178, 76],[234, 88, 59], [248, 223, 0],[192, 218, 142],[244, 150, 67],[147, 169, 206]]

        //set random rgb to column
            for (let index = 0; index < animated_columns.length; index++) {
                const element = animated_columns[index];
                currentcolor = RGBs[Math.floor(Math.random()*RGBs.length)];
                element.style.backgroundColor =  'rgb(' + currentcolor.toString() + ')';
            }

     
      
     
        let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;

        if (isMobile) {
        
            let last_known_scroll_position = 0;

            document.addEventListener("scroll", function(evt){
               if(window.scrollY - last_known_scroll_position > 35 ||window.scrollY - last_known_scroll_position < -35){
                last_known_scroll_position = window.scrollY;
                
                let animated_columns = $(".animated-column");
                let changingcolumn = animated_columns[Math.floor(Math.random()*animated_columns.length)]
                
                fade(changingcolumn, 20, 10);      
               }
               
            })

         
        } else {
            addEventstoColumns();
        }


    }

    // window.onresize = function(){
    //     console.log("change function");
        setTimeout(function(){
           start();
        }, 200)
      
    // }



    function addEventstoColumns(){
        let animated_columns = $(".animated-column")
        for (let index = 0; index < animated_columns.length; index++) {
            const element = animated_columns[index];
            //mousover change color
            element.addEventListener("mouseover", evt => 
            // setTimeout(fade(evt.target, 5,15),200)
            fade(evt.target, 5,15)
            )
            
        }
    }

    function fade(element, step, time) {

        let RGBs = [[163, 213, 205],[73, 71, 150], [0, 148, 117],[139, 178, 76],[234, 88, 59], [248, 223, 0],[192, 218, 142],[244, 150, 67],[147, 169, 206]]

  
        currentcolor = element.style.backgroundColor.match(/\d+/g).map(Number);
        newcolor = RGBs[Math.floor(Math.random()*RGBs.length)];

        if(currentcolor === newcolor){
            newcolor = RGBs[Math.floor(Math.random()*RGBs.length)];
        }
        steps = step;
       
        let stepcount = 1;

        var red_change = (currentcolor[0] - newcolor[0]) / steps;
        var green_change = (currentcolor[1] - newcolor[1]) / steps;
        var blue_change = (currentcolor[2] - newcolor[2]) / steps;

        var timer = setInterval(function(){
                currentcolor[0] = parseInt(currentcolor[0] - red_change);
                currentcolor[1] = parseInt(currentcolor[1] - green_change);
                currentcolor[2] = parseInt(currentcolor[2] - blue_change);

                element.style.backgroundColor = 'rgb(' + currentcolor.toString() + ')';
                stepcount += 1;
                if (stepcount >= steps) {
                    element.style.backgroundColor = 'rgb(' + newcolor.toString() + ')';
                    clearInterval(timer);
                }
            
        }, time);
       
     }

 
})( jQuery );
