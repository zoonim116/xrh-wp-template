
( function( $ ) {
    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });
    $('.sertificate-slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        arrows: false
    })

    $( ".wpcf7-form-control" ).focus(function() {
        $(this).closest('.icon-wrap').prev().addClass('focus');
    }).focusout(function() {
        $(this).closest('.icon-wrap').prev().removeClass('focus');
    });

    $('.site-header .navbar-start a, .site-footer .columns a').on('click', function (e) {
        e.preventDefault();
        var selector = $(this).attr('href').replace('#','.');
        if (selector.length > 1) {
            if ($(this).closest('#menu-sidebar-menu-3').length > 0) {
                var parentElem = $(this).parent();
                var classes = parentElem.attr("class").split(/\s+/);
                var tabIndexTo = classes[0].replace('tab-to-', '');
                $('.release-notes .tabs [rel="tab'+tabIndexTo+'"]').trigger('click');
            }
            $('html, body').animate({
                scrollTop: parseInt($(selector).offset().top - 50)
            }, 1000);
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        }

        return false;
    });

    $(".tab_content").hide();
    $(".tab_content:first").show();

    /* if in tab mode */
    $("ul.tabs li").click(function() {

        $(".tab_content").hide();
        var activeTab = $(this).attr("rel");
        $("#"+activeTab).fadeIn();

        $("ul.tabs li").removeClass("active");
        $(this).addClass("active");

        $(".tab_drawer_heading").removeClass("d_active");
        $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
    });
    $(".tab_container").css("min-height", function(){
        return $(".tabs").outerHeight() + 50;
    });
    /* if in drawer mode */
    $(".tab_drawer_heading").click(function() {

        $(".tab_content").hide();
        var d_activeTab = $(this).attr("rel");
        $("#"+d_activeTab).fadeIn();

        $(".tab_drawer_heading").removeClass("d_active");
        $(this).addClass("d_active");

        $("ul.tabs li").removeClass("active");
        $("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });

    if (window.matchMedia("(max-width: 1024px)").matches) {
        $('a.menu-item-has-children').on('click', function () {
            $(this).parent().toggleClass('is-active');
        });
    } else {
        $('[data-target="dropdown"]').hover(function () {
            $(this).addClass('is-active');
        }, function () {
            $(this).removeClass('is-active');
        });
    }

}( jQuery ) );