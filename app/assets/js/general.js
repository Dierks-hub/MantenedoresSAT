var loader_count = 0;
function ShowLoader() {
  if (loader_count == 0) {
    var loader = '<div id="loader">';
    loader += '<div class="loader-wrapper">';
    loader += '    <i class="fas fa-5x fa-cog fa-spin-1"></i>';
    // loader += '    <img class="ml-3" src="img/campus_unap_c_white.png">';
    loader += "  </div>";
    loader += "</div>";
    $("body").append(loader);
    $("#loader").fadeIn();
  }
  loader_count++;
}
function HideLoader() {
  loader_count--;
  if (loader_count == 0) {
    $("#loader").fadeOut(function () {
      $(this).remove();
    });
  }
}
