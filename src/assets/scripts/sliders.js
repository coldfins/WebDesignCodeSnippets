function initSwiper() {
  var mySwiper = new Swiper('.swiper-container', {

    speed: 500,
    loop: true,
    slidesPerView: 2,
    spaceBetween: 30,
    centeredSlides: true,

    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
    },

    pagination: {
      el: '.swiper-pagination',
    },

    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }

  });
}

$(function() {
  initSwiper();
});
