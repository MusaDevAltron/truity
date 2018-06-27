(function($){
  'use strict';
    $(window).on('load', function () {
        if ($(".spinner").length > 0)
        {
            $(".spinner").fadeOut("slow");
        }
    });
})(jQuery)