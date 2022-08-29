;(function($){
    "use strict";

    $(document).ready(function(){

        /* Navbar fix */ 
        $(document).on('click','.navbar-area .navbar-nav li.menu-item-has-children>a',function(e){
            e.preventDefault();
        })  

        /* Hero Slider */
        $('.hero-slider').slick({
            dots: true,
            infinite: true,
            speed: 1200,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            arrows: false,
        });
        
        /* Feature Slider */
        $('.feature-slider').slick({
            dots: false,
            infinite: true,
            speed: 1000,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<i class="prev-arrow fa fa-long-arrow-left"></i>',
            nextArrow: '<i class="next-arrow fa fa-long-arrow-right"></i>',
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    }
                },
                    {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, 
            ]
        });

        /* Circle Progressbar */
		$('.web-progressbar').circleProgress({
			value: .9,
			size: 100,
			fill: '#7877ee',
			thickness: 7,
			emptyFill: 'rgba(0, 0, 0, .1)'
		}).on('circle-animation-progress', function(event, progress) {
			$(this).find('.progressbar-percentage').html(Math.round(90 * progress) + '<i>%</i>');
		});
		$('.wordpress-progressbar').circleProgress({
			value: .8,
			size: 100,
			fill: '#fba920',
			thickness: 7,
			emptyFill: 'rgba(0, 0, 0, .1)'
		}).on('circle-animation-progress', function(event, progress) {
			$(this).find('.progressbar-percentage').html(Math.round(80 * progress) + '<i>%</i>');
		});
		$('.after-effects-progressbar').circleProgress({
			value: .6,
			size: 100,
			fill: '#ef547c',
			thickness: 7,
			emptyFill: 'rgba(0, 0, 0, .1)'
		}).on('circle-animation-progress', function(event, progress) {
			$(this).find('.progressbar-percentage').html(Math.round(60 * progress) + '<i>%</i>');
		});
		$('.app-progressbar').circleProgress({
			value: .7,
			size: 100,
			fill: '#4ac4e3',
			thickness: 7,
			emptyFill: 'rgba(0, 0, 0, .1)'
		}).on('circle-animation-progress', function(event, progress) {
			$(this).find('.progressbar-percentage').html(Math.round(70 * progress) + '<i>%</i>');
        });
        
        /* Gallery Tab */ 
		var $grid = $('.grid').isotope({
			itemSelector: '.grid-item',
			layoutMode: 'fitRows',
		});
		// Filter Items on Click
		$('.gallery-tab li').on( 'click', function() {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ filter: filterValue });
		});
		// Active Link Switching 
		$('.gallery-tab li').on('click', function(event) {
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();
        });  
        
        /* Client Slider */
        $('.client-slider').slick({
            dots: true,
            infinite: true,
            speed: 1000,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, 
            ]
        });

        /* Relative Portfolio Slider */
        $('.realative-portfolio-slider').slick({
            dots: false,
            infinite: true,
            speed: 1000,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<i class="prev-arrow fa fa-long-arrow-left"></i>',
            nextArrow: '<i class="next-arrow fa fa-long-arrow-right"></i>',
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    }
                },
                    {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, 
            ]
        });

        /* CounterUp */
        $('.counter').counterUp({
            delay: 10,
            time: 1500
        });

        /* Nice Select */
        $('select').niceSelect();
        
        /* Mouse Hover */
        var singleBox2 = $('.hero-social-links ul li a')
        singleBox2.mouseover(function() {
            singleBox2.removeClass('active');
            $(this).addClass('active');
        });
        
        var singleBox3 = $('.single-feature-item')
        singleBox3.mouseover(function() {
            singleBox3.removeClass('active');
            $(this).addClass('active');
        });
        
        var singleBox4 = $('.single-team-member')
        singleBox4.mouseover(function() {
            singleBox4.removeClass('active');
            $(this).addClass('active');
        });

        // Hero Award Slider
        $('.hero-award-slider').slick({
            dots: true,
            infinite: true,
            speed: 800,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            arrows: false,
        });

        // Experience Slider Home 02 
        $('.experience-slider-home-2').slick({
            dots: false,
            infinite: true,
            speed: 1200,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<i class="prev-arrow fa fa-long-arrow-left"></i>',
            nextArrow: '<i class="next-arrow fa fa-long-arrow-right"></i>',
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    }
                },
                    {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, 
            ]
        });

        // Education Slider 
        $('.education-slider').slick({
            dots: false,
            infinite: true,
            speed: 1200,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    }
                },
                    {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, 
            ]
        });

        // Client Slider Home 02 
        $('.client-slider-home-2').slick({
            dots: false,
            infinite: true,
            speed: 800,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            arrows: false,
        });

        // Blog Slider Home 02 
        $('.blog-slider-home-2').slick({
            dots: false,
            infinite: true,
            speed: 1200,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<i class="prev-arrow fa fa-long-arrow-left"></i>',
            nextArrow: '<i class="next-arrow fa fa-long-arrow-right"></i>',
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    }
                },
                    {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, 
            ]
        });
        
        // Social Link Slider 
        $('.social-link-slider').slick({
            dots: false,
            infinite: true,
            speed: 1200,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    }
                },
                    {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }, 
            ]
        });

    });
      

    $(window).on('load',function(){

        /* wow js init c*/
        new WOW().init();

        /* preloader */
        var preLoder = $("#preloader");
        preLoder.fadeOut(0);

    });

})(jQuery);