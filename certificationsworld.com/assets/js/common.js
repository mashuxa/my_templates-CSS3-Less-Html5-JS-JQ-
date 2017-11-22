(function ($) {
    
    
    $(document).mouseup(function (e) {
        if ($(".aside").has(e.target).length === 0) {
            $("#checkbox-toggle-menu").prop('checked', "");
        }
    });
    
    $('.category-item').click(function () {
        $(this).parent().children(".post-links").slideToggle();
        $(this).toggleClass("open");
    });  
    
    $(window).scroll(function () {
      if ($(this).scrollTop() > 1) {
          $('.header h1').css("padding", "0 0 10px 0");
      }
      else {
          $('.header h1').css("padding", "88px 0");
      }
  });
    
    
})(jQuery);


