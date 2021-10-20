import $ from 'jquery'
import 'jquery.cookie'
import slick from 'slick-carousel'
import './autoreg'

$(document).ready(function () {
  $('article').prependTo($('.main-text'))
  $('article h1').appendTo($('.for-h'))

  // burger menu
  $('.burger').on('click', function () {
    $(this).toggleClass('burger_active')
    $('.header__right').slideToggle()
  })

  // search-form animated start
  // function searchToggle(obj, evt) {
  //   var container = jQuery(obj).closest('.search-form');
  //   if (!container.hasClass('active')) {
  //     container.addClass('active');
  //     evt.preventDefault();
  //   }
  //   else if (container.hasClass('active') && jQuery(obj).closest('.input-holder').length == 0) {
  //     container.removeClass('active');
  //     container.find('.search-input').val(''); // input clear
  //   }
  // }
  
  // searchToggle();
  // search - form animated end

  // slider
  $('.slider__img').slick({
    asNavFor: '.slider__content',
    autoplay: true,
    dots: true,
    arrows: false,
    pauseOnFocus: true,
    pauseOnHover: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          dots: false
        }
      }
    ]
  })

  $('.slider__content').slick({
    asNavFor: '.slider__img',
    autoplay: true,
    fade: true,
    dots: false,
    arrows: false,
    pauseOnHover: true,
    pauseOnFocus: true
  })

  $('.game-slider__body').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 5,
    arrows: true,
    dots: true,
    pauseOnFocus: true,
    pauseOnHover: true,
    prevArrow:
      '<button type="button" class="game-slider__button game-slider__button_left"></button>',
    nextArrow:
      '<button type="button" class="game-slider__button game-slider__button_right"></button>',
    dotsClass: 'game-slider__dots slick-dots',
    appendArrows: $('.game-slider__nav'),
    appendDots: $('.game-slider__nav'),
    responsive: [
      {
        breakpoint: 1238,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 544,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  })

  // page menu
  if ($('.page__menu').length > 0) {
    const scrollWidth = $('.page__menu').find('ul')[0].scrollWidth
    const prominentWidth = Math.ceil($('.page__menu').find('ul').width())

    if (scrollWidth > prominentWidth) {
      $('.page__menu').find('.menu__arrow.right').removeAttr('disabled')
    }
  }

  function scrollMenu(button, sign = '+') {
    $(button).on('click', function (e) {
      e.preventDefault()
      const list = $(e.target).parents('.page__menu').find('ul')
      let scrollWidth = Math.floor(list.width() / 100) * 100

      list.animate(
        {
          scrollLeft: `${sign}=${scrollWidth}`
        },
        'slow'
      )

      activeScrollButton(list, $(e.target), sign)
    })
  }
  scrollMenu('.menu__arrow.right')
  scrollMenu('.menu__arrow.left', '-')

  function activeScrollButton(block, target, sign) {
    const scrollWidth = $(block)[0].scrollWidth
    const blockWidth = $(block).width()
    const anotherButton =
      sign == '+' ? $('.menu__arrow.left') : $('.menu__arrow.right')

    $(block).scroll(function () {
      if ($(this).scrollLeft() >= parseInt(scrollWidth - blockWidth)) {
        anotherButton.removeAttr('disabled')
        target.attr('disabled', 'disabled')
      } else if ($(this).scrollLeft() == 0) {
        anotherButton.removeAttr('disabled')
        target.attr('disabled', 'disabled')
      } else {
        anotherButton.removeAttr('disabled')
        target.removeAttr('disabled')
      }
    })
  }

  // responsive
  function responsive() {
    if ($(document).width() <= 992) {
      // sidebar
      $('.sidebar').prependTo($('.main-text'))
      //menu
      if ($('.burger').hasClass('burger_active')) {
        $('.header__right').css('display', 'block')
      } else {
        $('.header__right').css('display', 'none')
      }
    } else {
      // sidebar
      $('.sidebar').prependTo($('.secondary'))
      //menu
      $('.header__right').css('display', 'flex')
    }

    if ($(document).width() <= 768) {
      $('.game-slider__dots').addClass('hidden-dots')
    } else {
      $('.game-slider__dots').removeClass('hidden-dots')
    }
  }

  responsive()

  $(window).resize(responsive)

  if ($.cookie('popup') === 'false') {
    $.cookie('popup', '', { expires: -1, path: '/' })
  }

  if ($.cookie('cta') === 'false') {
    $.cookie('cta', '', { expires: -1, path: '/' })
  }

  // exit popup
  if (typeof $.cookie('popup') === 'undefined') {
    $.cookie('popup', 'show', { expires: 1, path: '/' })
  }

  $('.popup__close').click(function () {
    $(this).parents('.popup').hide()
    $(this).parents('.popup').next().hide()
    $('body').css('overflow', '')
    $.cookie('popup', 'hide', { expires: 1, path: '/' })
  })

  $('.popup__overlay').click(function () {
    $(this).hide()
    $(this).prev().hide()
    $('body').css('overflow', '')
    $.cookie('popup', 'hide', { expires: 1, path: '/' })
  })

  if ($(window).width() > 992) {
    $(document).mouseleave(function () {
      if ($.cookie('popup') === 'show') {
        $('.popup__overlay').fadeIn()
        $('.popup').fadeIn()
        $('body').css('overflow', 'hidden')
      }
    })
  }

  // cta popup
  function showsCtaPopup() {
    let targetEndPos = $('.footer').offset().top
    let winHeight = $(window).height()
    let scrollToLastElem = targetEndPos - winHeight

    $(window).scroll(function () {
      let winScrollTop = $(this).scrollTop()

      if (winScrollTop > 500) {
        $('.cta__wrapper').css({
          visibility: 'visible',
          position: 'fixed',
          transform: 'translateY(0)'
        })
      }

      if (winScrollTop > scrollToLastElem) {
        $('.cta__wrapper').css({
          position: 'absolute'
        })
      }
    })
  }

  if (typeof $.cookie('cta') === 'undefined') {
    $.cookie('cta', 'show', { expires: 1, path: '/' })
  }

  if ($.cookie('cta') === 'show') {
    showsCtaPopup()
  }

  $('.cta__close').click(function () {
    $(this).parents('.cta').remove()
    $.cookie('cta', 'hide', { expires: 1, path: '/' })
  })

  $(window).scroll(function () {
    if ($(window).scrollTop() > 1000) {
      $('.back__button').fadeIn()
    } else {
      $('.back__button').fadeOut()
    }
  })
})
