$(document).ready(function () {

    //* ACtive menu
    $(".nav li").removeClass('active');
    var urlType = document.URL;
    $("a[href='" + urlType + "']").addClass("active__menu");
    //* ACtive menu Ends

    //* initiliting SLick
    $('.testimonial__data__container').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 1000,
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


    $('.gallery__carousel__cotnainer').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 300,
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        prevArrow:
            '<button class="slide-arrow slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
            '<button class="slide-arrow slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
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

        if (scroll >= 100) sticky.addClass('small__nav');
        else sticky.removeClass('small__nav');
    });



    //* Booking Enq Form 

    $('#booking_enq_form').on('submit', (e) => {
        e.preventDefault();

        const new_or_returning = document.querySelectorAll('.new_returning');
        const name = $("#name").val();
        const phone = $("#phone").val();
        const email = $("#email").val();
        const drop_of_date = $("#drop_of_date").val();
        const drop_of_eta = document.querySelectorAll('.drop_of_eta');
        const pick_up_date = $("#pick_up_date").val();
        const collection_eta = document.querySelectorAll('.collection_eta');
        let error = 0;
        let new_returning_checked = 0;
        let drop_of_eta_checked = 0;
        let collection_eta_checked = 0;


        if (!name) {
            $('#name_error').html("This field is required");
            error++;
        } else {
            $('#name_error').html('');
        }

        if (!phone) {
            $('#phone_error').html("This field is required");
            error++;
        } else {
            $('#phone_error').html('');
        }

        if (!email) {
            $('#email_error').html("This field is required");
            error++;
        } else {
            $('#email_error').html('');
        }

        if (!drop_of_date) {
            $('#drop_of_date_error').html("This field is required");
            error++;
        } else {
            $('#drop_of_date_error').html('');
        }
        if (!pick_up_date) {
            $('#pick_up_date_error').html("This field is required");
            error++;
        } else {
            $('#pick_up_date_error').html('');
        }

        //* returning or new
        new_or_returning.forEach((e) => {
            if (e.checked) {
                new_returning_checked++
            }
        });

        //* drop of eta
        drop_of_eta.forEach((e) => {
            if (!e.checked) {
                drop_of_eta_checked++
            }
        });

        //* collection of eta
        collection_eta.forEach((e) => {
            if (e.checked) {
                collection_eta_checked++
            }
        });


        if ((new_returning_checked == 0)) {
            $('#new_returning_error').html("This field is required");
            error++;
        } else {
            $('#new_returning_error').html("");
        }

        if ((drop_of_eta_checked == 0)) {
            $('#drop_of_eta_error').html("This field is required");
            error++;
        } else {
            $('#drop_of_eta_error').html("");
        }

        if ((collection_eta_checked == 0)) {
            $('#collection_eta_error').html("This field is required");
            error++;
        } else {
            $('#collection_eta_error').html("");
        }


        if ((error != 0)) {
            return false
        }


        $(".booking_enq_button").attr("disabled", true);
        $(".booking_enq_button").html(
            '<i class="fas fa-spinner fa-spin"></i> Please wait...'
        );

        $.ajax({
            url: base_url + "Pets/booking_enq_form_data",
            type: "POST",
            data: new FormData(document.getElementById("booking_enq_form")),
            cache: false,
            processData: false,
            contentType: false,
            success: (response) => {
                if (response.trim() == "success") {
                    swal(
                        {
                            title: "Success",
                            text: "Thanks for connecting with us, \n We will connect with you soon",
                            type: "success",
                        },
                        function () {
                            location.reload();
                        }
                    );
                } else {
                    swal(
                        {
                            title: "Error",
                            text: "something wents wrong, please try again later!",
                            type: "error",
                        },
                        function () {
                            location.reload();
                        }
                    );
                }
            },
            error: () => {
                swal(
                    {
                        title: "Error",
                        text: "something wents wrong, please try again later!",
                        type: "error",
                    },
                    function () {
                        location.reload();
                    }
                );
            },
        });

    });

    //* Booking Enq Form Ends


    //! document ready emds
});

var images = document.querySelectorAll('.banner__container__image');
new simpleParallax(images);