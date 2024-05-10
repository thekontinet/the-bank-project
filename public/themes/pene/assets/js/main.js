(function ($) {
    "use strict";

    // Header Sticky
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 120) {
            $('.navbar-area').addClass("is-sticky");
        }
        else {
            $('.navbar-area').removeClass("is-sticky");
        }
    });;


    // Odometer JS
    $('.odometer').appear(function (e) {
        var odo = $(".odometer");
        odo.each(function () {
            var countNumber = $(this).attr("data-count");
            $(this).html(countNumber);
        });
    });


    // Feedback Carousel
    var $imagesSlider = $(".feedback-slides .client-feedback>div"),
        $thumbnailsSlider = $(".client-thumbnails>div");
    // images options
    $imagesSlider.slick({
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        cssEase: 'linear',
        fade: true,
        autoplay: true,
        draggable: true,
        asNavFor: ".client-thumbnails>div",
        prevArrow: '.client-feedback .prev-arrow',
        nextArrow: '.client-feedback .next-arrow'
    });
    // Thumbnails options
    $thumbnailsSlider.slick({
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        cssEase: 'linear',
        autoplay: true,
        centerMode: true,
        draggable: false,
        focusOnSelect: true,
        asNavFor: ".feedback-slides .client-feedback>div",
        prevArrow: '.client-thumbnails .prev-arrow',
        nextArrow: '.client-thumbnails .next-arrow',
    });
    var $caption = $('.feedback-slides .caption');
    var captionText = $('.client-feedback .slick-current img').attr('alt');
    updateCaption(captionText);
    $imagesSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        $caption.addClass('hide');
    });
    $imagesSlider.on('afterChange', function (event, slick, currentSlide, nextSlide) {
        captionText = $('.client-feedback .slick-current img').attr('alt');
        updateCaption(captionText);
    });
    function updateCaption(text) {
        // if empty, add a no breaking space
        if (text === '') {
            text = '&nbsp;';
        }
        $caption.html(text);
        $caption.removeClass('hide');
    }

    // FAQ Accordion
    $(function () {
        $('.accordion').find('.accordion-title').on('click', function () {
            // Adds Active Class
            $(this).toggleClass('active');
            // Expand or Collapse This Panel
            $(this).next().slideToggle('fast');
            // Hide The Other Panels
            $('.accordion-content').not($(this).next()).slideUp('fast');
            // Removes Active Class From Other Titles
            $('.accordion-title').not($(this)).removeClass('active');
        });
    });

    // Go to Top
    $(function () {
        // Scroll Event
        $(window).on('scroll', function () {
            var scrolled = $(window).scrollTop();
            if (scrolled > 600) $('.go-top').addClass('active');
            if (scrolled < 600) $('.go-top').removeClass('active');
        });
        // Click Event
        $('.go-top').on('click', function () {
            $("html, body").animate({ scrollTop: "0" }, 500);
        });
    });


    // Preloader
    jQuery(window).on('load', function () {
        $('.preloader').fadeOut();
    });



    // Language Switcher
    $(".language-option").each(function () {
        var each = $(this)
        each.find(".lang-name").html(each.find(".language-dropdown-menu a:nth-child(1)").text());
        var allOptions = $(".language-dropdown-menu").children('a');
        each.find(".language-dropdown-menu").on("click", "a", function () {
            allOptions.removeClass('selected');
            $(this).addClass('selected');
            $(this).closest(".language-option").find(".lang-name").html($(this).text());
        });
    })

    // Others Option For Responsive JS
    $(".others-option-for-responsive .dot-menu").on("click", function () {
        $(".others-option-for-responsive .container .container").toggleClass("active");
    });

    /* End "Currency Transfer Provider Demo" "JS" */

}(jQuery));

// function to set a given theme/color-scheme
function setTheme(themeName) {
    localStorage.setItem('luvion_theme', themeName);
    document.documentElement.className = themeName;
}
// function to toggle between light and dark theme
function toggleTheme() {
    if (localStorage.getItem('luvion_theme') === 'theme-dark') {
        setTheme('theme-light');
    } else {
        setTheme('theme-dark');
    }
}
// Immediately invoked function to set the theme on initial load
(function () {
    if (localStorage.getItem('luvion_theme') === 'theme-dark') {
        setTheme('theme-dark');
        document.getElementById('slider').checked = false;
    } else {
        setTheme('theme-light');
        document.getElementById('slider').checked = true;
    }
})();
