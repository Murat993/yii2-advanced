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
})