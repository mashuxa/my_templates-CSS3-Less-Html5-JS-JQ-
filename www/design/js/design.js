(function($) {   

    $( ".aside .header .fa" ).click(function() {
      $( this ).closest(".aside").toggleClass("open"); 
    });
    $( ".see-all" ).click(function() {
      $("body").find(".aside").toggleClass("open"); 
    });



     //Add action "enlarging" for images
     $(document).on('click', '.enlarge', function () {
         $("body").find(".enlarge-active").remove();
         $(this).clone().appendTo("body").removeClass("enlarge").addClass("enlarge-active").css({
             'position': 'fixed'
             , 'width': '50%'
             , 'height': 'auto'
             , 'max-height': '100%'
             , 'top': 0
             , 'left': 0
             , 'bottom': 0
             , 'right': 0
             , 'margin': 'auto'
         });
     });
     $(document).on('click', '.enlarge-active', function () {
         $(this).remove();
     });


    $(document).ready(function(){
        $('.scrollbar-inner').scrollbar();
    }); 
    $(document).mouseup(function (e) {
         if ($(".aside").has(e.target).length === 0) { 
             $(".aside").removeClass("open");
             
         }
     }); 
})(jQuery);

