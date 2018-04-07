'use strict';
(function () {
  $(document).ready(function () {
    // sticky aside
    if ($('#js-aside').length) {
      var aside = $("#js-aside");
      $(document).scroll(function () {
        var y = $(document).scrollTop();
        if (y >= 110) {
          aside.addClass('c-aside--sticky');
        } else {
          aside.removeClass('c-aside--sticky');
        }
      });

      // reduce aside height if window scroll < 110px
      if ($(document).height() - $(window).height() < 110) {
        $('#js-aside__inner').addClass('c-aside__inner--short');
      }
    }

    // hide last coma in Content list
    if ($('.c-content-list').length) {
      $('.c-content-list').each(function (i, el) {
        $(el).find('a').last().addClass('c-content-list__last-a')
      });
    }

    // toggle Content list
    if ($('.c-content-list__toggle')) {
      $('.c-content-list__toggle').on('click', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('c-content-list--collapsed');
      });
    }

    // burger menu toggle
    $('#js-c-burger, #js-c-burger-close').on('click', function (e) {
      e.preventDefault();
      $('body').toggleClass('body__mm-active');
      $('#js-mm').toggleClass('c-mm--active');
    });
    $('#js-mm__overlay').on('click', function () {
      $('body').toggleClass('body__mm-active');
      $('#js-mm').toggleClass('c-mm--active');
    });

    // toggle follow popup
    if ($('#js-popup-follow').length) {
      $('.js-popup-follow-close, #js-popup-follow').on('click', function (e) {
        e.preventDefault();
        $('#js-popup-follow').fadeOut(300)
        $('body').removeClass('body-popup');
      });
      $('#js-follow').on('click', function (e) {
        e.preventDefault();
        $('#js-popup-follow').fadeIn(300);
        $('body').addClass('body-popup');
      });
      $('#js-popup-follow-inner').on('click', function (e) {
        e.stopPropagation();
      });

      // follow form submit
      $('#js-follow-submit').on('click', function (e) {
        e.preventDefault();
        $('#js-follow-form').slideUp(300)
        $('#js-follow-success').slideDown(300)
      });
    }
  });
})(window, document);
