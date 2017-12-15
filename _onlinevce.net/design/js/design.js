(function($) {  
    
//    var navHeight;
    function resizeSiebarNav() {
    $(".nav").outerHeight(0);
    $(".nav").outerHeight($(".main").innerHeight() - $(".aside .header").innerHeight());
        navHeight =  $(".nav").outerHeight();   
} 
 
    
    $( document ).ready(function() {
        resizeSiebarNav();
    });
    $(window).resize(function() {
        resizeSiebarNav();
    });



    $( ".aside .header .fa" ).click(function() {
      $( this ).closest(".aside").toggleClass("open");
      setTimeout(resizeSiebarNav, 1000);
        
    });








})(jQuery);

jQuery(document).ready(function(){
    jQuery('.scrollbar-inner').scrollbar();
});
//
//2
//3
//4
//5
//<div class="some-content-related-div">
//<div id="inner-content-div">
//<p>Lorem ipsum dolor sit amet, consectetur .... snip</p>
//</div>
//</div>
//Code to attach slimScroll:
//
//?
//1
//2
//3
//4
//5
//$(function(){
//    $('#inner-content-div').slimScroll({
//        height: '250px'
//    });
//});