/**
 * @name revealIt
 *
 * @author Patrick Manser <patrick.manser@cs2.ch>
 * @author Manuel Kammermann <manuel.kammermann@cs2.ch>
 *
 * @param {Object} options - a configuration object to customize your instance.
 * @param {String} options.addClass - a string of css classnames to be toggled in the toggle area
 * @param {Object} options.distance - an object to define the viewport offsets for the toggle area
 * @param {String} options.distance.top - offset to top viewport border. Can be a number that is used as pixel values or a string to provide vh unit offset
 * @param {String} options.distance.bottom -  - offset to bottom viewport border. Can be a number that is used as pixel values or a string to provide vh unit offset
 *
 * @summary Iterates through each element in the selector to trigger custoom css classes within a toggle area that is defined by offsets to the viewport supports px and vh units
 *
 * @description configuration options for the Plugin
 * addClass [string] (default: 'revealed') - css classes to toggle, as string
 * distance [object] (default: {top: '150px', bottom: '150px'}) - specifies offsets to viewport top and bottom border to define the toggle area
 */
(function($) {

  $.fn.revealIt = function(options) {
    var defaults = {
      addClass: 'revealed',
      distance: {
        top: 150,
        bottom: 150
      }
    };
    var conf = $.extend(true,{},defaults,options);

    for (var dist in conf.distance){
      var tmp = conf.distance[dist];
      if(typeof tmp === 'string' && tmp.indexOf('vh')){
        var d = (parseInt(tmp) / 100) * $(window).outerHeight();
        conf.distance[dist] = d;
      }
      if(typeof tmp === 'string' && tmp.indexOf('px')){
        conf.distance[dist] = parseInt(tmp);
      }
    }

    this.each(function(idx) {
      var $thisElem = $(this);

      $(window).scroll(function(e) {
        var $w = $(window);
        var viewport = {
          top: $w.scrollTop(),
          bottom: $w.scrollTop() + $w.outerHeight()
        };
        var toggleArea = {
          top: viewport.top + conf.distance.top,
          bottom: viewport.bottom - conf.distance.bottom
        };
        var elem = {
          top: $thisElem.offset().top,
          bottom: $thisElem.offset().top + $thisElem.outerHeight(true)
        };
        if (elem.top < toggleArea.bottom && elem.bottom > toggleArea.top) {
          $this.addClass(conf.addClass);
        }
        else {
          $this.removeClass(conf.addClass);
        }
      });

    });

  };

}(jQuery));
