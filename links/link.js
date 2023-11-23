$(document).ready(function () {
  $("ul.nav li.dropdown").hover(
    function () {
      $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeIn(500);
    },
    function () {
      $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeOut(500);
    }
  );
  /*var menu = $('.navbar');
    var origOffsetY = menu.offset().top;
    if ($(window).width() > 768) {
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
    }
    ;*/

  // page image
  $(".contentPageBody")
    .find("p img")
    .each(function (index) {
      let description = $(this).attr("alt");
      let html = "<p class='italic text-center'>" + description + "</p>";
      const height = $(this).height();
      const width = $(this).width();

      const additionalCSS = {
        height: "auto",
        display: "inline",
        margin: "0 5px 0 1px",
        width: width > height ? "80%" : "50%",
      };

      $(this)
        .addClass("img-responsive")
        .css(additionalCSS)
        .parent()
        .addClass("text-center")
        .after(html);
    });
});
