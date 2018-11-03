/**
 * Theme Customizer custom scripts
 * Control of show/hide events on feature grid_content type selection
 */
(function($) {    
    /* 
     * Color scheme change
     */
    $("#customize-control-gridalicious_theme_options-color_scheme").live( "change", function() {
        var value = $('#customize-control-gridalicious_theme_options-color_scheme input:checked').val();
        if ( 'dark' == value ){
            $('#customize-control-header_textcolor .color-picker-hex').iris('color', '#dddddd');
            $('#customize-control-background_color .color-picker-hex').iris('color', '#111111');
        
        }
        else {
            $('#customize-control-header_textcolor .color-picker-hex').iris('color', '#404040');
            $('#customize-control-background_color .color-picker-hex').iris('color', '#f2f2f2');
        }
    });
     
})(jQuery);

( function( api ) {
    wp.customize( 'gridalicious_theme_options[reset_all_settings]', function( setting ) {
        setting.bind( function( value ) {
            var code = 'needs_refresh';
            if ( value ) {
                setting.notifications.add( code, new wp.customize.Notification(
                    code,
                    {
                        type: 'info',
                        message: gridalicious_data.reset_message
                    }
                ) );
            } else {
                setting.notifications.remove( code );
            }
        } );
    } );
} )( wp.customize );