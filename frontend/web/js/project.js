$(document).ready(function () {
    $('#modalProjectButton').click(function () {
        $.ajax({
            type: 'POST',
            url: '/project/create',
            success: function (data) {
                $('#modalProjectContent').html(data);
                $('#modal-project').modal('show');
            }
        });
    });
    $(document).on('submit', '.ajax-form', function (e) {
        e.preventDefault();
        let form = $(this);
        sendAjaxFormRequest(form, form.attr('action'), '#list-pjax', '#modal-project');
    });
})