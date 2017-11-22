 (function ($) {
     //Slider settings
     $(document).ready(function () {
         $('.slider').slick({
             autoplay: true
             , fade: true
             , autoplaySpeed: 10000
             , dots: false
             , infinite: true
             , speed: 500
             , slidesToShow: 1
             , slidesToScroll: 1
         });
     });
     //Focus out from mobile-menu (close menu)
     $(document).mouseup(function (e) {
         if ($(".nav-menu").has(e.target).length === 0) {
             $("#checkbox-toggle-menu").prop('checked', "");
         }
     });
     //Opacity for login-menu (user-menu) when scrolled
     $(window).scroll(function () {
         if ($(this).scrollTop() > 50 && $(window).width() > 767) {
             $('.login-menu .menu-item').css("opacity", "0.3");
         }
         else {
             $('.login-menu .menu-item').css("opacity", "1");
         }
     });
     //Close window  
     $(document).on('click', '.btn-close', function () {
         $(this).parent().parent().remove();
         $("body > *:not(.popup-wrapper)").removeClass("blur");
     });
     //Add popups for login/registration
//     $(document).on('click', '.login-menu .menu-item', function () {
//         var dataSrc = $(this).attr("data-src");
//         $("body > *:not(.popup-wrapper)").addClass("blur");
//         $.get("forms/" + dataSrc, function (data) {
//             var popupContent = data;
//             $(".popup").remove();
//             $("body").append(popupContent);
//         });
//     });
     //Add popup free-demo
     $(document).ready(function () {
         if ($("title").text() == "Demos") {
             setTimeout(function () {
                 $("body > *:not(.popup-wrapper)").addClass("blur");
                 $.get("forms/popup-free-demo.html", function (data) {
                     var popupContent = data;
                     $("body").append(popupContent);
                 });
             }, 5000);
         }
     });
     //FAQ list open/close  
     $(document).on('click', '.section-title', function () {
         $(this).parent().toggleClass("open");
         $(this).next('ul').toggle(300, "linear");
     });
     $(document).on('click', '.question', function () {
         $(this).next('.answer').toggle(300, "linear");
     });
     //Add button "buy" to product block 
     $(document).ready(function () {
         $(".my-products").find('.item.not-activated').each(function () {
             $(this).find(".img-wrapper").append('<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>');
         });
     }); 
     
          //Add action to button "show/hide"
     $(document).on('click', '.show-hide', function () {
         $(this).toggleClass('open');
         if ( $(this).hasClass("open")) {
             $(this).text("Hide"); 
         } else {
             $(this).text("Show more"); 
         }
         $(".news-fixed li:nth-of-type(3) ~ li").slideToggle(300, "linear");
         
     });
     
     //Add action "enlarging" for images
     $(document).on('click', '.enlarge', function () {
         $("body").find(".enlarge-active").remove();
         $(this).clone().appendTo("body").removeClass("enlarge").addClass("enlarge-active").css({
             'position': 'fixed',
             'width': '50%',
             'height': 'auto',
             'max-height': '100%', 
             'top': 0,
             'left': 0,
             'bottom': 0,
             'right': 0,
             'margin': 'auto' 
         });
     });
     $(document).on('click', '.enlarge-active', function () {
         $(this).remove();
     });
  
 })(jQuery);