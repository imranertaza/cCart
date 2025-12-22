$(document).ready(function () {


    //REVIEW  CHART

  // SWIPER sLIDER


  var swiper = new Swiper(".product-detailsSwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 5,
    freeMode: true,
    watchSlidesProgress: true,
    speed: 800,

  });
  var swiper2 = new Swiper(".product-detailsSwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".next-slide-btn",
      prevEl: ".prev-slide-btn",
    },
    thumbs: {
      swiper: swiper,
    },
    speed: 800,
  });

  // READMORE
  const maxLength = 250;

  $(".read-more").each(function () {
    const fullText = $(this).text().trim();

    if (fullText.length > maxLength) {
      const shortText = fullText.substring(0, maxLength);
      const remainingText = fullText.substring(maxLength);

      const html = `
          ${shortText}<span class="more-text" style="display:none;">${remainingText}</span>
          <a href="#" class="read-toggle"> See More</a>
        `;
      $(this).html(html);
    }
  });

  $(document).on("click", ".read-toggle", function (e) {
    e.preventDefault();
    const $this = $(this);
    const $moreText = $this.siblings(".more-text");

    if ($moreText.is(":visible")) {
      $moreText.hide();
      $this.text(" See More");
    } else {
      $moreText.show();
      $this.text(" See Less");
    }
  });

//   REVIEW BARS WIDTH DYNAMIC
let totalReviews = 0;

    // Step 1: Calculate total reviews
    $(".review-count").each(function () {
      totalReviews += parseInt($(this).text(), 10);
    });

    // Step 2: Set dynamic width for each progress bar
    $(".review-single-row").each(function () {
      const count = parseInt($(this).find(".review-count").text(), 10);
      const percentage = totalReviews > 0 ? (count / totalReviews) * 100 : 0;
      $(this).find(".review-progress-bar").css("width", percentage + "%");
    });
});



$(document).mousemove(function (e) {
  const activeImg = $('.product-detailsSwiper2 .swiper-slide-active img');
  const preview = $('#preview');
  const zoomContainer = $('.zoom-image-container');
  zoomContainer.removeClass('d-none');
  if (!activeImg.length) return;

  const offset = activeImg.offset();
  const width = activeImg.outerWidth();
  const height = activeImg.outerHeight();
  const x = e.pageX;
  const y = e.pageY;

  const withinBounds = x > offset.left && x < offset.left + width && y > offset.top && y < offset.top + height;

  if (withinBounds) {
    preview.addClass('zoom-active');

    const zoomFactor = 2;
    const bgX = ((x - offset.left) / width) * 100;
    const bgY = ((y - offset.top) / height) * 100;

    const originalSrc =
      activeImg.attr('data-original-image') ||
      activeImg.attr('data-magnify-src') ||
      activeImg.attr('xoriginal') ||
      activeImg.attr('src');

    zoomContainer.css({
      backgroundImage: `url(${originalSrc})`,
      backgroundPosition: `${bgX}% ${bgY}%`,
      backgroundSize: `${width * zoomFactor}px ${height * zoomFactor}px`,
      backgroundColor: '#fff'
    });
  } else {
    preview.removeClass('zoom-active');
    zoomContainer.addClass('d-none');
  }
});



$(document).ready(function () {
  $('.single-color .inner').on('click keydown', function (e) {
    if (e.type === 'click' || e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();

      const $swatch = $(this);
      const $input = $swatch.siblings('input');
      const label = $swatch.data('label');

      // Update checked radio
      $input.prop('checked', true);

      // Update label text
      $('#selected-color').text(label);

      // Optional: Visual active state
      $('.single-color').removeClass('active');
      $swatch.parent().addClass('active');
    }
  });
});



$(document).ready(() => {
  $('.size-button').on('click', function() {
    // Remove selected class from all buttons
    $('.size-button').removeClass('selected');

    // Add selected class to clicked button
    $(this).addClass('selected');

    // Log the selected value from data-size
    console.log('Selected size:', $(this).data('size'));
  });
});
