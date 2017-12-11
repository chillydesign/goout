
import slick from '../node_modules/slick-carousel/slick/slick.min.js';
import lity from '../node_modules/lity/dist/lity.min.js';
import matchHeight from '../node_modules/jquery-match-height/dist/jquery.matchHeight.js';
import Instafeed from '../node_modules/instafeed.js/instafeed.js';
import Headroom from '../node_modules/headroom.js/dist/headroom.js';
require('jquery.viewport');

(function ($, root, undefined) {

    $(function () {

        'use strict';


        // do window.scroll events periodically to save resoutces
        var scrollTimer = null;
        var $window = $(window);
        $window.scroll(function () {
            if (scrollTimer) {
                clearTimeout(scrollTimer);   // clear any previous pending timer
            }
            scrollTimer = setTimeout(handleScroll, 100);   // set new timer
        });

        handleScroll();
        function handleScroll() {
            scrollTimer = null;
            $('.animate_in_viewport:in-viewport').addClass('animating');
        }


        var $issues_sliders = $(".issues_slider");
        var $latest_edition_covers = $('.latest_edition_cover');
        var $prev_issue_number = $('#prev_issue_number');
        var $next_issue_number = $('#next_issue_number');
        $issues_sliders.slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            centerMode: false,
            variableWidth: true
        });

        // update the issue numbers on the slider arrows
        $issues_sliders.on('afterChange', function(event, slick, currentSlide, nextSlide){

            var $nextSlideIndex = ((currentSlide + 1 + 5) % 5);
            var $prevSlideIndex = ((currentSlide - 1 + 5) % 5);
            var $nextSlide = $latest_edition_covers[ $nextSlideIndex  ];
            var $prevSlide = $latest_edition_covers[ $prevSlideIndex ];
            var $nextIssueNumber = $nextSlide.dataset.issuenumber;
            var $prevIssueNumber = $prevSlide.dataset.issuenumber;
            $next_issue_number.html($nextIssueNumber);
            $prev_issue_number.html($prevIssueNumber);

        });




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




        // construct an instance of Headroom, passing the element
        var header_headroom = document.getElementById("secondary_header");
        var headroom  = new Headroom(header_headroom);
        headroom.init(); // initialise




        // match height
        $('.city_match').matchHeight();


        var $member_details = $('.member_details');
        $('.member_container').on('click', function(e){
            e.preventDefault();
            var $this = $(this);
            var $member = $this.data('member');
            $('.member_details .member_detail').removeClass('member_visible');
            $('#' + $member   ).addClass('member_visible');
            $('html,body').animate({ scrollTop: $member_details.offset().top }, 1000);
        })



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
            $('.pushydiv').toggleClass('pushybody');

        });

        $nav_overlay.on('click', function(){
            $navigation_menu.removeClass('menu_visible');
            $nav_overlay.removeClass('menu_visible');
              $('.pushydiv').removeClass('pushybody');
        })

        // if press escape key, hide menu
        $(document).on('keydown', function(e){

            if(e.keyCode == 27 ){
                $navigation_menu.removeClass('menu_visible');
                $nav_overlay.removeClass('menu_visible');
                  $('.pushydiv').removeClass('pushybody');

                $('.search_box').removeClass('visible');
            }

        })


        // submenus in navigation
        $('.menu-item-has-children > a').each(function(){
            var $this = $(this);
            $this.append('<div class="expander">Expand</div>');

            $('.expander', $this).on('click', function(e){
                var $expander = $(this);
                e.preventDefault();
                $this.parent().find('ul').toggle();
                $expander.toggleClass('expanded');
            })
        })


        var $down_arrow = $('#down_arrow');
        var $header = $('#header');
        $down_arrow.on('click', function(e){
            e.preventDefault();
            $("html, body").animate({ scrollTop: $header.offset().top }, 1000);
        })




        // instagram
        if ( $('#instafeed').length  ) {
            var feed = new Instafeed({
                get: 'user',
                userId: 349717879,
                accessToken: '349717879.1677ed0.9f51e62ce0034d3baa1be090f1855602',
                sortBy: 'most-recent',
                limit: 6,
                resolution: 'standard_resolution',
                template: '<a href="{{link}}" style="background-image:url({{image}})"></a>',
                success: function(data) {
                }
            });
            feed.run();
        }



        // MAP
        var location_map_container = $('#map_container');

        if ( location_map_container.length  ) {

            if (    typeof lat != 'undefined' && typeof lng != 'undefined'  ) {

                var position = new google.maps.LatLng(lat,lng);
                create_map(position, 14, location_map_container);

            } else if (typeof place_location  != 'undefined') {

                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({'address': place_location}, function(results, status) {
                    if (status === 'OK') {
                        if (results.length > 0) {
                            var position =  results[0].geometry.location ;
                            create_map(position, 16,  location_map_container);
                        }

                    } else {
                        console.log('Geocode was not successful for the following reason: ' + status);
                    }
                });


            }

        }; // end of if have a #map_container
        // END OF MAP
    });


    function create_map(position, zoom,  location_map_container) {


        var map_theme = [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}];

        var map_options = {
            zoom: zoom,
            mapTypeControl: true,
            scrollwheel: false,
            draggable: true,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: map_theme
        };



        location_map_container.css({
            width : '100%'
        })

        var location_map = new google.maps.Map(location_map_container.get(0), map_options);

        // var infowindow = new google.maps.InfoWindow({content: ''});
        var icon_url = 'https://webfactor.ch/projets/goout/wp-content/themes/goout/img/map_marker.png';

        var marker = new google.maps.Marker({
            position: position,
            map: location_map,
            optimized: false,
            icon: icon_url
        });

        location_map.setCenter(position);

    }



})(jQuery, this);
