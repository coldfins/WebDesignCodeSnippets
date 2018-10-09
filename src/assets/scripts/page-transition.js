// load url but first wait for effect to end
function loadUrl(href, duration, scroll) {
  scroll = scroll ? scroll : false;
  if (duration) {
    window.setTimeout(function() {
      location.href = href;
    }, duration);
  } else {
    location.href = href;
  }
}

// toggle transition effect by toggling classes
function pageTransition() {
  var trans = $('.page-transition').first();
  var baseClass = 'page-transition';
  var showClass = baseClass + '--showContent';
  var hideClass = baseClass + '--hideContent';

  if (!trans.hasClass(showClass)) {
    trans.removeClass(hideClass).addClass(showClass);
  } else {
    trans.removeClass(showClass).addClass(hideClass);
  }
}

// intercept link clicks and do some random things (important -> get duration for url loading directly from animation)
function interceptLink(e) {
  e.preventDefault();
  var $elem = $(this);
  var href = $elem.attr('href');
  var duration = parseFloat($('.page-transition').css('animation-duration').split(',')[0].slice(0, -1));
  duration = duration + parseFloat($('.page-transition').find('.loader').first().css('animation-duration').split(',')[0].slice(0, -1));
  if (duration < 100) {
    duration = duration * 1000;
  }
  console.log('page transition duration',duration);

  if ($elem.attr('data-toggle')) {
    return;
  }

  var hashPos = href.indexOf("#");
  if (hashPos >= 0) {
    if(hashPos === 0){
      if(href === '#'){
        return;
      }
      else {
        var navigateto = href.substr(1);
        //window.location.hash = navigateto;
        // @TODO: Manuel
        $('html,body').animate({ "scrollTop": $(href).offset().top - 100}, 250);
        return;
      }
    }
    else {
      loadUrl(href, 0, true);
    }
  }

  pageTransition();
  loadUrl(href, duration);
}



$(function() {
  //var loader = $('.page-transition .loader').first();
  //window.setTimeout(pageTransition, 800);
  pageTransition();
  $(document).on('click.intercept', 'a:not([target="_blank"],.showMap .card__link,[href^="tel:"],[href^="mailto:"],[href^="sms:"])', interceptLink);
});
