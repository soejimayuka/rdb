/* ==============================
    swiper
  ============================== */
const mySwiper = new Swiper(".swiper-container", {
  // オプション
  speed: 1000,
  centeredSlides: true,
  spaceBetween: 24,
  slidesPerView: "2.5",

  // 自動再生
  autoplay: {
    disableOnInteraction: true,
    delay: 1000,
  },

  loop: true,

  breakpoints: {
    992: {
      spaceBetween: 32,
      slidesPerView: "4",
      centeredSlides: true,
    },
  },
});
