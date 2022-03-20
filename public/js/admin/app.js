window.lang = new Lang({
    messages: window.messages,
    locale: window.default_locale,
    fallback: window.fallback_locale
});

var loader = {
    show: function (target) {
        $(target || (isMobile() ? 'body' : '.content-wrapper')).append('<div class="page-loader' + (isMobile() ? ' is-mobile' : '') + '"><div class="loader"><p></p></div></div>');
    },

    hide: function () {
        $('.page-loader').fadeOut(500, function () {
            $(this).remove();
        });
    }
}

function datatables(ctx) {
    $('.datatable', ctx || document).each(function () {
        var $this = $(this);

        if ($this.closest('.dataTables_wrapper').length === 0) {
            $this.DataTable({
                aaSorting: [],
                pageLength: 25,
                responsive: true,
                language: {
                    sEmptyTable: lang.trans('datatable.empty_table'),
                    sInfo: lang.trans('datatable.info'),
                    sInfoEmpty: lang.trans('datatable.info_empty'),
                    sInfoFiltered: lang.trans('datatable.info_filtered'),
                    sInfoPostFix: lang.trans('datatable.info_post_fix'),
                    sInfoThousands: lang.trans('datatable.info_thousands'),
                    sLengthMenu: lang.trans('datatable.length_menu'),
                    sLoadingRecords: lang.trans('datatable.loading_records'),
                    sProcessing: lang.trans('datatable.processing'),
                    sZeroRecords: lang.trans('datatable.zero_records'),
                    sSearch: lang.trans('datatable.search'),
                    oPaginate: {
                        sNext: lang.trans('datatable.paginate.next'),
                        sPrevious: lang.trans('datatable.paginate.previous'),
                        sFirst: lang.trans('datatable.paginate.first'),
                        sLast: lang.trans('datatable.paginate.last')
                    },
                    oAria: {
                        sSortAscending: lang.trans('datatable.aria.sort_asc'),
                        sSortDescending: lang.trans('datatable.aria.sort_desc')
                    }
                },
                drawCallback: function () {
                    $('.dt-bootstrap4 ul.pagination').addClass('pagination-sm');
                }
            }).responsive.recalc();
        }
    });
}

function destroyDatatables(ctx) {
    $('.datatable', ctx || document).each(function () {
        var $this = $(this);

        $this.DataTable().destroy();
    });
}

function modals(ctx) {
    $(ctx || document).on('click', '[data-toggle=modal]', function () {
        var $this = $(this);
        var $target = $($this.data('target'));

        $target.find('.modal-content').load($this.attr('href'), function () {
            editors($target, false);
            bootstrapToggle($target);
            imageUpload($target);
            repeatable($target);
        });

        $target.on('hidden.bs.modal', function () {
            $target.find('.modal-content').empty();
            $target.unbind();
        });
    });
}

function repeatable(ctx) {
    $('.repeatable-container', ctx || document).each(function () {
        var $this = $(this);
        $this.repeatable({
            template: $this.data('template'),
            addTrigger: $this.data('add-trigger'),
            deleteTrigger: $this.data('delete-trigger')
        });
    });
}

function datepicker(ctx) {
    $('[data-datepicker]', ctx || document).each(function () {
        var $this = $(this);
        var date = moment($this.val(), convertPHPToMomentFormat(window.lang.get('admin.locale.datetime'))).toDate();

        $this.datetimepicker({
            locale: window.default_locale.toLowerCase(),
            date: date,
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-arrow-up',
                down: 'fa fa-arrow-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-calendar-check-o',
                clear: 'fa fa-delete',
                close: 'fa fa-times'
            }
        })
    });
}

function masks(ctx) {
    $('[data-currency]', ctx || document).each(function () {
        var $this = $(this);
        $this.maskMoney({
            thousands: '.',
            decimal: ','
        });
    });
}

function tableSortable(ctx) {
    var fixHelper = function(e, ui) {
        ui.children().each(function() {
            $(this).width($(this).width());
        });
        return ui;
    }

    $('[data-table-sortable]', ctx || document).each(function () {
        var $this = $(this);
        var $tbody = $this.find('tbody');

        $tbody.sortable({
            opacity: 0.6,
            cursor: 'move',
            placeholder: 'placeholder',
            helper: fixHelper,
            axis: 'y',
            update: function() {
                var order = $tbody.sortable('serialize');
                $.post($this.data('url'), order, function(data) {});
            }
        });
    });
}

function imageUpload(ctx) {

    $('.image-close', ctx || document).click(function (e) {
        var $this = $(this);
        var $container = $this.closest('.image-upload');
        var $preview = $container.find('.preview');
        var $upload = $container.find('.upload');
        var $inp = $container.find('[data-image-upload]');
        var $post = $('#post-' + $inp.attr('id'));

        $upload.show();
        $preview.hide().find('img').attr('src', '');
        $post.val('');

        e.preventDefault();
    });

    $('[data-image-upload]', ctx || document).change(function (e) {
        var $this = $(this);
        var $container = $this.closest('.image-upload');
        var $preview = $container.find('.preview');
        var $upload = $container.find('.upload');
        var $post = $('#post-' + $this.attr('id'));
        var $icon = $container.find('.image-icon');

        var formData = new FormData();
        formData.append($this.data('name'), e.target.files[0]);

        $container.removeClass('is-invalid');
        $icon.html('<i class="fas fa-circle-notch fa-spin"></i>');

        $.ajax({
            url: $this.data('url'),
            type: 'POST',
            data: formData,
            success: function(data) {
                $upload.hide();
                $preview.show().find('img').attr('src', data.preview);
                $post.val(data.name);

                $icon.html('<i class="fa fa-upload"></i>');
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $container.addClass('is-invalid');
                    $container.after('<div class="invalid-feedback">' + errors[$this.data('name')][0] + '</div>')
                }

                $icon.html('<i class="fa fa-upload"></i>');
            },
            cache: false,
            contentType: false,
            processData: false,
            xhr: function() {
                var xhr = $.ajaxSettings.xhr();
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.loaded >= e.total) {
                            $icon.html('<i class="fa fa-upload"></i>');
                        } else {

                        }
                    }, false);
                }
                return xhr;
            }
        });
    });
}

function editors(ctx, refresh) {
    var $editor = $('[data-editor]', ctx || document);
    var refresh = refresh === undefined ? false : refresh;

    $editor.each(function () {
        var $this = $(this);

        ClassicEditor
            .create($this[0], {
                language: window.default_locale.toLowerCase()
            });
    });
}

function nestables(ctx) {
    $('[data-nestable]', ctx || document).each(function () {
        var $nestable = $(this);
        $nestable.nestable();

        if ($nestable.data('update-url')) {
            $nestable.on('change', function() {
                var data = $nestable.nestable('serialize');
                $.post($nestable.data('update-url'), {
                    data: data
                }, function (data) {
                    console.log(data)
                });
            });
        }
    });
}

function bootstrapToggle(ctx) {
    $('[data-switch]', ctx || document).each(function () {
        var $this = $(this);

        function toggleVisibility() {
            if ($this.data('toggle-visibility')) {
                var $elements = $($this.data('toggle-visibility'));
                var checked = $this.prop('checked');

                if (checked) {
                    $elements.show();
                } else {
                    $elements.hide();
                }
            }
        }

        toggleVisibility();

        $this.bootstrapToggle({
            on: $this.data('on'),
            off: $this.data('off'),
            size: $this.data('size'),
            width: 70
        }).change(function () {
            toggleVisibility();
        });
    });
}

function tagsinput(ctx) {
    $('[data-tags]', ctx || document).each(function () {
        var $this = $(this);
        $this.tagsinput();
    });
}

function initComponents(ctx) {
    datatables(ctx);
    editors(ctx);
    nestables(ctx);
    bootstrapToggle(ctx);
    repeatable(ctx);
    imageUpload(ctx);
    tableSortable(ctx);
    modals(ctx);
    datepicker(ctx);
    masks(ctx);
    tagsinput(ctx);
}

function destroyComponents(ctx) {
    destroyDatatables(ctx);
}

$(function () {
    initComponents();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.pjax.defaults.timeout = 0;
    $.pjax.defaults.scrollTo = false;

    $(document).pjax('a[data-ajax], ul.pagination a', '.ajax-container')
        .on('pjax:end', function() {
            $('.ajax-container').unbind();
            initComponents('.ajax-container');
        }).on('pjax:send', function(e) {
            loader.show();
        }).on('pjax:complete', function (e, j) {
            loader.hide();
        }).on('pjax:beforeSend', function () {
            destroyComponents();
        });

    $(document).on('click', 'a[data-ajax], ul.pagination a', function () {
        if (isMobile()) {
            $('#sidebar-overlay').click();
        }
    });

    $(document).on('submit', 'form[data-ajax]', function(e) {
        $.pjax.submit(e, '.ajax-container');

        e.preventDefault();
    });

    $(document).on('submit', 'form[data-ajax-modal]', function (e) {
        var $this = $(this);
        var $modal = $this.closest('.modal');
        var $button = $this.find('button[type=submit]');

        $button.attr('disabled', true);
        $.ajax({
            data: $this.serialize(),
            url: $this.attr('action'),
            type: 'post',
            success: function (data) {
                $modal.modal('hide');

                if (data.success) {
                    window.location = data.url;
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    for (var field in errors) {
                        var $field = $this.find('[id=' + field.replace('.', '-') + ']:visible');
                        var error = errors[field][0];

                        if ($field.length > 0) {
                            var $group = $field.closest('.form-group');
                            var $error = $group.find('.invalid-feedback');

                            $field.addClass('is-invalid');

                            if ($error.length > 0) {
                                $error.html(error);
                            } else {
                                $group.append('<div class="invalid-feedback">' + error + '</div>');
                            }
                        }
                    }
                }

                $button.attr('disabled', false);
            }
        });

        e.preventDefault();
    });

    $(document).on('click', '[data-delete]', function (e) {
        var $this = $(this);

        if (confirm(lang.trans('admin.messages.confirm_delete'))) {
            $.ajax({
                dataType: 'json',
                method: 'DELETE',
                url: $this.attr('href'),
                success: function (data) {
                    $.pjax({url: data.url, container: '.ajax-container'});
                }
            });
        }

        e.preventDefault();
    });

    $('.nav-sidebar a').click(function () {
        var $this = $(this);
        if ($this.attr('href') !== '#') {
            $('.nav-sidebar .active').removeClass('active');
            $this.parents('.nav-item').find('.nav-link:first').addClass('active');
        }
    });

    $(document).on('change', '.page-media-type #type', function () {
        var $this = $(this);
        var $image = $('.media-image');
        var $video = $('.media-video')

        if ($this.val() === 'image') {
            $image.show();
            $video.hide();
        } else {
            $image.hide();
            $video.show();
        }
    });
});
