(function ($) {
    "use strict";


    jQuery(document).ready(function($){

    

        //=======================================
        //    counterUp
        //========================================
        $('.count-up').counterUp({
            delay: 10,
            time: 1000
        });
        
        //=======================================
        //    wow
        //========================================
        new WOW().init();

        
        //=======================================
        //   testimonial carousel
        //========================================
        var testimonialCarousel = $('.testimonial-slider');
        testimonialCarousel.owlCarousel({
            loop: true,
            dots: true,
            nav: false, 
            margin: 30,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                960: {
                    items: 3
                },
                1200: {
                    items: 3
                },
                1920: {
                    items: 3
                }
            }
        }); 


        //=======================================
        //    magnific popup
        //========================================
        $('.venobox').magnificPopup({
            type: 'video'
        });
        $('.image-popup').magnificPopup({
            type: 'image'
        }); 
        
        $('.scroll-to-top').on('click', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 1000);
        });

 
    });

    $(window).on('load',function(){
        //=======================================
        //    preloader
        //========================================
        var preLoder = $(".preloader");
        preLoder.fadeOut(1000);
       
    });
    
}(jQuery));	






