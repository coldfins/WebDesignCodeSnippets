(function($) {
  $.fn.comCode = function(options) {
    this.each(function() {
      var $btn = $('<span class="fa fa-code js-comcode-btn"></span>').css('position', 'absolute').css('right', '1rem').css('top', '1rem').css('cursor', 'pointer');
      if ($(this).css('position') === 'static') {
        $(this).css('position', 'relative');
      }
      $(this).append($btn);
    });

    $('.js-comcode-btn').click(function(e) {
      var $mainContainer = $(e.target).parent();
      $.get('ajax.php', { 'action': 'component', 'component': $mainContainer.data('comcode'), 'args': $mainContainer.data('args') }, function(data) {
        var $puContainer = $('<div class="comcode"></div>');
        var $puTextarea = $('<textarea class="comcode__code"></textarea>');
        var $puBacklayer = $('<div class="comcode-backlayer"></div>');
        $('body').css('overflow', 'hidden');
        $('body').append($puBacklayer);
        $puContainer.append($puTextarea);
        $('body').append($puContainer);
        $puTextarea.val(data);
      });
    });

    $(document).on('click', '.comcode-backlayer', function() {
      $('.comcode').remove();
      $('.comcode-backlayer').remove();
      $('body').removeAttr('style');
    });
  };
}(jQuery));

$(function() {
  $('[data-comcode]').comCode();
});
