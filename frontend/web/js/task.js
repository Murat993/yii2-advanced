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
                    taskCategory: taskCategory,
                    title: $(currentInput).val(),
                },
                url: `/task/create`,
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    $(taskList[0]).append(`
                        <li class="list-group-item justify-content-between list-group-item-js" data-task_id_list="${dataJson.id}">
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
                taskId: taskId,
            },
            url: `/task/delete`,
            success: function (data) {
                $(liParentDeleteAttr).hide(300);
            }
        });
    })

    $('body').on('click', '.list-group-item-js', function () {
        let taskId = $(this).data('task_id_list');
        $.ajax({
            type: 'POST',
            data: {taskId: taskId},
            url: `/task/view`,
            success: function (data) {
                $('.modal__content').html(data);
                $('#menuModal').modal('show');
            }
        });
    })

    $(document).on('submit', '.send-comment_task', function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'POST',
            data: form.serialize(),
            url: `/comment/create`,
            success: function (data) {
                let comment = JSON.parse(data);
                console.log(comment);
                $('.comments__list').append(`
                    <li class="comments__item">
                        <div class="comments__header">
                            <div class="comments__name">${comment.username}
                                <span class="comments__date">${comment.createTime}</span>
                            </div>
                        </div>
                        <div class="comments__message">
                            ${comment.comment}
                        </div>
                        <a href="#" class="comments__reply">Ответить</a>
                    </li>`);
                $('.comment_input').val('');
            }
        });
    });

    $('body').on('click', '.give_task_to_user', function () {
        let taskUser = $(this).data('task_user');
        let taskId = $(this).data('task_id');
        $.ajax({
            type: 'POST',
            url: '/task/take-task',
            data: {taskId: taskId, user: taskUser},
            success: function () {
                location.reload();
            },
        })
    })

    $('body').on('click', '.complete_task_to_user', function () {
        let taskId = $(this).data('task_id');
        $.ajax({
            type: 'POST',
            url: '/task/complete-task',
            data: {taskId: taskId},
            success: function () {
                location.reload();
            },
        })
    })

})