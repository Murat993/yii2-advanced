
    function ADM() {

        this.setLoader = function () {
            $(".loader").fadeIn(100);
        }

        this.removeLoader = function () {
            $(".loader").fadeOut(100);
        }

        this.setMaterialError = function () {
            return '<div class="loader">\
                        <div class="item-1"><span></span></div>\
                        <div class="item-2"><span></span></div>\
                        <div class="item-3"><span></span></div>\
                        <div class="item-4"><span></span></div>\
                        <div class="item-5"><span></span></div>\
                        <div class="item-6"><span></span></div>\
                        <div class="item-7"><span></span></div>\
                        <div class="item-8"><span></span></div>\
                    </div>';
        }

    }

    let adm = new ADM();
    $('body').append(adm.setMaterialError());

    $('#project-pjax').on('pjax:timeout', function (event, data) {
        event.preventDefault()
    });

    $('#project-pjax').on('pjax:beforeSend', function () {
        adm.setLoader();
    });
    $('#project-pjax').on('pjax:end', function () {
        adm.removeLoader();
    })

    $('#task-category-pjax').on('pjax:timeout', function (event, data) {
        event.preventDefault()
    });

    $('#task-category-pjax').on('pjax:beforeSend', function () {
        adm.setLoader();
    });
    $('#task-category-pjax').on('pjax:end', function () {
        adm.removeLoader();
    })

    function sendAjaxFormRequest(form, action, pjaxContainer, modalId) {
        if (form.find('.has-error').length) {
            return false;
        }
        $.ajax({
            type: 'POST',
            url: action,
            data: form.serialize(),
            beforeSend: function () {
                adm.setLoader();
                form.yiiActiveForm("resetForm");
            },
            success: function (data) {
                $(modalId).modal('hide');
                adm.removeLoader();
                $.pjax.reload(pjaxContainer);
            },
        })
    }

    $(document).on('submit', '.ajax-form', function (e) {
        e.preventDefault();
        let form = $(this);
        let pjaxName = $(this).data('pjax_name_id');
        sendAjaxFormRequest(form, form.attr('action'), `#${pjaxName}`, '#modal-task-category');
    });
