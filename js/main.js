$(document).ready(function () {
    $(document).ready(function () {
        "use strict";

        $(".menu > ul > li:has( > ul)").addClass("menu-dropdown-icon");

        $(".menu > ul > li > ul:not(:has(ul))").addClass("normal-sub");

        $(".menu > ul").before('<a href="#" class="menu-mobile"></a>');

        $(".menu > ul > li").hover(function (e) {
            if ($(window).width() > 943) {
                $(this).children("ul").stop(true, false).fadeToggle(150);
                e.preventDefault();
            }
        });

        $(".menu > ul > li").click(function () {
            if ($(window).width() <= 943) {
                $(this).children("ul").fadeToggle(150);
            }
        });

        $(".menu-mobile").click(function (e) {
            $(".menu > ul").toggleClass("show-on-mobile");
            e.preventDefault();
            $(".transparent-back").addClass("active");

        });
        $(".show-on-mobile").click(function (e) {
            $(".menu > ul").removeClass("show-on-mobile");
            e.preventDefault();

        });

    });
    $('body').on('click', function (event) {
        if (document.getElementsByClassName('show-on-mobile').length > 0) {


        }
        if (document.querySelector('.show-on-mobile')) {
            $(".menu > ul:before").click(function () {
                $(this).removeClass("active");
                $(".menu.show-on-mobile").removeClass("show-on-mobile");

            });
            $(".transparent-back.active").click(function () {
                $(this).removeClass("active");
                $(".menu.show-on-mobile").removeClass("show-on-mobile");

            });
        }
    });

});
