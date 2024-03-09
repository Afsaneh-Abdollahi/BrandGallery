$(document).ready(function () {
    $(document).ready(function () {
        "use strict";

        $("header .menu > ul > li:has( > ul)").addClass("menu-dropdown-icon");

        $("header .menu > ul > li > ul:not(:has(ul))").addClass("normal-sub");

        $("header .menu > ul").before('<a href="#" class="menu-mobile"></a>');

        $("header .menu > ul > li").hover(function (e) {
            if ($(window).width() > 943) {
                $(this).children("ul").stop(true, false).fadeToggle(150);
                e.preventDefault();
            }
        });

        $("header .menu > ul > li").click(function () {
            if ($(window).width() <= 943) {
                $(this).children("ul").fadeToggle(150);
            }
        });

        $("header .menu-mobile").click(function (e) {
            $("header .menu > ul").toggleClass("show-on-mobile");
            e.preventDefault();
            $(".transparent-back").addClass("active");

        });
        $(".show-on-mobile").click(function (e) {
            $("header .menu > ul").removeClass("show-on-mobile");
            e.preventDefault();

        });

    });
    $('body').on('click', function (event) {
        if (document.getElementsByClassName('show-on-mobile').length > 0) {


        }
        if (document.querySelector('.show-on-mobile')) {
            $("header .menu > ul:before").click(function () {
                $(this).removeClass("active");
                $("header .menu.show-on-mobile").removeClass("show-on-mobile");

            });
            $(".transparent-back.active").click(function () {
                $(this).removeClass("active");
                $("header .menu.show-on-mobile").removeClass("show-on-mobile");

            });
        }
    });

});
