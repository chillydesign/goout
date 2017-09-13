
import slick from '../node_modules/slick-carousel/slick/slick.min.js';
import lity from '../node_modules/lity/dist/lity.min.js';


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
                dots: true,
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
                    centerMode: false,
                    variableWidth: true
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


    });

})(jQuery, this);
