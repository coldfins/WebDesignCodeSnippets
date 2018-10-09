// JavaScript Document

function jumpToTopOfPage(e) {
  e.preventDefault();
  $('html, body').animate({ scrollTop: 0 }, 'fast');
}

function toggleFooterNav(e) {
  // get elements
  var $clickedLink = $(this);
  var $navElement = $clickedLink.parent().find('.footer-nav');

  // sanitize
  if ($(window).outerWidth() >= 992) {
    return false;
  }

  if ($navElement.hasClass('_meta')) {
    return false;
  }

  // Toggle shit
  $clickedLink.toggleClass('_open');
  $navElement.toggle();
}

function initFooterScripts() {
  $(document).on('click', '.main-footer__top-arrow', jumpToTopOfPage);
  $(document).on('click', '.footer-content__title', toggleFooterNav);
}