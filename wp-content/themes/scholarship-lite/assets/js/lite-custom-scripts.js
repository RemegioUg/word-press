jQuery(document).ready(function($) {
    "use strict";
    
    var isSticky = liteObject.menu_sticky;
    if( isSticky === 'show' ) {
        var wWidth = $( window ).width();
        var wpAdminBar = $('#wpadminbar');
        if (wpAdminBar.length) {
          $(".logo-content-wrapper").sticky({topSpacing:wpAdminBar.height()});
        } else {
          $(".logo-content-wrapper").sticky({topSpacing:0});
        }
    }
    
});