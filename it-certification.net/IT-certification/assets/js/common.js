 
(function( $ ) { 
        $(".category .category-item").click(function () { 
        $(this).parent().children("ul").slideToggle();  
        $(this).toggleClass("open"); 
            
    });  
    
    function getRightPosition(parElem, elem) {
        var parElemPositionLeft = parElem.position().left;
        var parElemWidth = parElem.innerWidth();
        var arrowPositionRight = parElemPositionLeft + parElemWidth - 70; 
        elem.css({ 'left': arrowPositionRight + 'px'}); 
    }   
    function toggleArrow() { 
        var scrollPosition = $("body").scrollTop();
        var elemArrow = $(".arrow-return");
        if (scrollPosition > 200) {
            elemArrow.fadeIn(1500, "linear");
        } else {elemArrow.fadeOut(1500, "linear");} 
    }
     
    $(window).scroll(function () {
        toggleArrow();
    });
    $(window).ready(function() {
        getRightPosition($(".main"), $(".arrow-return"));
    });
    $(window).resize(function() {
        getRightPosition($(".main"), $(".arrow-return"));
    });
        
    
} )( jQuery ); 