(function ($) {
    
    $('.slider-active').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 1,
        dots: false,
        navText: ["<span class='fa fa-chevron-left'></span>", "<span class='fa fa-chevron-right'></span>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    $('.slider-active-2').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 1,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    
    $('.course-slider-active').owlCarousel({
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 4,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
    

    $('.event-active').owlCarousel({
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin:30,
        item: 3,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
    

    $('.course-slider-active-2').owlCarousel({
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin:30,
        item: 4,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })

    $('.event-gallery-active').owlCarousel({
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin:30,
        item: 1,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    $('.producta-active').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<span class="b-navigation b-navigation-prev "><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="b-navigation b-navigation-next active"><i class="fa fa-angle-right"></i></span>',
        responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 4,
              }
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 420,
              settings: {
                slidesToShow: 1,
              }
            }
        ]
    });
  
    $('.related-slider-active').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<span class="b-navigation b-navigation-prev "><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="b-navigation b-navigation-next active"><i class="fa fa-angle-right"></i></span>',
        responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 420,
              settings: {
                slidesToShow: 1,
              }
            }
        ]
    });
    
    $('.course-slider-active-3').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<span class="b-navigation b-navigation-prev "><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="b-navigation b-navigation-next active"><i class="fa fa-angle-right"></i></span>',
        responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 4,
              }
            },
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 420,
              settings: {
                slidesToShow: 1,
              }
            }
        ]
    });

    $('.course-slider-active-4').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<span class="b-navigation2 b-navigation-prev2 "><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="b-navigation2 b-navigation-next2 active2"><i class="fa fa-angle-right"></i></span>',
        responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 4,
              }
            },
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 420,
              settings: {
                slidesToShow: 1,
              }
            }
        ]
    });
    
    $('.course-slider-active-5').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<span class="b-navigation3 b-navigation-prev3 "><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="b-navigation3 b-navigation-next3 active3"><i class="fa fa-angle-right"></i></span>',
        responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 4,
              }
            },
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 420,
              settings: {
                slidesToShow: 1,
              }
            }
        ]
    });
    

    $('.brand-logo-active').owlCarousel({
        loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin:30,
        item: 6,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            576: {
                items: 3
            },
            768: {
                items: 4
            },
            992: {
                items: 4
            },
            1000: {
                items:6
            }
        }
    })
    
    $('.blog-active').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<span class="b-navigation b-navigation-prev "><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="b-navigation b-navigation-next active"><i class="fa fa-angle-right"></i></span>',
        responsive: [
            {
              breakpoint: 420,
              settings: {
                slidesToShow: 1,
              }
            }
        ]
    });
  
    $('.event-active-2').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<span class="e-navigation e-navigation-prev "><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="e-navigation e-navigation-next active"><i class="fa fa-angle-right"></i></span>',
        responsive: [
            {
              breakpoint: 992,
              settings: {
                
              }
            },
            {
              breakpoint: 768,
              settings: {
                
              }
            },
            {
              breakpoint: 767,
              settings: {
                
              }
            },
            {
              breakpoint: 420,
              settings: {
                
              }
            }
        ]
    });
    
    /*--
    Service Active
    -----------------------------------*/
    $('.b-navigation ')
        .click(function() {
        $('.b-navigation').removeClass('active');
        $(this).addClass('active');
    });
    /*--
    Service Active
    -----------------------------------*/
    $('.b-navigation3 ')
        .click(function() {
        $('.b-navigation3').removeClass('active3');
        $(this).addClass('active3');
    });
    /*--
    Service Active
    -----------------------------------*/
    $('.b-navigation2 ')
        .click(function() {
        $('.b-navigation2').removeClass('active2');
        $(this).addClass('active2');
    });

    
    /*--
    Service Active
    -----------------------------------*/
    $('.producta-active .owl-nav div')
        .click(function() {
        $('.producta-active .owl-nav div').removeClass('active');
        $(this).addClass('active');
    });
    
    /* magnificPopup video popup */
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });
    
    /* counterUp */
    $('.count').counterUp({
        delay: 10,
        time: 1000
    });
    
    
    // MOUSE MOVING BACKGTOUND 1
    $('#register-1').mouseParallax({
        moveFactor: 2
    });
    
    $('#register-2').mouseParallax({
        moveFactor: 2
    });
    
    $('#register-3').mouseParallax({
        moveFactor: 1
    });
    
    
    /*--
    Testimonial Slick Carousel
    -----------------------------------*/
        $('.testimonial-text-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        draggable: false,
        fade: true,
        asNavFor: '.testimonial-image-slider',
    });
    
    /*--
        Testimonial Slick Carousel as Nav
    -----------------------------------*/
    $('.testimonial-image-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      asNavFor: '.testimonial-text-slider',
      dots: false,
      arrows: false,
      centerMode: true,
      focusOnSelect: true,
      centerPadding: '0px',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            dots: false,
            centerPadding: '0px',
          }
        },
        {
          breakpoint: 768,
          settings: {
            autoplay: true,
            dots: false,
            slidesToShow: 1,
            centerMode: false,
          }
        },
        {
          breakpoint: 767,
          settings: {
            autoplay: true,
            dots: false,
            slidesToShow: 3,
            centerMode: false,
          }
        },
        {
          breakpoint: 420,
          settings: {
            autoplay: true,
            dots: false,
            slidesToShow: 2,
            centerMode: false,
          }
        }
      ]
    });
    
    
    /*--
    Menu Stick
    -----------------------------------*/
    var header = $('.sticky-bar');
    var win = $(window);
    win.on('scroll', function() {
        var scroll = win.scrollTop();
        if (scroll < 200) {
            header.removeClass('stick');
        } else {
            header.addClass('stick'); 
        }
    });

    /* Modal popup */
    $(window).on('load', function() {
      $('#popup_Modal').modal('show')
    });

    $('#popup_Modal .options .option-each label').on('click',function(){
      $('#popup_Modal .options .option-each').removeClass('selected');
      $(this).parents('.option-each').addClass('selected');
      $('#success_response_Modal #correct_ans').text($(this).text())
    })

    $('#popup_Modal form button[type="submit"]').on('click',function(){
      if (!$('#popup_Modal form input').is(":checked")) {
        $('#popup_Modal .response').html('<p class="alert alert-danger mb-0 py-2 mt-4">Please fill all the fields</p>')
      }
    })

    $('#popup_Modal form button.dummy-btn').on('click',function(){
      if (!$('#popup_Modal form input').is(":checked")) {
        $('#popup_Modal .response').html('<p class="alert alert-danger mb-0 py-2 mt-4">Please fill all the fields</p>')
      } else {
        $('#popup_Modal').modal('hide')
        $('#success_response_Modal').modal('show')
      }
    })
    

    /* jQuery MeanMenu */
    $('#mobile-menu-active').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu-area .mobile-menu",
    });
    
    $('.commrnt-toggle a').on('click', function(e) {
        e.preventDefault();
        $('.blog-comment-content-wrap').slideToggle(1000);
    });

    
    /*--
	   pro-details color Active
    -----------------------------------*/
    $('.pro-details-color2-content ul li')
	.on('click', function() {
		$('.pro-details-color2-content ul li').removeClass('active');
		$(this).addClass('active');
	});
    
    
    /*-------------------------------------
        Thumbnail Product activation
    --------------------------------------*/
    $('.thumb-menu').owlCarousel({
        loop: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        margin: 15,
        smartSpeed: 1000,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 3,
                autoplay: true,
                smartSpeed: 300
            },
            576: {
                items: 3
            },
            768: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
    $('.thumb-menu a').on('click', function() {
        $('.thumb-menu a').removeClass('active');
    })
    
    /*--------------------------
        ScrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-double-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    
    
    
    
})(jQuery);	
