$(document).ready(function () {

    const swiper = new Swiper('.swiper_posts', {
        // Optional parameters
        spaceBetween: 12,
        slidesPerView: 1.5,
        direction: 'horizontal',
        loop: false,

        //responsive {
        breakpoints: {
            992: {
                spaceBetween: 24,
                slidesPerView: 5,
            },
            768: {
                spaceBetween: 24,
                slidesPerView: 3,
            },
            576: {
                spaceBetween: 12,
                slidesPerView: 2.2,
            }
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    const swiper_post_related = new Swiper('.single .swiper_posts', {
        // Optional parameters
        spaceBetween: 8,
        slidesPerView: 2.2,
        direction: 'horizontal',
        loop: false,

        //responsive {
        breakpoints: {
            992: {
                spaceBetween: 24,
                slidesPerView: 3,
            },
            576: {
                spaceBetween: 8,
                slidesPerView: 2.2,
            }
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    // load more items
    $(".blog .sec5 .tab-content .tab-pane.active .card").slice(0, 15).show();
    $(".blog .sec5 .tab-content .tab-pane.active #loadMore").on("click", function (e) {
        e.preventDefault();
        $(".blog .sec5 .tab-content .tab-pane.active .card:hidden").slice(0, 15).slideDown();
        if ($(".blog .sec5 .tab-content .tab-pane.active .card:hidden").length == 0) {
            document.querySelector(".blog .sec5 .tab-content .tab-pane.active #loadMore").style.display = "none";
        }
    });

    $(".blog .sec5 .category .nav-link").on("click", function (e) {
        $('.blog .sec5 .tab-content .card').matchHeight();
        if ($(".blog .sec5 .tab-content .tab-pane.active .card").length < 15) {
            document.querySelector(".blog .sec5 .tab-content .tab-pane.active #loadMore").style.display = "none";
        }
        $(".blog .sec5 .tab-content .tab-pane.active .card").slice(0, 15).show();
        $(".blog .sec5 .tab-content .tab-pane.active #loadMore").on("click", function (e) {
            e.preventDefault();
            $(".blog .sec5 .tab-content .tab-pane.active .card:hidden").slice(0, 15).slideDown();
            if ($(".blog .sec5 .tab-content .tab-pane.active .card:hidden").length == 0) {
                document.querySelector(".blog .sec5 .tab-content .tab-pane.active #loadMore").style.display = "none";
            }
        });
    });


    // newsletter
    var wpcf7ElmEmail = document.querySelector('.blog .newsletter_box .wpcf7 input[type=email]');
    var wpcf7ElmSubmit = document.querySelector('.blog .newsletter_box .wpcf7 input[type=submit]');
    if (wpcf7ElmSubmit) {
        wpcf7ElmSubmit.classList.add('disable');

    }
    if (wpcf7ElmEmail && wpcf7ElmSubmit) {
        wpcf7ElmEmail.addEventListener('keyup', function () {
            if (wpcf7ElmEmail.value.length > 0) {
                wpcf7ElmSubmit.classList.remove('disable');
                wpcf7ElmSubmit.classList.add('enable');
            } else {
                wpcf7ElmSubmit.classList.add('disable');
                wpcf7ElmSubmit.classList.remove('enable');
            }
        })
    }


    $('.swiper-slide .card').matchHeight();
    $('.sec5 .tab-content .card').matchHeight();
});
