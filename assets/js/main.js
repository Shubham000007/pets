$(document).ready(function () {

    //* initiliting SLick
    $('.testimonial__data__container').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 300,
        prevArrow:
            '<button class="slide-arrow slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
            '<button class="slide-arrow slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });


    //* setting up menus
    if ((window.innerWidth < 1025)) {
        //* toggle navigation
        $('.open__navigation__menu').on('click', () => {
            $('.mob__navbar__nav').toggle();
        })
    }

    //* initiliting SLick for about us
    $('.about__image__gallery').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 300,
        prevArrow:
            '<button class="slide-arrow slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
            '<button class="slide-arrow slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });


    //* scroll Animation

    $(window).scroll(function () {
        var sticky = $('.navigation'),
            scroll = $(window).scrollTop();

        if (scroll >= 100) sticky.addClass('nav__fixed');
        else sticky.removeClass('nav__fixed');
    });



    //! document ready emds
});