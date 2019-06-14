'use strict';

$(document).ready(function () {
    
    $('body').on('click','#js-user-main-menu-link', function () {
        $('.dropdown-menu').toggleClass('show');
    })

    //input number
    //if ($("input[type='number']").length) $("input[type='number']").inputSpinner();

    //login
    // $('.header__login').on('click', function(e) {
    //     e.preventDefault();
    //     $(this).hide();
    //     $('.header__profile').show();
    // });
    $(document).on('click', '.wrapper', function (e) {

        if (e.target.classList.contains('banner__share') || e.target.parentElement.classList.contains('banner__share')) {
            $('.banner__modal').fadeToggle();
        } else {
            $('.banner__modal').fadeOut();
        }
    });

    if ($('.city__select').length) {
        $('.city__select').on('click', function () {
            $('.city__select-content').toggle();
        });
    }

    if ($('.modal__add-cart').length) {
        $('.modal__add-cart').on('click', function () {
            $(this).toggle();
            $('.modal__spinner').toggle();
        });
    }

    $('.shop-menu__spinner').on('click', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    // order cart
    $('.order__item-delete').on('click', function () {
        $(this).closest('.order__cart-item').remove();
    });

    $('.header__menu-button').on('click', function () {
        $('.mobile__menu-wrap').toggleClass('mobile__menu-active');
        $('.header__search').toggle();
        $('.header__login').toggle();
    });

    if ($(document).width() < 1200) {}

    var screenWidth = $(document).width();

    $(window).resize(function () {
        screenWidth = $(document).width();
    });

    if (screenWidth < 860) {
        $('.aside__wrap').on('click', function (e) {
            if (e.target.classList.contains('aside__title')) {
                if ($('.aside__categories').length) {
                    $('.aside__categories').slideToggle();
                }
            }
            if (e.target.classList.contains('checkbox__label') || e.target.classList.contains('filter_count')) {
                if ($('.aside__categories').length) {
                    $('.aside__categories').slideUp();
                }
            }
        });
    }
    if (screenWidth < 993) {
        $('.aside__wrap').remove();
        $('.menu-tab__menu').on('click', function (e) {
            if (e.target.classList.contains('aside__title')) {
                if ($('#mobileTabMenu').length) {
                    $('#mobileTabMenu').slideToggle();
                }
            }
            if (e.target.classList.contains('aside-menu__link')) {
                if ($('#mobileTabMenu').length) {
                    $('#mobileTabMenu').slideUp();
                }
            }
        });
    }

    function addClassClose(element) {
        element.querySelector('.shops-dishes__status').classList.remove('shops-dishes__status_open');
        element.querySelector('.shops-dishes__status').classList.add('shops-dishes__status_close');
    }

    // var items = document.querySelectorAll('.shops-only__item');
    // var dishesItem = document.querySelectorAll('.shops-dishes__item');

    // items.forEach(function (element) {

    //     if (element.classList.contains('shops-only__item_close')) {
    //         var overlay = document.createElement('div');
    //         overlay.classList.add('shops-only__img-overlay');
    //         overlay.innerHTML = 'Закрыто';

    //         element.querySelector('.shops-only__img').appendChild(overlay);
    //         addClassClose(element);
    //         //    element.querySelector('.shops-dishes__status').innerHTML = 'Закрыто';
    //     }
    // });

    // dishesItem.forEach(function (element) {
    //     if (element.classList.contains('shops-only__item_close')) {
    //         addClassClose(element);
    //     }
    // });

    function setAside() {

        var mainHeight = document.querySelector('.main').clientHeight;

        if (mainHeight < 1300) return;

        if ($(window).scrollTop() > pos_absolute) {
            $('.aside__wrap').css({
                'position': 'absolute',
                'top': 'auto',
                'bottom': 0,
                'width': block_width
            });
        } else if ($(window).scrollTop() > block_pos) {
            if (screenWidth < 1201) {
                $('.aside__wrap').css({
                    'position': 'fixed',
                    'top': '80px',
                    'width': block_width,
                    'max-height': '100vh'
                });
            } else {
                $('.aside__wrap').css({
                    'position': 'fixed',
                    'top': '0px',
                    'width': block_width,
                    'max-height': '100vh'
                });
            }
        } else {
            $('.aside__wrap').css({
                'position': 'static',
                'max-height': 'calc(100vh - 80px)'
            });
        }
    }

    //aside
    if ($('.aside__wrap').length) {

        if (screenWidth > 860) {
            var block_pos = $('.aside__wrap').offset().top,
                wrap_pos = $('.aside').offset().top,
                block_height = $('.aside__wrap').outerHeight(),
                wrap_height = $('.aside').outerHeight(),
                block_width = $('.aside__wrap').outerWidth(),
                pos_absolute = 0;
            if (screenWidth < 1201) {
                pos_absolute = wrap_height - block_height;
            } else {
                pos_absolute = wrap_pos + wrap_height - block_height;
            }
            setAside();

            $(document).on('resize', '.aside', function () {
                console.log('resize');
            });

            $(window).on('resize', function () {
                block_pos = $('.aside__wrap').offset().top;
                wrap_pos = $('.aside').offset().top;
                block_height = $('.aside__wrap').outerHeight();
                wrap_height = $('.aside').outerHeight();
                block_width = $('.aside__wrap').outerWidth();
                if (screenWidth < 1201) {
                    pos_absolute = wrap_height - block_height;
                } else {
                    pos_absolute = wrap_pos + wrap_height - block_height;
                }
                setAside();
            });

            $(window).scroll(function () {
                wrap_height = $('.aside').outerHeight();
                if (screenWidth < 1201) {
                    pos_absolute = wrap_height - block_height;
                } else {
                    pos_absolute = wrap_pos + wrap_height - block_height;
                }
                setAside();
            });
        }
    }
});