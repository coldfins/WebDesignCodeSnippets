function stickyHeader(e) {
  var $this = $(this);
  var $header = $('.main-header');
  var $ohHeader = $header.outerHeight();
  var $content = $('.main-container');

  if ($this.scrollTop() > 0) {
    $header.addClass('main-header--sticky');
    if (!$header.hasClass('main-header--full')) {
      $content.css('margin-top', $ohHeader);
    }
  } else {
    $header.removeClass('main-header--sticky');
    $content.css('margin-top', 0);
  }
}

function switchCols() {
  $('.cs2').toggleClass('cs2--small-grid');
}

$(function() {
  $(window).on('scroll', stickyHeader);
  $(document).on('click', '.js-button-switch', switchCols);
});
