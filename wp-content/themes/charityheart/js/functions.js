
(function ($) {
    "use strict";
    $("[data-progress-animation]").each(function() {
        var $this = $(this);
        $this.appear(function() {
          	var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);
          	if(delay > 1) $this.css("animation-delay", delay + "ms");
          	setTimeout(function() { $this.animate({width: $this.attr("data-progress-animation")}, 800);}, delay);
        }, {accX: 0, accY: -50});
      });

    $.fn.wrapStart = function(numWords){
        return this.each(function(){
            var $this = $(this);
            var node = $this.contents().filter(function(){
                return this.nodeType == 3;
            }).first(),
            text = node.text().trim(),
            first = text.split(' ', 1).join(" ");
            if (!node.length) return;
            node[0].nodeValue = text.slice(first.length);
            node.before('<b>' + first + '</b>');
        });
    }; 

    jQuery(document).ready(function() {
        $('.mod-heading .widget-title > span').wrapStart(1);
        function init_owl() {
            $(".owl-carousel[data-carousel=owl]").each( function(){
                var config = {
                    loop: false,
                    nav: $(this).data( 'nav' ),
                    dots: $(this).data( 'pagination' ),
                    items: 4,
                    navText: ['<span class="mn-icon-192"></span>', '<span class="mn-icon-193"></span>']
                };
            
                var owl = $(this);
                if( $(this).data('items') ){
                    config.items = $(this).data( 'items' );
                }

                if ($(this).data('large')) {
                    var desktop = $(this).data('large');
                } else {
                    var desktop = config.items;
                }
                if ($(this).data('medium')) {
                    var medium = $(this).data('medium');
                } else {
                    var medium = config.items;
                }
                if ($(this).data('smallmedium')) {
                    var smallmedium = $(this).data('smallmedium');
                } else {
                    var smallmedium = config.items;
                }
                if ($(this).data('extrasmall')) {
                    var extrasmall = $(this).data('extrasmall');
                } else {
                    var extrasmall = 2;
                }
                if ($(this).data('verysmall')) {
                    var verysmall = $(this).data('verysmall');
                } else {
                    var verysmall = 1;
                }
                config.responsive = {
                    0:{
                        items:verysmall
                    },
                    320:{
                        items:extrasmall
                    },
                    768:{
                        items:smallmedium
                    },
                    980:{
                        items:medium
                    },
                    1280:{
                        items:desktop
                    }
                }
                if ( $('html').attr('dir') == 'rtl' ) {
                    config.rtl = true;
                }
                $(this).owlCarousel( config );
                // owl enable next, preview
                var viewport = jQuery(window).width();
                var itemCount = jQuery(".owl-item", $(this)).length;

                if(
                    (viewport >= 1280 && itemCount <= desktop) //desktop
                    || ((viewport >= 980 && viewport < 1280) && itemCount <= medium) //desktop
                    || ((viewport >= 768 && viewport < 980) && itemCount <= smallmedium) //tablet
                    || ((viewport >= 320 && viewport < 768) && itemCount <= extrasmall) //mobile
                    || (viewport < 320 && itemCount <= verysmall) //mobile
                ) {
                    $(this).find('.owl-prev, .owl-next').hide();
                }
            } );
        }
        setTimeout(function(){
            init_owl();
        }, 50);
        // Fix owl in bootstrap tabs
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href");
            var carousel = $(".owl-carousel[data-carousel=owl]", target).data('owlCarousel');

            if ($(".owl-carousel[data-carousel=owl]", target).length > 0) {
                carousel._width = $(".owl-carousel[data-carousel=owl]", target).width();
                carousel.invalidate('width');
                carousel.refresh();
            }
            initProductImageLoad();
        });

        // loading ajax
        $('[data-load="ajax"] a').click(function(){
            var $href = $(this).attr('href');
            var self = $(this);
            var main = $($href);
            if ( main.length > 0 && main.data('loaded') == false ) {
                var height = main.parent().find('.tab-pane').first().height();

                main.data('loaded', 'true');
                var loading = $('<div class="ajax-loading"></div>');
                loading.css('height', height);
                main.html(loading);
                $.ajax({
                    url: charityheart_ajax.ajaxurl,
                    type:'POST',
                    dataType: 'html',
                    data:  'action=apus_get_products&columns=' + main.data('columns') + '&product_type=' + main.data('product_type') + '&number=' + main.data('number') + '&categories=' + main.data('categories')
                }).done(function(reponse) {
                    main.html( reponse );
                    if ( main.find('.owl-carousel') ) {
                        init_owl();
                    }
                    initProductImageLoad();
                });
                return true;
            }
        });

        setTimeout(function(){
            initProductImageLoad();
        }, 500);
        function initProductImageLoad() {
            $(window).off('scroll.unveil resize.unveil lookup.unveil');
            var $images = $('.image-wrapper:not(.image-loaded) .unveil-image'); // Get un-loaded images only
            if ($images.length) {
                var scrollTolerance = 1;
                $images.unveil(scrollTolerance, function() {
                    $(this).parents('.image-wrapper').first().addClass('image-loaded');
                });
            }

            var $images = $('.product-image:not(.image-loaded) .unveil-image'); // Get un-loaded images only
            if ($images.length) {
                var scrollTolerance = 1;
                $images.unveil(scrollTolerance, function() {
                    $(this).parents('.product-image').first().addClass('image-loaded');
                });
            }
        }

        //counter up
        if($('.counterUp').length > 0){
            $('.counterUp').counterUp({
                delay: 10,
                time: 800
            });
        }

        /*---------------------------------------------- 
         * Play Isotope masonry
         *----------------------------------------------*/  
        jQuery('.isotope-items,.blog-masonry').each(function(){  
            var $container = jQuery(this);
            
            $container.isotope({
                itemSelector : '.isotope-item',
                transformsEnabled: true         // Important for videos
            });
        });
        /*---------------------------------------------- 
         *    Apply Filter        
         *----------------------------------------------*/
        jQuery('.isotope-filter li a').on('click', function(){
           
            var parentul = jQuery(this).parents('ul.isotope-filter').data('related-grid');
            jQuery(this).parents('ul.isotope-filter').find('li a').removeClass('active');
            jQuery(this).addClass('active');
            var selector = jQuery(this).attr('data-filter'); 
            jQuery('#'+parentul).isotope({ filter: selector }, function(){ });
            
            return(false);
        });

        //Sticky Header
        setTimeout(function(){
            change_margin_top();
        }, 50);
        $(window).resize(function(){
            change_margin_top();
        });
        function change_margin_top() {
            if ($(window).width() > 991) {
                if ( $('.main-sticky-header').length > 0 ) {
                    var header_height = $('.main-sticky-header').outerHeight();
                    $('.main-sticky-header-wrapper').css({'height': header_height});
                }
            }
        }
        var main_sticky = $('.main-sticky-header');
        
        if ( main_sticky.length > 0 ){
            var _menu_action = main_sticky.offset().top;
            var Apus_Menu_Fixed = function(){
                "use strict";

                if( $(document).scrollTop() > _menu_action ){
                  main_sticky.addClass('sticky-header');
                }else{
                  main_sticky.removeClass('sticky-header');
                }
            }
            if ($(window).width() > 991) {
                $(window).scroll(function(event) {
                    Apus_Menu_Fixed();
                });
                Apus_Menu_Fixed();
            }
        }

        //Tooltip
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })

        $('.topbar-mobile .dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });

        var back_to_top = function () {
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() > 400) {
                    jQuery('#back-to-top').addClass('active');
                } else {
                    jQuery('#back-to-top').removeClass('active');
                }
            });
            jQuery('#back-to-top').on('click', function () {
                jQuery('html, body').animate({scrollTop: '0px'}, 800);
                return false;
            });
        };
        back_to_top();
        
        // popup
        $(document).ready(function() {
            $(".popup-image").magnificPopup({type:'image'});
            $('.popup-video').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });

        // mobile menu
        $('[data-toggle="offcanvas"], .btn-offcanvas').on('click', function (e) { 
            e.stopPropagation();
            $('#wrapper-container').toggleClass('active');
            $('#apus-mobile-menu').toggleClass('active');           
            $('.overflow-wrapper-canvas').toggleClass('active');           
        });
        $('body').click(function() {
            if ($('#wrapper-container').hasClass('active')) {
                $('#wrapper-container').toggleClass('active');
                $('#aups-mobile-menu').toggleClass('active');
                $('.overflow-wrapper-canvas').toggleClass('active');
            }
        });
        $('#apus-mobile-menu').click(function(e) {
            e.stopPropagation();
        });

        $("#main-mobile-menu .icon-toggle").on('click', function(){
            $(this).parent().find('.sub-menu').slideToggle();
            if ( $(this).find('i').hasClass('fa-plus') ) {
                $(this).find('i').removeClass('fa-plus').addClass('fa-minus');
            } else {
                $(this).find('i').removeClass('fa-minus').addClass('fa-plus');
            }
            return false;
        } );

        // preload page
        var $body = $('body');
        if ( $body.hasClass('apus-body-loading') ) {

            setTimeout(function() {
                $body.removeClass('apus-body-loading');
                $('.apus-page-loading').fadeOut(250);
            }, 500);
        }

        // progress
        $('.progress-bar-circle').each(function(){
            var $color = $(this).data('color');
            $(this).circleProgress({
                fill: { color: $color },
                emptyFill: '#e0e0e0',
                lineCap: 'round',

            });
        });

        // demo site bar
        $('.about-us-sidebar-btn').click(function(){
            $('#about-us-sidebar').toggleClass('active');
            $('.about-us-sidebar-panel-overlay').toggleClass('active');
        });
        $('.about-us-sidebar-panel-overlay').click(function(){
            $(this).removeClass('active');
            $('#about-us-sidebar').removeClass('active');
        });
        $('.about-us-sidebar-wrapper').perfectScrollbar();

        // gmap 3
        $('.apus-google-map').each(function(){
            var lat = $(this).data('lat');
            var lng = $(this).data('lng');
            var zoom = $(this).data('zoom');
            var id = $(this).attr('id');
            
            $('#'+id).gmap3({
                map:{
                    options:{
                        "draggable": true
                        ,"mapTypeControl": true
                        ,"mapTypeId": google.maps.MapTypeId.ROADMAP
                        ,"scrollwheel": false
                        ,"panControl": true
                        ,"rotateControl": false
                        ,"scaleControl": true
                        ,"streetViewControl": true
                        ,"zoomControl": true
                        ,"center":[lat, lng]
                        ,"zoom": zoom
                        ,'styles': [ { "visibility": "on" }, { "invert_lightness": true }, { "lightness": 61 }, { "gamma": 0.36 }, { "saturation": -100 } ]
                    }
                },
                marker:{
                  latLng: [lat, lng]
                }
            });
        });

        // popup newsletter
        setTimeout(function(){
            var hiddenmodal = getCookie('hiddenmodal');
            if (hiddenmodal == "") {
                jQuery('#popupNewsletterModal').modal('show');
            }
        }, 3000);
        $('#popupNewsletterModal').on('hidden.bs.modal', function () {
            setCookie('hiddenmodal', 1, 30);
        });
    });
    
})(jQuery)


function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires+";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
