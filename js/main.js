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

    const swiper_tab = new Swiper('.swiper_tab', {
        // Optional parameters
        spaceBetween: 12,
        slidesPerView: 2,
        direction: 'horizontal',
        loop: false,

        //responsive {
        breakpoints: {
            992: {
                spaceBetween: 24,
                slidesPerView: 6,
            },
            768: {
                spaceBetween: 24,
                slidesPerView: 4,
            },
            576: {
                spaceBetween: 12,
                slidesPerView: 3,
            }
        },

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    const brands = new Swiper('.swiper_brands', {
        // Optional parameters
        spaceBetween: 5,
        slidesPerView: 2,
        direction: 'horizontal',
        loop: false,
        autoplay: {
            delay: 5000,
        },
        // responsive
        breakpoints: {
            992: {
                spaceBetween: 50,
                slidesPerView: 6,
            },
            576: {
                spaceBetween: 10,
                slidesPerView: 4,
            }
        },

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },

    });

    var swiper_intro2 = new Swiper(".swiper-intro2", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        autoplay:  {
            delay: 10000,
        },
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
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
    $(".tabs-section .swiper_tab .nav-link").on("click", function (e) {
        $('.tabs-section .swiper_tab .card').matchHeight();
    });
    $('.tabs-section .swiper_tab .card').matchHeight();
    $('.search_page .card').matchHeight();
    $('.archive .card').matchHeight();




    if ($('.content') && $('.sidebar')) {
        jQuery('.content, .sidebar').theiaStickySidebar({
            // Settings
            additionalMarginTop: 30
        });
    }
    document.querySelectorAll(".accordion-item").forEach((item) => {
        item.querySelector(".accordion-item-header").addEventListener("click", () => {
            item.classList.toggle("open");
        });
    });
});
