$(document).ready(function () {
    $('#modalTaskCategoryButton').click(function () {
       let projectId = $(this).data('project_id');
        $.ajax({
            type: 'POST',
            url: `/task-category/create?id_project=${projectId}`,
            success: function (data) {
                $('#modalTaskCategoryContent').html(data);
                $('#modal-task-category').modal('show');
            }
        });
    });

    $('.add-new-task').on('click', function () {
        let taskCategory = $(this).data('task_category');
        var currentInput = $(this).siblings('.input-task_category')[0];
        let taskList = $(this).parents('.task-group').siblings('.task-list-category');

        if ($(currentInput).val().length > 0) {
            $.ajax({
                type: 'POST',
                data: {
                    taskCategory : taskCategory,
                    title : $(currentInput).val(),
                },
                url: `/task/create`,
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    $(taskList[0]).append(`
                        <li class="list-group-item justify-content-between">
                            ${$(currentInput).val()}
                            <button class="btn btn-sm btn-danger remove-task_category"
                             data-task_id="${dataJson.id}">
                            <i aria-hidden="true" class="glyphicon glyphicon-trash"></i>
                            </button>
                        </li>
                    `);
                    $(currentInput).val('');
                }
            });
        }
    })

    $('body').on('click', '.remove-task_category', function () {
        let taskId = $(this).data('task_id');
        let liParentDeleteAttr = $(this).parents('.list-group-item')[0];
            $.ajax({
                type: 'POST',
                data: {
                    taskId : taskId,
                },
                url: `/task/delete`,
                success: function (data) {
                    $(liParentDeleteAttr).hide(300);
                }
            });
    })
})