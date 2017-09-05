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


				var $navigation_menu = $('#navigation_menu');
				var $menu_button = $('#menu_button');

				$menu_button.on('click', function(){

					$navigation_menu.toggleClass('menu_visible');

				});

				// if press escape key, hide menu
				$(document).on('keydown', function(e){

					if(e.keyCode == 27 ){
						$navigation_menu.removeClass('menu_visible');

				 		$('.search_box').removeClass('visible');
					}

				})


	});

})(jQuery, this);
