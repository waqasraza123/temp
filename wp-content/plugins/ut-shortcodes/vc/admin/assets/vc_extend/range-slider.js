/* <![CDATA[ */
!(function($){
	
	"use strict";
	
    $(document).ready(function(){
        
        $('.ut-range-slider').each(function() {
            
            $(this).slider({
                range: "max",
                min: $(this).data('min'),
                max: $(this).data('max'),
                step: $(this).data('step'),
                value: $(this).data('value'),
                slide: function( event, ui ) {
                    
                    $(this).parent().find('.wpb-textinput').val( ui.value ).trigger("change");
                    $(this).parent().find('.ut-range-value').text( ui.value );
                    
                }
            });
            
        });
        
        if( $('.vc_param_group-list').length ) {
        
            $('.vc_param_group-list').bind('DOMNodeInserted', function() {
                
                $(this).find(".ut-range-slider").each(function() {
                    
                    // check if rangeslider has been initinalized already
                    if( !$(this).hasClass("ui-widget") ) {
                        
                        $(this).addClass("ui-widget").slider({
                            range: "max",
                            min: $(this).data('min'),
                            max: $(this).data('max'),
                            step: $(this).data('step'),
                            value: $(this).data('value'),
                            slide: function( event, ui ) {

                                $(this).parent().find('.wpb-textinput').val( ui.value ).trigger("change");
                                $(this).parent().find('.ut-range-value').text( ui.value );

                            }
                        });
                        
                    }
                    
                });

            });
        
        }
        
    });
        
})(window.jQuery);
 /* ]]> */	