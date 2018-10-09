// $('.parallax__img').each(function(){
//   var img = $(this);
//   var imgParent = $(this).parent();
//   function initParallax () {
//     var speed = img.data('speed');
//     var imgY = imgParent.offset().top;
//     console.log('Parallax offset top ' + imgY);
//     var winY = $(this).scrollTop();
//     var winH = $(this).height();
//     var parentH = imgParent.innerHeight();
//     console.log('Parallax InnerHeight ' + parentH);
//
//
//     // The next pixel to show on screen
//     var winBottom = winY + winH;
//     console.log('Window Bottom ' + winBottom);
//     // If block is shown on screen
//     if (winBottom > imgY && winY < imgY + parentH) {
//       // Number of pixels shown after parallax appear
//       var imgBottom = ((winBottom - imgY) * speed);
//       console.log('Number of pixels shown after parallax appear ' + imgBottom);
//       // Max number of pixels until parallax disappear
//       var imgTop = winH + parentH;
//       console.log('Max number of pixels until parallax disappear ' + imgTop);
//       // Porcentage between start showing until disappearing
//       var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
//       console.log('Porcentage between start showing until disappearing ' + imgPercent);
//     }
//     img.css({
//       top: imgPercent + '%',
//       transform: 'translate(-50%, -' + imgPercent + '%)'
//     });
//   }
//   $(document).on({
//     scroll: function () {
//       initParallax();
//     }, ready: function () {
//       initParallax();
//     }
//   });
// });
