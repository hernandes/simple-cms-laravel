window.onscroll = function() {sticky()};

var header = document.getElementById('header');
var main = document.querySelector('.main');
var offset = header.offsetTop;

function sticky() {
    if (window.pageYOffset > offset) {
        header.classList.add('sticky');
        main.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
        main.classList.remove('sticky');
    }
}

$(function () {
    $('.revslider').revolution({
        sliderType: 'standard',
        sliderLayout: 'auto',
        dottedOverlay: 'none',
        delay: 5000,
        navigation: {
            keyboardNavigation: 'off',
            keyboard_direction: 'horizontal',
            mouseScrollNavigation: 'off',
            onHoverStop: 'off',
            touch: {
                touchenabled: 'on',
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: 'horizontal',
                drag_block_vertical: false
            },
            arrows: {
                style: 'gyges',
                enable: true,
                hide_onmobile: false,
                hide_onleave: false,
                hide_delay: 200,
                hide_delay_mobile: 1200,
                tmp: '',
                left: {
                    h_align: 'left',
                    v_align: 'center',
                    h_offset: 0,
                    v_offset: 0
                },
                right: {
                    h_align: 'right',
                    v_align: 'center',
                    h_offset: 0,
                    v_offset: 0
                }
            },
            bullets: {
                enable: true,
                hide_onmobile: true,
                hide_under: 800,
                style: 'hebe',
                hide_onleave: false,
                direction: 'horizontal',
                h_align: 'center',
                v_align: 'bottom',
                h_offset: 0,
                v_offset: 30,
                space: 5,
                tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
            }
        },

        responsiveLevels: [1240, 1024, 778],
        visibilityLevels: [1240, 1024, 778],
        gridwidth: [1170, 1024, 778, 480],
        gridheight: [450],
        lazyType: 'none',
        parallax: 'mouse',
        parallaxBgFreeze: 'off',
        parallaxLevels: [2, 3, 4, 5, 6, 7, 8, 9, 10, 1],
        shadow: 0,
        spinner: 'off',
        stopLoop: 'on',
        stopAfterLoops: 0,
        stopAtSlide: -1,
        shuffle: 'off',
        autoHeight: 'off',
        fullScreenAutoWidth: 'off',
        fullScreenAlignForce: 'off',
        fullScreenOffsetContainer: '',
        fullScreenOffset: '0',
        hideThumbsOnMobile: 'off',
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: 'off',
            nextSlideOnWindowFocus: 'off',
            disableFocusListener: false,
        }
    });

    var $carrousel = $('.owl-carousel');
    if ($carrousel.length > 0) {
        $carrousel.each(function() {
            var $this = $(this);
            var items = $this.data('items') === undefined ? 3 : $this.data('items');
            var dots = $this.data('dots') === undefined ? false : $this.data('dots');
            var nav = $this.data('nav')=== undefined ? false : $this.data('nav');
            var duration = $this.data('duration') === undefined ? 4000 : $this.data('duration');
            var loop = $this.data('loop') === undefined ? true : $this.data('loop');
            var autoplay = $this.data('autoplay') === undefined ? true : $this.data('autoplay');

            $this.owlCarousel({
                rtl: false,
                autoplay: autoplay,
                autoplayTimeout: duration,
                loop: loop,
                items: items,
                margin: 30,
                dots: dots,
                nav: nav,
                navText: [
                    '<i class="pe-7s-angle-left"></i>',
                    '<i class="pe-7s-angle-right"></i>'
                ],
                responsive: {
                    0: {
                        items: items - 2,
                        center: false
                    },
                    480: {
                        items: items - 2,
                        center: false
                    },
                    600: {
                        items: items - 2,
                        center: false
                    },
                    750: {
                        items: items - 1,
                        center: false
                    },
                    960: {
                        items: items - 1
                    },
                    1170: {
                        items: items
                    },
                    1300: {
                        items: items
                    }
                }
            });
        });
    }

    $('.modal-on-load').modal('show');

    $('a.lightcase').lightcase();

    $('[data-toggle=slide-collapse]').on('click', function(e) {
        var $this = $(this);

        $navMenuCont = $($this.data('target'));
        $navMenuCont.animate({
            'width': 'toggle'
        }, 280);

        $this.find('.navbar-toggler-icon').toggleClass('is-active');

        e.preventDefault();
    });


    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    }, maskOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
    $('[data-mask-phone]').mask(SPMaskBehavior, maskOptions);


    $('[data-form-ajax]').submit(function (e) {
        var $this = $(this);
        var $button = $this.find('button[type=submit]');

        $button.attr('disabled', true);

        $this.find('.invalid-feedback').remove();
        $this.find('.is-invalid').removeClass('is-invalid');

        var data = new FormData($this[0]);
        $.ajax({
            type: 'POST',
            cache: false,
            enctype: 'multipart/form-data',
            url: $this.attr('action'),
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                $button.attr('disabled', false);

                if (data.success) {
                    Swal.fire({
                        type: 'success',
                        title: 'Sucesso :)',
                        text: data.message,
                        footer: false
                    });

                    $this.find('input[type=text],input[type=email],textarea').val('');
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Error :)',
                        text: data.message,
                        footer: false
                    });
                }
            },
            error: function (xhr) {
                $button.attr('disabled', false);

                var errors = xhr.responseJSON.errors;

                for (var field in errors) {
                    var error = errors[field][0];
                    var $field = $this.find('[name=' + field + ']');
                    var $container = $field.closest('.form-c');
                    var $error = $container.find('.invalid-feedback');

                    $field.addClass('is-invalid');
                    if ($error.length > 0) {
                        $error.html(error);
                    } else {
                        $container.append('<div class="invalid-feedback">' + error + '</div>');
                    }
                }
            }
        });

        e.preventDefault();
    });
});
