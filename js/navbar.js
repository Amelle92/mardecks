$(window).scroll(function() {
  if ($(document).scrollTop() > 50) {
    $('#logo').css("height","45px");
  } else {
    $('#logo').css("height","70px");
  }
});
