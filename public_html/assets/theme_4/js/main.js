window.addEventListener("load", function () {
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    on: {
      slideChangeTransitionStart() {
        document.querySelectorAll(".animation").forEach((el) => {
          el.classList.remove("animate__animated", "animate__fadeInLeft");
          el.style.opacity = 0;
          el.style.transition = "all 0ms ease-in-out";
        });
      },
      slideChangeTransitionEnd() {
        const activeSlide = document.querySelector(".swiper-slide-active");
        const heading = activeSlide.querySelectorAll(".animation");
        if (heading) {
          heading.forEach((el) => {
            el.style.opacity = 1;
            el.classList.add("animate__animated", "animate__fadeInLeft");
          });
        }
      },
    },
    speed: 1200,
    lazy: true,
    observer: false,
    observeParents: false,
  });
  var swiper = new Swiper(".myCardSwiper", {
    loop: true,
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    on: {
      slideChangeTransitionStart() {
        document.querySelectorAll(".animation").forEach((el) => {
          el.classList.remove("animate__animated", "animate__fadeInLeft");
          el.style.opacity = 0;
          el.style.transition = "all 0ms ease-in-out";
        });
      },
      slideChangeTransitionEnd() {
        const activeSlide = document.querySelector(".swiper-slide-active");
        const heading = activeSlide.querySelectorAll(".animation");
        if (heading) {
          heading.forEach((el) => {
            el.style.opacity = 1;
            el.classList.add("animate__animated", "animate__fadeInLeft");
          });
        }
      },
    },
    speed: 1200,
    lazy: true,
    observer: false,
    observeParents: false,
  });
  var swiper = new Swiper(".our-supplier-Swiper", {
    slidesPerView: 2,
    spaceBetween: 0,
    grabCursor: true,
    resistanceRatio: 100, // Lower = more resistance
    touchRatio: 1, // Sensitivity of touch
    threshold: 2, // Minimum drag distance to trigger slide
    speed: 3000,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    speed: 600,
    breakpoints: {
      480: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      // when window width is >= 768px
      768: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      // when window width is >= 1024px
      1024: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
      // when window width is >= 1280px
      1280: {
        slidesPerView: 6,
        spaceBetween: 0,
      },
    },
    speed: 1200,
    lazy: true,
    observer: false,
    observeParents: false,
  });

  const cards = document.querySelectorAll(".watch-card");
  cards.forEach((card) => {
    card.addEventListener("mouseenter", () => {
      // Only add the shimmer class if it's not already animating
      if (!card.classList.contains("shimmer")) {
        card.classList.add("shimmer");

        // Remove shimmer class after animation ends (1s duration)
        setTimeout(() => {
          card.classList.remove("shimmer");
        }, 3000);
      }
    });
  });
});
