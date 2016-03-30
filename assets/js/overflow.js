(function($) {
    $.fn.isOverflowWidth = function() {
        return this.each(function() {
            var el = $(this);
            if (el.css("overflow") == "hidden") {
                var text = el.html();
                var t = $(this.cloneNode(true)).hide().css('position', 'absolute').css('overflow', 'visible').width('auto').height(el.height());
                el.after(t);    
                function width() {
                    return t.width() > el.width();
                };
                alert(width());
            }
        });
    };
})(jQuery);
(function($) {
    $.fn.isOverflowHeight = function() {
        return this.each(function() {
            var el = $(this);
            if (el.css("overflow") == "hidden") {
                var text = el.html();
                var t = $(this.cloneNode(true)).hide().css('position', 'absolute').css('overflow', 'visible').height('auto').width(el.width());
                el.after(t);

                // function height() {

                //     return t.height() > el.height();
                // };
                // console.log(t);
                if(t.height() > el.height()){
                    $("#menu-btn").show();
                }else{
                    $("#menu-btn").hide();
                }
                t.remove();
            }
        });
    };
})(jQuery);
