
$(document).ready(function(){
 	//$('#block-main-menu ul').superfish();           
 // $('#block-carrousel').tinycarousel({ display: 2 });
 $('#slideshow')
         .before('<div id="nav">') 
            .cycle({ 
    speed:       800, 
    timeout:     3000, 
    pager:      '#nav', 
    pagerEvent: 'mouseover', 
    pauseOnPagerHover: true 
});

});
