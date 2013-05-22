
$(document).ready(function(){
 	//$('#block-main-menu ul').superfish();           
  $('#block-carrousel').tinycarousel({ display: 2 });
  $('#slideshow').cycle({ 
    fx:         'scrollLeft', 
    timeout:     1000, 
    pager:      '#nav', 
    pagerEvent: 'mouseover', 
    fastOnEvent: true 
  });
});