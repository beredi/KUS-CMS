

$(document).ready(function () {

    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
    var menu = $('.navbar');
    var origOffsetY = menu.offset().top;
    if($(window).width() > 768) {
        function scroll() {
            if ($(window).scrollTop() >= origOffsetY) {
                $('.navbar > .col-lg-7').addClass('sticky');
                $('.content').addClass('menu-padding');
                $('.navbar-nav').addClass('navbar-inverse')
            } else {
                $('.navbar > .col-lg-7').removeClass('sticky');
                $('.content').removeClass('menu-padding');
                $('.navbar-nav').removeClass('navbar-inverse')
            }


        }

        document.onscroll = scroll;
    };

    // page image
    $('.contentPageBody').find('img')
        .addClass('img-responsive')
        .css({"height": "auto", "display": "inline", 'marginTop': '5px'})
        .parent().addClass('text-center');

    $('.contentPageBody').find('p img').each(function( index ) {
        let description = ($(this).attr('alt'));
        let html = "<p class='italic text-center'>"+description+"</p>";
        $(this).after(html);

    });
});