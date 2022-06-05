$("#addTask").on("click", function () {
    const task = $("#taskInput").val();
    if (task == "") {
        $("#warning-message").text("Enter task!");

        return false
    };

    $.ajax({
        url: 'service/addTask.php',
        type: 'POST',
        cache: false,
        data: { 'task': task },
        dataType: 'html',
        beforeSend: function () {
            $("#addTask").prop("disabled", true);
        },
        success: function (id) {
            if (!id) {
                $("#warning-message").text("Something went wrong...");
            } else {
                $("#warning-message").text("");
                $("#taskInput").val("");
                addTask(task, id);
            }

            $("#addTask").prop("disabled", false);
        }
    })
});


$(".delete-task").on("click", function () {
    const currentID = $(this).attr("data-id")

    $.ajax({
        url: 'service/deleteTask.php',
        type: 'POST',
        cache: false,
        data: { 'currentID': currentID },
        dataType: 'html',
        success: function (id) {
            clearTask(id)
        }
    });
});

function clearTask(id) {
    $(`#${id}`).remove();
}


function addTask(task, id) {
    $("ul").append(`<li id=${id}><span class="task">${task}</span><button data-id=${id} class="delete-task">&#x2716;</button></a></li>`);
    addDeleteEvent(id)
}

function addDeleteEvent(id) {
    const deleteButtons = document.getElementsByClassName("delete-task");
    const lastDeleteButton = deleteButtons[deleteButtons.length - 1];
    lastDeleteButton.addEventListener('click', () => clearTask(id));
}
