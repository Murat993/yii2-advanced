$(document).ready(function() {


    //input number
    if ($("input[type='number']").length) $("input[type='number']").inputSpinner();

    //login
    // $('.header__login').on('click', function(e) {
    //     e.preventDefault();
    //     $(this).hide();
    //     $('.header__profile').show();
    // });

    if ($('.city__select').length) {
        $('.city__select').on('click', function() {
            $('.city__select-content').toggle();
        });
    }

    if ($('.modal__add-cart').length) {
        $('.modal__add-cart').on('click', function() {
            $(this).toggle();
            $('.modal__spinner').toggle();
        });
    }

    $('.shop-menu__spinner').on('click', function(e) {
        e.stopPropagation();
        e.preventDefault();
    });

    // order cart
    $('.order__item-delete').on('click', function() {
        $(this).closest('.order__cart-item').remove();
    });

    $('.header__menu-button').on('click', function() {
        $('.mobile__menu-wrap').toggleClass('mobile__menu-active');
        $('.header__search').toggle();
        $('.header__login').toggle();
    });

    if ($(document).width() < 1200) {

    }

    var screenWidth = $(document).width();

    $(window).resize(function() {
        screenWidth = $(document).width();

    });

    if (screenWidth < 860) {
        $('.aside__title').on('click', function() {

            if ($('.aside__categories').length) {
                $('.aside__categories').slideToggle();
            }

            if ($('.aside__menu').length) {
                $('.aside__menu').slideToggle();
            }
        });
    }



    let items = document.querySelectorAll('.shops-only__item');

    items.forEach(element => {

        if (element.classList.contains('shops-only__item_close')) {
            let overlay = document.createElement('div');
            overlay.classList.add('shops-only__img-overlay');
            overlay.innerHTML = 'Закрыто';

            element.querySelector('.shops-only__img').appendChild(overlay);
            element.querySelector('.shops-dishes__status').classList.remove('shops-dishes__status_open');
            element.querySelector('.shops-dishes__status').classList.add('shops-dishes__status_close');
            element.querySelector('.shops-dishes__status').innerHTML = 'Закрыто';
        }
    });



    //aside
    if ($('.aside__wrap').length ) {

        if ( screenWidth > 860 ) {
            var block_pos = $('.aside__wrap').offset().top,
                wrap_pos = $('.aside').offset().top,
                block_height = $('.aside__wrap').outerHeight(),
                wrap_height = $('.aside').outerHeight(),
                block_width = $('.aside__wrap').outerWidth(),
                pos_absolute = wrap_pos + wrap_height - block_height;

            $(window).on('resize', function() {
                block_pos = $('.aside__wrap').offset().top;
                wrap_pos = $('.aside').offset().top;
                block_height = $('.aside__wrap').outerHeight();
                wrap_height = $('.aside').outerHeight();
                block_width = $('.aside__wrap').outerWidth();
                pos_absolute = wrap_pos + wrap_height - block_height;
                console.log(`wrap_width = ${screenWidth}`);

            });

            $(window).scroll(function() {


                if($(window).scrollTop() > pos_absolute) {
                    $('.aside__wrap').css(
                        {
                            'position': 'absolute',
                            'top': wrap_height - block_height,
                            'width': block_width
                        }
                    );
                }
                else if($(window).scrollTop() > block_pos) {
                    $('.aside__wrap').css(
                        {
                            'position': 'fixed',
                            'top': '0px',
                            'width': block_width
                        }
                    );
                } else {
                    $('.aside__wrap').css(
                        {
                            'position': 'static'
                        }
                    );
                }
            });
        }


    }

});