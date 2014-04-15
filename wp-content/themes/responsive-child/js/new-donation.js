(function($){
    $(function(){
        $(".select-donation-item").change(function(){            
            $(this).siblings(".donation-item-wrapper").toggle();
        });
    });
})(jQuery);

