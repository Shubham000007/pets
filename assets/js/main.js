$(document).ready(function () {

    //* initiliting SLick
    $('.testimonial__data__container').slick({
        dots: false,
        infinite: false,
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
                    dots: true
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



});