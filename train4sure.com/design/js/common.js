//mobile-menu
$(function () {
    $(".mobile-menu-trigger").click(function () {
        $(".main-navigation").toggleClass("open");
        $(".mobile-menu-trigger .fa-angle-double-left").toggleClass("open");
    });
    $(document).mouseup(function (e) {
        var container = $(".main-navigation");
        if (container.has(e.target).length === 0) {
            $(".main-navigation").removeClass("open");
            $(".mobile-menu-trigger .fa-angle-double-left").removeClass("open");
        }
    });
    $(".products-arrows").click(function () {
        $(".body").toggleClass("products-open");
    });
    //    
    $(".tab").click(function () {
        var atr = $(this).attr("for");
        $(".tab").each(function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
            }
        });
        $(this).addClass("active");
        $(".tabs .content").each(function () {
            $(this).css("display", "none");
            if ($(this).hasClass(atr)) {
                $(this).css("display", "block");
            }
        });
    });


//    
//       $(".slick-current").click(function () { 
////       $(".screenshot-slider").click(function () { 
//           console.log($(this)); 
////            $(".slick-active.slick-center  img").css({ 
////                'position':'fixed',
////                'top':'0',
////                'bottom':'0',
////                'right':'0',
////                'left':'0',
////                'margin':'auto',
////                'width' : '100vw' 
////         
////     });
////            
//    });
//    
 

    
//    
//    $(document).mouseup(function (e) {
//        var container = $(".main-navigation");
//        if (container.has(e.target).length === 0) {
//            $(".main-navigation").removeClass("open");
//            $(".mobile-menu-trigger .fa-angle-double-left").removeClass("open");
//        }
//    });
//
//
//
//
//slick-center



















});



$(document).ready(function(){
  $('.screenshot-slider').slick({
      arrows: true,
    infinite: true,
    dots: true,
      centerMode: true,
  slidesToShow: 3,
  slidesToScroll: 1
  });
});



