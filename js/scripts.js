
import slick from '../node_modules/slick-carousel/slick/slick.min.js';
import lity from '../node_modules/lity/dist/lity.min.js';
import matchHeight from '../node_modules/jquery-match-height/dist/jquery.matchHeight.js';


(function ($, root, undefined) {

    $(function () {

        'use strict';




        var $post_sliders = $(".post_slider");
            $post_sliders.slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                centerMode: false,
                variableWidth: true
            });




        var $first_articles_sliders = $('.first_articles_slider');
            $first_articles_sliders.slick({
                dots: true,
                infinite: true,
                arrows: false,
                autoplay: true
            })


        var $image_sliders = $('.image_slider');
            $image_sliders.slick({
                dots: false,
                infinite: true,
                arrows: true,
                autoplay: true
            })


            var $partners_slider = $('.partners_slider');
                $partners_slider.slick({
                    dots: false,
                    infinite: true,
                    arrows: true,
                    autoplay: true,
                    centerMode: true,
                    variableWidth: true
                })




        $('.city_match').matchHeight();




        // subscription form
        var $abonne_labels = $('.abonne_label');
        $abonne_labels.on('click', function(){
            $abonne_labels.removeClass('selected');
            $(this).addClass('selected');
        })



        var $navigation_menu = $('#navigation_menu');
        var $menu_buttons = $('.menu_button');
        var $nav_overlay = $('#nav_overlay');

        $menu_buttons.on('click', function(e){

            e.preventDefault();

            $navigation_menu.toggleClass('menu_visible');
            $nav_overlay.toggleClass('menu_visible');

        });

        $nav_overlay.on('click', function(){
            $navigation_menu.removeClass('menu_visible');
            $nav_overlay.removeClass('menu_visible');
        })

        // if press escape key, hide menu
        $(document).on('keydown', function(e){

            if(e.keyCode == 27 ){
                $navigation_menu.removeClass('menu_visible');
                $nav_overlay.removeClass('menu_visible');

                $('.search_box').removeClass('visible');
            }

        })



        $('.menu-item-has-children > a').each(function(){
            var $this = $(this);
            $this.append('<div class="expander">Expand</div>');

            $('.expander', $this).on('click', function(e){
                e.preventDefault();
                $this.parent().find('ul').toggle();
            })
        })





        // MAP
                if (typeof lat != 'undefined' && typeof lng != 'undefined') {

                    console.log(lat,lng);

                    var map_theme = [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}];

                    var map_options = {
                        zoom: 14,
                        mapTypeControl: true,
                        scrollwheel: false,
                        draggable: true,
                        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        styles: map_theme
                    };


                    var location_map_container = $('#map_container');
                    location_map_container.css({
                        width : '100%'
                    })

                    var location_map = new google.maps.Map(location_map_container.get(0), map_options);

                    // var infowindow = new google.maps.InfoWindow({content: ''});
                    var position = new google.maps.LatLng(lat,lng);

                       var marker = new google.maps.Marker({
                         position: position,
                         map: location_map,
                         optimized: false
                       });

                       location_map.setCenter(position);


                }; // END  IF MAPLOCATION
                // END OF MAP
    });

})(jQuery, this);
