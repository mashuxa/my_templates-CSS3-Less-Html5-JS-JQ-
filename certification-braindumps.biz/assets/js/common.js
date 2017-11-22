(function ($) {
    
    $('.aside .category span').click(function () {
        $(this).parent().children(".post-links").slideToggle();
        $(this).toggleClass("open");
    });  
})(jQuery);