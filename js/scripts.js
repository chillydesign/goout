import slick from '../node_modules/slick-carousel/slick/slick.min.js';



(function ($, root, undefined) {

	$(function () {

		'use strict';


        $(".post_slider").slick({
          dots: false,
          infinite: true,
          speed: 300,
          slidesToShow: 1,
          centerMode: false,
          variableWidth: true
        });

        $('.image_slider').slick({
            dots: true,
            infinite: true,
            centerMode: false
        });


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
