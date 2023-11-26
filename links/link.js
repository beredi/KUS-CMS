$(document).ready(function () {
  // Array of image URLs for the header background
  var images = [
    "kus-jana-kollara-bg-1.jpg",
    "kus-jana-kollara-bg-2.jpg",
    "kus-jana-kollara-bg-3.jpg",
  ];

  var currentIndex = 0;

  // Define the gradient colors
  var gradientStart = "rgba(0, 0, 0, 0)"; // Transparent on top
  var gradientEnd = "rgba(0, 0, 0, 1)"; // Black on bottom

  function changeBackground() {
    // Concatenate the gradient with the image URL
    var imageUrlWithGradient =
      "linear-gradient(" +
      gradientStart +
      ", " +
      gradientEnd +
      "), url('images/" +
      images[currentIndex] +
      "')";
    // Apply the background to the header
    $(".header").css("background-image", imageUrlWithGradient);

    currentIndex = (currentIndex + 1) % images.length;
  }

  changeBackground();
  // Change background image every 5 seconds (5000 milliseconds)
  setInterval(changeBackground, 5000);

  $("ul.nav li.dropdown").hover(
    function () {
      $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeIn(500);
    },
    function () {
      $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeOut(500);
    }
  );

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
        .attr("height", height)
        .attr("width", width)
        .addClass("img-responsive")
        .css(additionalCSS)
        .parent()
        .addClass("text-center")
        .after(html);
    });
});
